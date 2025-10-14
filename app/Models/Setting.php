<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Setting extends Model
{
    protected $fillable = [
        'website_title',
        'website_logo',
        'website_favicon',
        'email',
        'phone',
        'address',
        'facebook',
        'twitter',
        'instagram',
        'linkedin',
        'youtube',
        'pinterest',
        'primary_color',
        'secondary_color',
        'primary_font',
        'secondary_font',
        'background_color',
        'header_color',
        'footer_color',
        'smtp_host',
        'smtp_port',
        'smtp_username',
        'smtp_password',
        'smtp_encryption',
        'smtp_from_address',
        'smtp_from_name',
        'custom_css',
        'custom_js',
        'maintenance_mode',
        'timezone',
        // SEO fields
        'meta_title',
        'meta_description',
        'meta_keywords',
        'meta_author',
        'meta_robots',
        'og_title',
        'og_description',
        'og_image',
        'og_type',
        'og_site_name',
        'twitter_card',
        'twitter_site',
        'twitter_creator',
        'twitter_title',
        'twitter_description',
        'twitter_image',
        'canonical_url',
        'structured_data',
        'google_analytics_id',
        'google_tag_manager_id',
        'facebook_pixel_id',
        'custom_meta_tags',
    ];

    protected $casts = [
        'smtp_port' => 'integer',
        'maintenance_mode' => 'boolean',
    ];

    /**
     * Get a setting value by key
     */
    public static function get($key, $default = null)
    {
        return Cache::remember("setting.{$key}", 3600, function () use ($key, $default) {
            $setting = self::where('id', 1)->first();
            return $setting ? $setting->$key : $default;
        });
    }

    /**
     * Set a setting value
     */
    public static function set($key, $value)
    {
        $setting = self::firstOrCreate(['id' => 1]);
        $setting->update([$key => $value]);
        Cache::forget("setting.{$key}");
        Cache::forget('settings.all');
        return $setting;
    }

    /**
     * Get all settings as key-value array
     */
    public static function allSettings()
    {
        return Cache::remember('settings.all', 3600, function () {
            $setting = self::first();
            return $setting ? $setting->toArray() : [];
        });
    }

    /**
     * Update multiple settings at once
     */
    public static function updateSettings(array $data)
    {
        $setting = self::firstOrCreate(['id' => 1]);
        $setting->update($data);
        
        // Clear all setting caches
        $keys = array_keys($data);
        foreach ($keys as $key) {
            Cache::forget("setting.{$key}");
        }
        Cache::forget('settings.all');
        
        return $setting;
    }

    /**
     * Clear all setting caches
     */
    public static function clearAllCaches()
    {
        $setting = self::first();
        if ($setting) {
            $fillableAttributes = [
                'website_title', 'website_logo', 'website_favicon', 'email', 'phone', 'address',
                'facebook', 'twitter', 'instagram', 'linkedin', 'youtube', 'pinterest',
                'primary_color', 'secondary_color', 'primary_font', 'secondary_font',
                'background_color', 'header_color', 'footer_color',
                'smtp_host', 'smtp_port', 'smtp_username', 'smtp_password', 'smtp_encryption',
                'smtp_from_address', 'smtp_from_name',
                'custom_css', 'custom_js', 'maintenance_mode', 'timezone',
                'meta_title', 'meta_description', 'meta_keywords', 'meta_author', 'meta_robots',
                'og_title', 'og_description', 'og_image', 'og_type', 'og_site_name',
                'twitter_card', 'twitter_site', 'twitter_creator', 'twitter_title', 'twitter_description', 'twitter_image',
                'canonical_url', 'structured_data', 'google_analytics_id', 'google_tag_manager_id', 'facebook_pixel_id', 'custom_meta_tags'
            ];
            
            foreach ($fillableAttributes as $key) {
                Cache::forget("setting.{$key}");
            }
        }
        Cache::forget('settings.all');
    }
}
