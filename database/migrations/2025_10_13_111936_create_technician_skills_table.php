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
        Schema::create('technician_skills', function (Blueprint $table) {
            $table->id();
            $table->foreignId('technician_id')->constrained('technicians')->onDelete('cascade');
            $table->foreignId('service_category_id')->constrained('service_categories')->onDelete('cascade');
            $table->integer('experience_years')->default(0);
            $table->decimal('rating', 3, 2)->default(0.00);
            $table->boolean('is_primary')->default(false);
            $table->timestamps();
            
            $table->unique(['technician_id', 'service_category_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('technician_skills');
    }
};
