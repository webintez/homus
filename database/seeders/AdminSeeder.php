<?php

namespace Database\Seeders;

use App\Models\Setting;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create admin user
        User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin User',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]
        );

        // Create default settings
        Setting::firstOrCreate(
            ['id' => 1],
            [
                'website_title' => 'Laravel Admin Panel',
                'email' => 'admin@example.com',
                'phone' => '+1 (555) 123-4567',
                'address' => '123 Admin Street, City, State 12345',
                'timezone' => 'UTC',
                'primary_color' => '#3B82F6',
                'secondary_color' => '#6B7280',
                'primary_font' => 'Inter',
                'secondary_font' => 'Inter',
                'background_color' => '#FFFFFF',
                'header_color' => '#F9FAFB',
                'footer_color' => '#1F2937',
                'maintenance_mode' => false,
                'smtp_from_name' => 'Laravel Admin Panel',
                'smtp_from_address' => 'noreply@example.com',
            ]
        );
    }
}
