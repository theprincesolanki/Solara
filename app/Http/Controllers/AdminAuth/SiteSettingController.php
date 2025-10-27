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
            'description' => 'sometimes',
            'contact_name1' => 'nullable|string|max:255',
            'contact_phone1' => 'nullable|string|max:255',
            'contact_name2' => 'nullable|string|max:255',
            'contact_phone2' => 'nullable|string|max:255',
            'contact_name3' => 'nullable|string|max:255',
            'contact_phone3' => 'nullable|string|max:255',
            'email_name1' => 'nullable|string|max:255',
            'email_address1' => 'nullable|email|max:255',
            'email_name2' => 'nullable|string|max:255',
            'email_address2' => 'nullable|email|max:255',
            'email_name3' => 'nullable|string|max:255',
            'email_address3' => 'nullable|email|max:255',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
            'meta_author' => 'nullable|string|max:255',
            'meta_robots' => 'nullable|string|max:255',
            'og_title' => 'nullable|string|max:255',
            'og_description' => 'nullable|string',
            'og_image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'twitter_title' => 'nullable|string|max:255',
            'twitter_description' => 'nullable|string',
            'twitter_image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'map_embed' => 'nullable|string|max:255',
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
        
        $imageFields = ['site_logo', 'site_favicon', 'og_image', 'twitter_image'];
        foreach ($imageFields as $field) {
            if ($request->hasFile($field)) {
                if ($settings->$field) {
                    Storage::disk('public')->delete($settings->$field);
                }
                $file = $request->file($field);
                $timestamp = time();
                $extension = $file->getClientOriginalExtension();
                $filename = "{$field}_{$timestamp}.{$extension}";
                $validated[$field] = $file->storeAs('backend/uploads/site_settings', $filename, 'public');
            }
        }

        $settings->fill($validated);
        $settings->save();

        return response()->json(['success' => 'Site Settings updated successfully!']);
    }

}
