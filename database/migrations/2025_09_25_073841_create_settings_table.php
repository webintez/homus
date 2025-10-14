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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            
            // Basic site info
            $table->string('website_title')->nullable();
            $table->string('website_logo')->nullable(); // store file path
            $table->string('website_favicon')->nullable(); // store file path
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();

            // Social media links
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('youtube')->nullable();
            $table->string('pinterest')->nullable();

            // Theme & design
            $table->string('primary_color')->nullable();
            $table->string('secondary_color')->nullable();
            $table->string('primary_font')->nullable();
            $table->string('secondary_font')->nullable();
            $table->string('background_color')->nullable();
            $table->string('header_color')->nullable();
            $table->string('footer_color')->nullable();

            // SMTP / Email settings
            $table->string('smtp_host')->nullable();
            $table->integer('smtp_port')->nullable();
            $table->string('smtp_username')->nullable();
            $table->string('smtp_password')->nullable();
            $table->string('smtp_encryption')->nullable(); // tls, ssl
            $table->string('smtp_from_address')->nullable();
            $table->string('smtp_from_name')->nullable();

            // Other optional settings
            $table->text('custom_css')->nullable();
            $table->text('custom_js')->nullable();
            $table->boolean('maintenance_mode')->default(false);
            $table->string('timezone')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
