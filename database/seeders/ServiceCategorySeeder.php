<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ServiceCategory;

class ServiceCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Air Conditioning',
                'slug' => 'air-conditioning',
                'description' => 'AC repair, maintenance, and installation services',
                'icon' => 'air-conditioning',
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'Refrigerator',
                'slug' => 'refrigerator',
                'description' => 'Refrigerator repair and maintenance services',
                'icon' => 'refrigerator',
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'name' => 'Washing Machine',
                'slug' => 'washing-machine',
                'description' => 'Washing machine repair and maintenance services',
                'icon' => 'washing-machine',
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'name' => 'Dishwasher',
                'slug' => 'dishwasher',
                'description' => 'Dishwasher repair and maintenance services',
                'icon' => 'dishwasher',
                'is_active' => true,
                'sort_order' => 4,
            ],
            [
                'name' => 'Microwave',
                'slug' => 'microwave',
                'description' => 'Microwave repair and maintenance services',
                'icon' => 'microwave',
                'is_active' => true,
                'sort_order' => 5,
            ],
            [
                'name' => 'Oven & Stove',
                'slug' => 'oven-stove',
                'description' => 'Oven and stove repair and maintenance services',
                'icon' => 'oven',
                'is_active' => true,
                'sort_order' => 6,
            ],
            [
                'name' => 'Water Heater',
                'slug' => 'water-heater',
                'description' => 'Water heater repair and maintenance services',
                'icon' => 'water-heater',
                'is_active' => true,
                'sort_order' => 7,
            ],
            [
                'name' => 'Dryer',
                'slug' => 'dryer',
                'description' => 'Clothes dryer repair and maintenance services',
                'icon' => 'dryer',
                'is_active' => true,
                'sort_order' => 8,
            ],
        ];

        foreach ($categories as $category) {
            ServiceCategory::create($category);
        }
    }
}
