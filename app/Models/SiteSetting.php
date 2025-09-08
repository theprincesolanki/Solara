<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    protected $table = 'site_settings';

    protected $fillable = [
        'site_name',
        'site_logo',
        'site_favicon',
        'address','description',
        'contact_name1', 'contact_phone1',
        'contact_name2', 'contact_phone2',
        'contact_name3', 'contact_phone3',
        'email_name1', 'email_address1',
        'email_name2', 'email_address2',
        'email_name3', 'email_address3',
        'smtp_host', 'smtp_port', 'smtp_username', 'smtp_password',
        'smtp_encryption', 'smtp_from_name', 'smtp_from_address',
        'meta_title', 'meta_description', 'meta_keywords',
        'meta_author', 'meta_robots',
        'og_title', 'og_description', 'og_image',
        'twitter_title', 'twitter_description', 'twitter_image',
        'facebook_url', 'instagram_url', 'twitter_url', 'linkedin_url',
        'youtube_url', 'whatsapp_number', 'telegram_url',
        'map_embed', 
    ];

    /**
     * Get the first (and only) row of site settings.
     */
    public static function getSettings()
    {
        return self::first();
    }

    /**
     * Get a specific setting value by key.
     */
    public static function getValue($key)
    {
        $settings = self::first();
        return $settings ? $settings->$key : null;
    }
}
