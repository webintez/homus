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
        Schema::create('otps', function (Blueprint $table) {
            $table->id();

            $table->string('code'); // OTP code
            $table->string('email')->nullable(); // if OTP sent via email
            $table->string('phone')->nullable(); // if OTP sent via SMS
            $table->boolean('is_used')->default(false); // has it been used?
            $table->timestamp('expires_at')->nullable(); // OTP expiration time

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('otps');
    }
};
