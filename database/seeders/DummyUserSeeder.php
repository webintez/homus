<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Customer;
use App\Models\Technician;
use App\Models\ServiceCategory;

class DummyUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create dummy customers
        $customers = [
            [
                'first_name' => 'John',
                'last_name' => 'Smith',
                'email' => 'john.smith@example.com',
                'phone' => '+1-555-0101',
                'password' => Hash::make('password123'),
                'address' => '123 Main Street',
                'city' => 'New York',
                'state' => 'NY',
                'postal_code' => '10001',
                'email_verified_at' => now(),
                'phone_verified_at' => now(),
                'is_active' => true,
            ],
            [
                'first_name' => 'Sarah',
                'last_name' => 'Johnson',
                'email' => 'sarah.johnson@example.com',
                'phone' => '+1-555-0102',
                'password' => Hash::make('password123'),
                'address' => '456 Oak Avenue',
                'city' => 'Los Angeles',
                'state' => 'CA',
                'postal_code' => '90210',
                'email_verified_at' => now(),
                'phone_verified_at' => now(),
                'is_active' => true,
            ],
            [
                'first_name' => 'Mike',
                'last_name' => 'Wilson',
                'email' => 'mike.wilson@example.com',
                'phone' => '+1-555-0103',
                'password' => Hash::make('password123'),
                'address' => '789 Pine Road',
                'city' => 'Chicago',
                'state' => 'IL',
                'postal_code' => '60601',
                'email_verified_at' => now(),
                'phone_verified_at' => now(),
                'is_active' => true,
            ],
        ];

        foreach ($customers as $customerData) {
            Customer::create($customerData);
        }

        // Create dummy technicians
        $technicians = [
            [
                'first_name' => 'David',
                'last_name' => 'Brown',
                'email' => 'david.brown@example.com',
                'phone' => '+1-555-0201',
                'password' => Hash::make('password123'),
                'address' => '321 Elm Street',
                'city' => 'New York',
                'state' => 'NY',
                'postal_code' => '10002',
                'skills' => ['Air Conditioning', 'Refrigerator', 'Washing Machine'],
                'service_areas' => ['Downtown', 'North Side', 'East Side'],
                'id_proof' => 'technician-documents/dummy-id-1.pdf',
                'certificate' => 'technician-documents/dummy-cert-1.pdf',
                'rating' => 4.8,
                'total_jobs' => 45,
                'completed_jobs' => 42,
                'status' => 'approved',
                'is_available' => true,
                'available_from' => '08:00',
                'available_to' => '18:00',
                'available_days' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
                'email_verified_at' => now(),
                'phone_verified_at' => now(),
                'approved_at' => now(),
            ],
            [
                'first_name' => 'Lisa',
                'last_name' => 'Davis',
                'email' => 'lisa.davis@example.com',
                'phone' => '+1-555-0202',
                'password' => Hash::make('password123'),
                'address' => '654 Maple Drive',
                'city' => 'Los Angeles',
                'state' => 'CA',
                'postal_code' => '90211',
                'skills' => ['Dishwasher', 'Oven', 'Microwave', 'Dryer'],
                'service_areas' => ['West Side', 'Suburbs', 'All Areas'],
                'id_proof' => 'technician-documents/dummy-id-2.pdf',
                'certificate' => 'technician-documents/dummy-cert-2.pdf',
                'rating' => 4.9,
                'total_jobs' => 38,
                'completed_jobs' => 36,
                'status' => 'approved',
                'is_available' => true,
                'available_from' => '09:00',
                'available_to' => '17:00',
                'available_days' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
                'email_verified_at' => now(),
                'phone_verified_at' => now(),
                'approved_at' => now(),
            ],
            [
                'first_name' => 'Robert',
                'last_name' => 'Taylor',
                'email' => 'robert.taylor@example.com',
                'phone' => '+1-555-0203',
                'password' => Hash::make('password123'),
                'address' => '987 Cedar Lane',
                'city' => 'Chicago',
                'state' => 'IL',
                'postal_code' => '60602',
                'skills' => ['Water Heater', 'Garbage Disposal', 'Other'],
                'service_areas' => ['South Side', 'Rural Areas'],
                'id_proof' => 'technician-documents/dummy-id-3.pdf',
                'certificate' => 'technician-documents/dummy-cert-3.pdf',
                'rating' => 4.7,
                'total_jobs' => 52,
                'completed_jobs' => 48,
                'status' => 'approved',
                'is_available' => true,
                'available_from' => '07:00',
                'available_to' => '19:00',
                'available_days' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
                'email_verified_at' => now(),
                'phone_verified_at' => now(),
                'approved_at' => now(),
            ],
            [
                'first_name' => 'Jennifer',
                'last_name' => 'Martinez',
                'email' => 'jennifer.martinez@example.com',
                'phone' => '+1-555-0204',
                'password' => Hash::make('password123'),
                'address' => '147 Birch Street',
                'city' => 'Miami',
                'state' => 'FL',
                'postal_code' => '33101',
                'skills' => ['Air Conditioning', 'Refrigerator', 'Dishwasher'],
                'service_areas' => ['Downtown', 'South Side', 'East Side'],
                'id_proof' => 'technician-documents/dummy-id-4.pdf',
                'certificate' => 'technician-documents/dummy-cert-4.pdf',
                'rating' => 4.6,
                'total_jobs' => 28,
                'completed_jobs' => 25,
                'status' => 'pending',
                'is_available' => false,
                'available_from' => '10:00',
                'available_to' => '16:00',
                'available_days' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
                'email_verified_at' => now(),
                'phone_verified_at' => now(),
            ],
        ];

        foreach ($technicians as $technicianData) {
            Technician::create($technicianData);
        }

        $this->command->info('Dummy users created successfully!');
        $this->command->info('Customer credentials:');
        $this->command->info('1. john.smith@example.com / password123');
        $this->command->info('2. sarah.johnson@example.com / password123');
        $this->command->info('3. mike.wilson@example.com / password123');
        $this->command->info('');
        $this->command->info('Technician credentials:');
        $this->command->info('1. david.brown@example.com / password123 (Approved)');
        $this->command->info('2. lisa.davis@example.com / password123 (Approved)');
        $this->command->info('3. robert.taylor@example.com / password123 (Approved)');
        $this->command->info('4. jennifer.martinez@example.com / password123 (Pending)');
    }
}

