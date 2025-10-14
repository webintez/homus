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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('booking_number')->unique();
            $table->foreignId('customer_id')->constrained('customers')->onDelete('cascade');
            $table->foreignId('technician_id')->nullable()->constrained('technicians')->onDelete('set null');
            $table->foreignId('service_id')->constrained('services')->onDelete('cascade');
            $table->string('appliance_type');
            $table->text('issue_description');
            $table->json('issue_images')->nullable(); // Array of image paths
            $table->json('issue_videos')->nullable(); // Array of video paths
            $table->text('customer_address');
            $table->string('customer_city');
            $table->string('customer_state');
            $table->string('customer_postal_code');
            $table->string('customer_phone');
            $table->string('customer_alternate_phone')->nullable();
            $table->datetime('preferred_date');
            $table->time('preferred_time');
            $table->enum('status', ['pending', 'accepted', 'in_progress', 'completed', 'cancelled', 'rejected'])->default('pending');
            $table->decimal('estimated_price', 10, 2)->nullable();
            $table->decimal('final_price', 10, 2)->nullable();
            $table->text('technician_notes')->nullable();
            $table->text('customer_notes')->nullable();
            $table->text('admin_notes')->nullable();
            $table->enum('payment_status', ['pending', 'paid', 'refunded'])->default('pending');
            $table->enum('payment_method', ['cash', 'card', 'bank_transfer'])->nullable();
            $table->timestamp('accepted_at')->nullable();
            $table->timestamp('started_at')->nullable();
            $table->timestamp('completed_at')->nullable();
            $table->timestamp('cancelled_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
