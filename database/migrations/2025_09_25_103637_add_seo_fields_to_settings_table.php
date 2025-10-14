<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            // SEO Meta Tags
            $table->text('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->string('meta_author')->nullable();
            $table->string('meta_robots')->nullable()->default('index, follow');
            
            // Open Graph Tags
            $table->string('og_title')->nullable();
            $table->text('og_description')->nullable();
            $table->string('og_image')->nullable();
            $table->string('og_type')->nullable()->default('website');
            $table->string('og_site_name')->nullable();
            
            // Twitter Card Tags
            $table->string('twitter_card')->nullable()->default('summary_large_image');
            $table->string('twitter_site')->nullable();
            $table->string('twitter_creator')->nullable();
            $table->string('twitter_title')->nullable();
            $table->text('twitter_description')->nullable();
            $table->string('twitter_image')->nullable();
            
            // Additional SEO
            $table->string('canonical_url')->nullable();
            $table->text('structured_data')->nullable(); // JSON-LD structured data
            $table->string('google_analytics_id')->nullable();
            $table->string('google_tag_manager_id')->nullable();
            $table->string('facebook_pixel_id')->nullable();
            $table->text('custom_meta_tags')->nullable(); // For additional custom meta tags
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn([
                'meta_title', 'meta_description', 'meta_keywords', 'meta_author', 'meta_robots',
                'og_title', 'og_description', 'og_image', 'og_type', 'og_site_name',
                'twitter_card', 'twitter_site', 'twitter_creator', 'twitter_title', 'twitter_description', 'twitter_image',
                'canonical_url', 'structured_data', 'google_analytics_id', 'google_tag_manager_id', 'facebook_pixel_id', 'custom_meta_tags'
            ]);
        });
    }
};
