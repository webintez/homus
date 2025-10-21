<?php

namespace Database\Seeders;

use App\Models\Technician;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class TechnicianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $technicians = [
            [
                'first_name' => 'David',
                'last_name' => 'Brown',
                'email' => 'david.brown@example.com',
                'phone' => '+1-555-0201',
                'password' => Hash::make('password123'),
                'address' => '123 Tech Street',
                'city' => 'New York',
                'state' => 'NY',
                'postal_code' => '10001',
                'skills' => 'AC, Refrigerator, Washing Machine',
                'rating' => 4.8,
                'total_jobs' => 45,
                'completed_jobs' => 45,
                'status' => 'approved',
                'is_available' => true,
                'available_from' => '09:00',
                'available_to' => '18:00',
                'available_days' => 'Monday,Tuesday,Wednesday,Thursday,Friday,Saturday',
                'email_verified_at' => now(),
                'approved_at' => now(),
            ],
            [
                'first_name' => 'Lisa',
                'last_name' => 'Davis',
                'email' => 'lisa.davis@example.com',
                'phone' => '+1-555-0202',
                'password' => Hash::make('password123'),
                'address' => '456 Repair Avenue',
                'city' => 'Los Angeles',
                'state' => 'CA',
                'postal_code' => '90210',
                'skills' => 'Dishwasher, Oven, Microwave, Dryer',
                'rating' => 4.9,
                'total_jobs' => 38,
                'completed_jobs' => 38,
                'status' => 'approved',
                'is_available' => true,
                'available_from' => '08:00',
                'available_to' => '17:00',
                'available_days' => 'Monday,Tuesday,Wednesday,Thursday,Friday,Saturday',
                'email_verified_at' => now(),
                'approved_at' => now(),
            ],
            [
                'first_name' => 'Robert',
                'last_name' => 'Taylor',
                'email' => 'robert.taylor@example.com',
                'phone' => '+1-555-0203',
                'password' => Hash::make('password123'),
                'address' => '789 Service Road',
                'city' => 'Chicago',
                'state' => 'IL',
                'postal_code' => '60601',
                'skills' => 'Water Heater, Garbage Disposal',
                'rating' => 4.7,
                'total_jobs' => 52,
                'completed_jobs' => 52,
                'status' => 'approved',
                'is_available' => true,
                'available_from' => '10:00',
                'available_to' => '19:00',
                'available_days' => 'Monday,Tuesday,Wednesday,Thursday,Friday,Saturday',
                'email_verified_at' => now(),
                'approved_at' => now(),
            ],
            [
                'first_name' => 'Jennifer',
                'last_name' => 'Martinez',
                'email' => 'jennifer.martinez@example.com',
                'phone' => '+1-555-0204',
                'password' => Hash::make('password123'),
                'address' => '321 Fix Lane',
                'city' => 'Houston',
                'state' => 'TX',
                'postal_code' => '77001',
                'skills' => 'AC, Refrigerator, Dishwasher',
                'rating' => 0.0,
                'total_jobs' => 0,
                'completed_jobs' => 0,
                'status' => 'pending',
                'is_available' => false,
                'available_from' => '09:00',
                'available_to' => '17:00',
                'available_days' => 'Monday,Tuesday,Wednesday,Thursday,Friday',
                'email_verified_at' => now(),
            ],
        ];

        foreach ($technicians as $technicianData) {
            Technician::create($technicianData);
        }
    }
}
