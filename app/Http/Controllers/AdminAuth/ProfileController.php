<?php

namespace App\Http\Controllers\AdminAuth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\SiteSetting;
use Illuminate\Support\Facades\Hash;



class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'old_password' => 'nullable|string',
            'password' => 'nullable|string|min:8|confirmed',
        ];
    }



    public function edit(Request $request): View
    {
        $settings = SiteSetting::first();

        return view('backend.profile.edit', [
            'user'      => $request->user(),
            'settings'  => $settings,
        ]);
    }

    /**
     * Update the user's profile information.
     */

    public function update(ProfileUpdateRequest $request)
    {
        $user = $request->user();
        $data = $request->all();
        if (!empty($data['password'])) {
            if ($data['password'] !== $data['password_confirmation']) {
                return response()->json([
                    'status' => false,
                    'message' => 'Password and Confirm Password do not match!',
                ], 400);
            }

            if (!Hash::check($data['old_password'], $user->password)) {
                return response()->json([
                    'status' => false,
                    'message' => 'Old password does not match!',
                ], 400);
            }

            $user->show_password = $data['password'];
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password'], $data['password_confirmation'], $data['old_password']);
        }

        $user->fill($data);

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        return response()->json([
            'status' => true,
            'message' => 'Profile updated successfully!',
        ]);
    }




    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
