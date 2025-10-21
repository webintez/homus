<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
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
            ],
            [
                'first_name' => 'Mike',
                'last_name' => 'Wilson',
                'email' => 'mike.wilson@example.com',
                'phone' => '+1-555-0103',
                'password' => Hash::make('password123'),
                'address' => '789 Pine Street',
                'city' => 'Chicago',
                'state' => 'IL',
                'postal_code' => '60601',
                'email_verified_at' => now(),
            ],
        ];

        foreach ($customers as $customerData) {
            Customer::create($customerData);
        }
    }
}
