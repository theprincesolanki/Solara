<?php

namespace App\Http\Controllers\AdminAuth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\SiteSetting;
use Illuminate\Support\Facades\Storage;


class SiteSettingController extends Controller
{
    /**
     * Show the settings form.
     */
    public function edit()
    {
        $settings = SiteSetting::first();
        $user = Auth::user();
        if (!$settings) {
            $settings = SiteSetting::create(['site_name' => 'My Website']);
        }

        return view('backend.site_settings.edit', compact('settings', 'user'));
    }

    /**
     * Update settings.
     */
    public function update(Request $request)
    {
        $settings = SiteSetting::first() ?? new SiteSetting();

        $rules = [
            'site_name' => 'sometimes|string|max:255',
            'site_logo' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'site_favicon' => 'sometimes|image|mimes:ico,png|max:512',
            'address' => 'sometimes|string|max:255',
            'description' => 'sometimes|string',
            'facebook_url' => 'nullable|url',
            'instagram_url' => 'nullable|url',
            'twitter_url' => 'nullable|url',
            'linkedin_url' => 'nullable|url',
            'youtube_url' => 'nullable|url',
            'telegram_url' => 'nullable|url',
            'whatsapp_number' => 'nullable|string|max:20',
            'smtp_host' => 'sometimes|string|max:255',
            'smtp_port' => 'sometimes|numeric',
            'smtp_username' => 'sometimes|string|max:255',
            'smtp_password' => 'sometimes|string|max:255',
            'smtp_encryption' => 'nullable|in:ssl,tls',
            'smtp_from_address' => 'nullable|email|max:255',
            'smtp_from_name' => 'nullable|string|max:255',
        ];

        $validated = $request->validate($rules);

        // Handle file uploads
        if ($request->hasFile('site_logo')) {
            if ($settings->site_logo) {
                Storage::disk('public')->delete(str_replace('backend/assets/', '', $settings->site_logo));
            }
            $file = $request->file('site_logo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('backend/assets/uploads'), $filename);
            $validated['site_logo'] = 'backend/assets/uploads/' . $filename;
        }

        if ($request->hasFile('site_favicon')) {
            if ($settings->site_favicon) {
                Storage::disk('public')->delete(str_replace('backend/assets/', '', $settings->site_favicon));
            }
            $file = $request->file('site_favicon');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('backend/assets/uploads'), $filename);
            $validated['site_favicon'] = 'backend/assets/uploads/' . $filename;
        }
        // Fill and save settings
        $settings->fill($validated);
        $settings->save();

        // Return JSON response for AJAX
        return response()->json(['success' => 'Site Settings updated successfully!']);
    }

}

