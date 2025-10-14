<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail; // Added for SMTP test
use Illuminate\Support\Facades\Artisan; // Added for cache clearing

class SettingsController extends Controller
{
    /**
     * Show settings page
     */
    public function index()
    {
        $settings = Setting::allSettings();
        return view('admin.settings.index', compact('settings'));
    }

    /**
     * Update general settings
     */
    public function updateGeneral(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'website_title' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:50',
            'address' => 'nullable|string|max:500',
            'timezone' => 'nullable|string|max:50',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed.',
                'errors' => $validator->errors()
            ], 422);
        }

        $data = $request->only([
            'website_title', 'email', 'phone', 'address', 'timezone'
        ]);

        Setting::updateSettings($data);

        return response()->json([
            'success' => true,
            'message' => 'General settings updated successfully.'
        ]);
    }

    /**
     * Update social media settings
     */
    public function updateSocial(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'facebook' => 'nullable|url|max:255',
            'twitter' => 'nullable|url|max:255',
            'instagram' => 'nullable|url|max:255',
            'linkedin' => 'nullable|url|max:255',
            'youtube' => 'nullable|url|max:255',
            'pinterest' => 'nullable|url|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed.',
                'errors' => $validator->errors()
            ], 422);
        }

        $data = $request->only([
            'facebook', 'twitter', 'instagram', 'linkedin', 'youtube', 'pinterest'
        ]);

        Setting::updateSettings($data);

        return response()->json([
            'success' => true,
            'message' => 'Social media settings updated successfully.'
        ]);
    }

    /**
     * Update theme settings
     */
    public function updateTheme(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'primary_color' => 'nullable|string|max:7',
            'secondary_color' => 'nullable|string|max:7',
            'primary_font' => 'nullable|string|max:100',
            'secondary_font' => 'nullable|string|max:100',
            'background_color' => 'nullable|string|max:7',
            'header_color' => 'nullable|string|max:7',
            'footer_color' => 'nullable|string|max:7',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed.',
                'errors' => $validator->errors()
            ], 422);
        }

        $data = $request->only([
            'primary_color', 'secondary_color', 'primary_font', 'secondary_font',
            'background_color', 'header_color', 'footer_color'
        ]);

        Setting::updateSettings($data);

        return response()->json([
            'success' => true,
            'message' => 'Theme settings updated successfully.'
        ]);
    }

    /**
     * Update email settings
     */
    public function updateEmail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'smtp_host' => 'nullable|string|max:255',
            'smtp_port' => 'nullable|integer|min:1|max:65535',
            'smtp_username' => 'nullable|string|max:255',
            'smtp_password' => 'nullable|string|max:255',
            'smtp_encryption' => 'nullable|in:tls,ssl',
            'smtp_from_address' => 'nullable|email|max:255',
            'smtp_from_name' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed.',
                'errors' => $validator->errors()
            ], 422);
        }

        $data = $request->only([
            'smtp_host', 'smtp_port', 'smtp_username', 'smtp_password',
            'smtp_encryption', 'smtp_from_address', 'smtp_from_name'
        ]);

        Setting::updateSettings($data);

        return response()->json([
            'success' => true,
            'message' => 'Email settings updated successfully.'
        ]);
    }

    /**
     * Update custom CSS/JS
     */
    public function updateCustom(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'custom_css' => 'nullable|string',
            'custom_js' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed.',
                'errors' => $validator->errors()
            ], 422);
        }

        $data = $request->only(['custom_css', 'custom_js']);
        Setting::updateSettings($data);

        return response()->json([
            'success' => true,
            'message' => 'Custom code updated successfully.'
        ]);
    }

    /**
     * Toggle maintenance mode
     */
    public function toggleMaintenance(Request $request)
    {
        $maintenanceMode = Setting::get('maintenance_mode', false);
        Setting::set('maintenance_mode', !$maintenanceMode);

        return response()->json([
            'success' => true,
            'message' => 'Maintenance mode ' . (!$maintenanceMode ? 'enabled' : 'disabled') . '.',
            'maintenance_mode' => !$maintenanceMode
        ]);
    }

    /**
     * Upload logo
     */
    public function uploadLogo(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid logo file.',
                'errors' => $validator->errors()
            ], 422);
        }

        $path = $request->file('logo')->store('logos', 'public');
        Setting::set('website_logo', $path);

        return response()->json([
            'success' => true,
            'message' => 'Logo uploaded successfully.',
            'logo_url' => Storage::url($path)
        ]);
    }

    /**
     * Upload favicon
     */
    public function uploadFavicon(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'favicon' => 'required|image|mimes:ico,png,jpg,jpeg,gif,svg|max:1024'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid favicon file.',
                'errors' => $validator->errors()
            ], 422);
        }

        $path = $request->file('favicon')->store('favicons', 'public');
        Setting::set('website_favicon', $path);

        return response()->json([
            'success' => true,
            'message' => 'Favicon uploaded successfully.',
            'favicon_url' => Storage::url($path)
        ]);
    }

    /**
     * Test SMTP configuration
     */
    public function testSmtp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'test_email' => 'required|email|max:255'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Please provide a valid email address.',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            // Get SMTP settings
            $smtpHost = Setting::get('smtp_host');
            $smtpPort = Setting::get('smtp_port');
            $smtpUsername = Setting::get('smtp_username');
            $smtpPassword = Setting::get('smtp_password');
            $smtpEncryption = Setting::get('smtp_encryption');
            $smtpFromAddress = Setting::get('smtp_from_address');
            $smtpFromName = Setting::get('smtp_from_name');

            // Check if SMTP is configured
            if (empty($smtpHost) || empty($smtpPort) || empty($smtpUsername) || empty($smtpPassword)) {
                return response()->json([
                    'success' => false,
                    'message' => 'SMTP configuration is incomplete. Please configure all required SMTP settings first.'
                ], 400);
            }

            // Configure mail settings
            config([
                'mail.mailers.smtp.host' => $smtpHost,
                'mail.mailers.smtp.port' => $smtpPort,
                'mail.mailers.smtp.username' => $smtpUsername,
                'mail.mailers.smtp.password' => $smtpPassword,
                'mail.mailers.smtp.encryption' => $smtpEncryption,
                'mail.from.address' => $smtpFromAddress ?: $smtpUsername,
                'mail.from.name' => $smtpFromName ?: Setting::get('website_title', 'Laravel Admin Panel'),
            ]);

            // Send test email
            \Mail::raw('This is a test email from your Laravel Admin Panel. If you receive this email, your SMTP configuration is working correctly!', function ($message) use ($request, $smtpFromAddress, $smtpFromName) {
                $message->to($request->test_email)
                        ->subject('SMTP Test Email - ' . Setting::get('website_title', 'Laravel Admin Panel'));
                
                if ($smtpFromAddress) {
                    $message->from($smtpFromAddress, $smtpFromName ?: Setting::get('website_title', 'Laravel Admin Panel'));
                }
            });

            return response()->json([
                'success' => true,
                'message' => 'Test email sent successfully to ' . $request->test_email . '! Please check your inbox.'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to send test email: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update SEO settings
     */
    public function updateSeo(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'meta_title' => 'nullable|string|max:60',
            'meta_description' => 'nullable|string|max:160',
            'meta_keywords' => 'nullable|string|max:255',
            'meta_author' => 'nullable|string|max:255',
            'meta_robots' => 'nullable|string|max:255',
            'og_title' => 'nullable|string|max:60',
            'og_description' => 'nullable|string|max:160',
            'og_image' => 'nullable|string|max:255',
            'og_type' => 'nullable|string|max:50',
            'og_site_name' => 'nullable|string|max:100',
            'twitter_card' => 'nullable|string|max:50',
            'twitter_site' => 'nullable|string|max:100',
            'twitter_creator' => 'nullable|string|max:100',
            'twitter_title' => 'nullable|string|max:60',
            'twitter_description' => 'nullable|string|max:160',
            'twitter_image' => 'nullable|string|max:255',
            'canonical_url' => 'nullable|url|max:255',
            'structured_data' => 'nullable|string',
            'google_analytics_id' => 'nullable|string|max:50',
            'google_tag_manager_id' => 'nullable|string|max:50',
            'facebook_pixel_id' => 'nullable|string|max:50',
            'custom_meta_tags' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed.',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $data = $request->only([
                'meta_title', 'meta_description', 'meta_keywords', 'meta_author', 'meta_robots',
                'og_title', 'og_description', 'og_image', 'og_type', 'og_site_name',
                'twitter_card', 'twitter_site', 'twitter_creator', 'twitter_title', 'twitter_description', 'twitter_image',
                'canonical_url', 'structured_data', 'google_analytics_id', 'google_tag_manager_id', 'facebook_pixel_id', 'custom_meta_tags'
            ]);

            Setting::updateSettings($data);

            return response()->json([
                'success' => true,
                'message' => 'SEO settings updated successfully!'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update SEO settings: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Clear all caches
     */
    public function clearCache(Request $request)
    {
        try {
            // Clear all Laravel caches
            \Artisan::call('cache:clear');
            \Artisan::call('config:clear');
            \Artisan::call('view:clear');
            \Artisan::call('route:clear');
            
            // Clear all setting caches
            Setting::clearAllCaches();
            
            return response()->json([
                'success' => true,
                'message' => 'All caches cleared successfully! The site will now use fresh data.'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to clear caches: ' . $e->getMessage()
            ], 500);
        }
    }
}
