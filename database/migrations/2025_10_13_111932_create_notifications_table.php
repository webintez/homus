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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->string('type'); // email, sms, push
            $table->string('recipient_type'); // customer, technician, admin
            $table->unsignedBigInteger('recipient_id');
            $table->string('subject')->nullable();
            $table->text('message');
            $table->json('data')->nullable(); // Additional data for the notification
            $table->enum('status', ['pending', 'sent', 'failed', 'delivered'])->default('pending');
            $table->timestamp('sent_at')->nullable();
            $table->timestamp('delivered_at')->nullable();
            $table->text('error_message')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
