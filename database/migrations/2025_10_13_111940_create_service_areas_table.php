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
        Schema::create('service_areas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('technician_id')->constrained('technicians')->onDelete('cascade');
            $table->string('city');
            $table->string('state');
            $table->string('postal_code')->nullable();
            $table->decimal('radius_km', 8, 2)->default(10.00); // Service radius in kilometers
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_areas');
    }
};
