<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Service;
use App\Models\ServiceCategory;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $acCategory = ServiceCategory::where('slug', 'air-conditioning')->first();
        $refrigeratorCategory = ServiceCategory::where('slug', 'refrigerator')->first();
        $washingMachineCategory = ServiceCategory::where('slug', 'washing-machine')->first();
        $dishwasherCategory = ServiceCategory::where('slug', 'dishwasher')->first();
        $microwaveCategory = ServiceCategory::where('slug', 'microwave')->first();
        $ovenCategory = ServiceCategory::where('slug', 'oven-stove')->first();
        $waterHeaterCategory = ServiceCategory::where('slug', 'water-heater')->first();
        $dryerCategory = ServiceCategory::where('slug', 'dryer')->first();

        $services = [
            // Air Conditioning Services
            [
                'category_id' => $acCategory->id,
                'name' => 'AC Repair',
                'slug' => 'ac-repair',
                'description' => 'Complete air conditioning repair service including diagnosis and fixing',
                'base_price' => 150.00,
                'hourly_rate' => 75.00,
                'estimated_duration' => 120,
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'category_id' => $acCategory->id,
                'name' => 'AC Maintenance',
                'slug' => 'ac-maintenance',
                'description' => 'Regular AC maintenance and cleaning service',
                'base_price' => 100.00,
                'hourly_rate' => 50.00,
                'estimated_duration' => 90,
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'category_id' => $acCategory->id,
                'name' => 'AC Installation',
                'slug' => 'ac-installation',
                'description' => 'New AC unit installation service',
                'base_price' => 300.00,
                'hourly_rate' => 100.00,
                'estimated_duration' => 240,
                'is_active' => true,
                'sort_order' => 3,
            ],

            // Refrigerator Services
            [
                'category_id' => $refrigeratorCategory->id,
                'name' => 'Refrigerator Repair',
                'slug' => 'refrigerator-repair',
                'description' => 'Complete refrigerator repair service',
                'base_price' => 120.00,
                'hourly_rate' => 60.00,
                'estimated_duration' => 90,
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'category_id' => $refrigeratorCategory->id,
                'name' => 'Refrigerator Maintenance',
                'slug' => 'refrigerator-maintenance',
                'description' => 'Refrigerator cleaning and maintenance service',
                'base_price' => 80.00,
                'hourly_rate' => 40.00,
                'estimated_duration' => 60,
                'is_active' => true,
                'sort_order' => 2,
            ],

            // Washing Machine Services
            [
                'category_id' => $washingMachineCategory->id,
                'name' => 'Washing Machine Repair',
                'slug' => 'washing-machine-repair',
                'description' => 'Complete washing machine repair service',
                'base_price' => 100.00,
                'hourly_rate' => 50.00,
                'estimated_duration' => 90,
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'category_id' => $washingMachineCategory->id,
                'name' => 'Washing Machine Maintenance',
                'slug' => 'washing-machine-maintenance',
                'description' => 'Washing machine cleaning and maintenance service',
                'base_price' => 70.00,
                'hourly_rate' => 35.00,
                'estimated_duration' => 60,
                'is_active' => true,
                'sort_order' => 2,
            ],

            // Dishwasher Services
            [
                'category_id' => $dishwasherCategory->id,
                'name' => 'Dishwasher Repair',
                'slug' => 'dishwasher-repair',
                'description' => 'Complete dishwasher repair service',
                'base_price' => 90.00,
                'hourly_rate' => 45.00,
                'estimated_duration' => 75,
                'is_active' => true,
                'sort_order' => 1,
            ],

            // Microwave Services
            [
                'category_id' => $microwaveCategory->id,
                'name' => 'Microwave Repair',
                'slug' => 'microwave-repair',
                'description' => 'Complete microwave repair service',
                'base_price' => 80.00,
                'hourly_rate' => 40.00,
                'estimated_duration' => 60,
                'is_active' => true,
                'sort_order' => 1,
            ],

            // Oven & Stove Services
            [
                'category_id' => $ovenCategory->id,
                'name' => 'Oven Repair',
                'slug' => 'oven-repair',
                'description' => 'Complete oven repair service',
                'base_price' => 110.00,
                'hourly_rate' => 55.00,
                'estimated_duration' => 90,
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'category_id' => $ovenCategory->id,
                'name' => 'Stove Repair',
                'slug' => 'stove-repair',
                'description' => 'Complete stove repair service',
                'base_price' => 100.00,
                'hourly_rate' => 50.00,
                'estimated_duration' => 75,
                'is_active' => true,
                'sort_order' => 2,
            ],

            // Water Heater Services
            [
                'category_id' => $waterHeaterCategory->id,
                'name' => 'Water Heater Repair',
                'slug' => 'water-heater-repair',
                'description' => 'Complete water heater repair service',
                'base_price' => 130.00,
                'hourly_rate' => 65.00,
                'estimated_duration' => 120,
                'is_active' => true,
                'sort_order' => 1,
            ],

            // Dryer Services
            [
                'category_id' => $dryerCategory->id,
                'name' => 'Dryer Repair',
                'slug' => 'dryer-repair',
                'description' => 'Complete dryer repair service',
                'base_price' => 95.00,
                'hourly_rate' => 47.50,
                'estimated_duration' => 75,
                'is_active' => true,
                'sort_order' => 1,
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
