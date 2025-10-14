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
        Schema::create('technicians', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->string('password');
            $table->string('profile_picture')->nullable();
            $table->text('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('country')->default('US');
            $table->text('skills')->nullable(); // JSON array of skills
            $table->text('service_areas')->nullable(); // JSON array of service areas
            $table->string('id_proof')->nullable();
            $table->string('certificate')->nullable();
            $table->decimal('rating', 3, 2)->default(0.00);
            $table->integer('total_jobs')->default(0);
            $table->integer('completed_jobs')->default(0);
            $table->enum('status', ['pending', 'approved', 'rejected', 'suspended'])->default('pending');
            $table->boolean('is_available')->default(true);
            $table->time('available_from')->nullable();
            $table->time('available_to')->nullable();
            $table->json('available_days')->nullable(); // Array of days of week
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('phone_verified_at')->nullable();
            $table->timestamp('approved_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('technicians');
    }
};
