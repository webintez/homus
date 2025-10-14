<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Booking;
use App\Models\Customer;
use App\Models\Technician;
use App\Models\Service;
use App\Models\BookingStatus;

class SampleBookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get some customers and technicians
        $customers = Customer::all();
        $technicians = Technician::where('status', 'approved')->get();
        $services = Service::all();

        if ($customers->isEmpty() || $technicians->isEmpty() || $services->isEmpty()) {
            $this->command->info('No customers, technicians, or services found. Please run other seeders first.');
            return;
        }

        // Create sample bookings
        $bookings = [
            [
                'customer_id' => $customers->first()->id,
                'technician_id' => $technicians->first()->id,
                'service_id' => $services->first()->id,
                'appliance_type' => 'Samsung Refrigerator',
                'issue_description' => 'Refrigerator is not cooling properly. The temperature is not maintaining the set level.',
                'customer_address' => '123 Main Street, New York, NY 10001',
                'customer_city' => 'New York',
                'customer_state' => 'NY',
                'customer_postal_code' => '10001',
                'customer_phone' => '+1-555-0101',
                'preferred_date' => now()->addDays(2)->format('Y-m-d'),
                'preferred_time' => '10:00',
                'status' => 'completed',
                'estimated_price' => 150.00,
                'final_price' => 175.00,
                'technician_notes' => 'Replaced faulty thermostat and cleaned condenser coils. Refrigerator is now cooling properly.',
                'accepted_at' => now()->subDays(3),
                'started_at' => now()->subDays(2),
                'completed_at' => now()->subDays(1),
            ],
            [
                'customer_id' => $customers->skip(1)->first()->id,
                'technician_id' => $technicians->skip(1)->first()->id,
                'service_id' => $services->skip(1)->first()->id,
                'appliance_type' => 'Whirlpool Washing Machine',
                'issue_description' => 'Washing machine is making loud noises during the spin cycle.',
                'customer_address' => '456 Oak Avenue, Los Angeles, CA 90210',
                'customer_city' => 'Los Angeles',
                'customer_state' => 'CA',
                'customer_postal_code' => '90210',
                'customer_phone' => '+1-555-0102',
                'preferred_date' => now()->addDays(1)->format('Y-m-d'),
                'preferred_time' => '14:00',
                'status' => 'in_progress',
                'estimated_price' => 200.00,
                'accepted_at' => now()->subDays(1),
                'started_at' => now()->subHours(2),
            ],
            [
                'customer_id' => $customers->skip(2)->first()->id,
                'service_id' => $services->skip(2)->first()->id,
                'appliance_type' => 'LG Air Conditioner',
                'issue_description' => 'Air conditioner is not turning on. No response when trying to power it on.',
                'customer_address' => '789 Pine Road, Chicago, IL 60601',
                'customer_city' => 'Chicago',
                'customer_state' => 'IL',
                'customer_postal_code' => '60601',
                'customer_phone' => '+1-555-0103',
                'preferred_date' => now()->addDays(3)->format('Y-m-d'),
                'preferred_time' => '09:00',
                'status' => 'pending',
                'estimated_price' => 120.00,
            ],
            [
                'customer_id' => $customers->first()->id,
                'technician_id' => $technicians->skip(2)->first()->id,
                'service_id' => $services->first()->id,
                'appliance_type' => 'GE Dishwasher',
                'issue_description' => 'Dishwasher is not draining properly. Water remains at the bottom after cycle completes.',
                'customer_address' => '123 Main Street, New York, NY 10001',
                'customer_city' => 'New York',
                'customer_state' => 'NY',
                'customer_postal_code' => '10001',
                'customer_phone' => '+1-555-0101',
                'preferred_date' => now()->addDays(5)->format('Y-m-d'),
                'preferred_time' => '11:00',
                'status' => 'accepted',
                'estimated_price' => 100.00,
                'accepted_at' => now()->subHours(6),
            ],
            [
                'customer_id' => $customers->skip(1)->first()->id,
                'service_id' => $services->skip(1)->first()->id,
                'appliance_type' => 'KitchenAid Oven',
                'issue_description' => 'Oven is not heating up. The temperature does not reach the set level.',
                'customer_address' => '456 Oak Avenue, Los Angeles, CA 90210',
                'customer_city' => 'Los Angeles',
                'customer_state' => 'CA',
                'customer_postal_code' => '90210',
                'customer_phone' => '+1-555-0102',
                'preferred_date' => now()->addDays(4)->format('Y-m-d'),
                'preferred_time' => '15:00',
                'status' => 'pending',
                'estimated_price' => 180.00,
            ],
        ];

        foreach ($bookings as $bookingData) {
            // Generate booking number
            $bookingNumber = 'BK' . date('Ymd') . str_pad(Booking::whereDate('created_at', today())->count() + 1, 4, '0', STR_PAD_LEFT);
            $bookingData['booking_number'] = $bookingNumber;

            $booking = Booking::create($bookingData);

            // Create status records
            $statuses = [
                ['status' => 'pending', 'notes' => 'Booking created by customer', 'created_at' => $booking->created_at],
            ];

            if (isset($bookingData['accepted_at'])) {
                $statuses[] = ['status' => 'accepted', 'notes' => 'Booking accepted by technician', 'created_at' => $bookingData['accepted_at']];
            }

            if (isset($bookingData['started_at'])) {
                $statuses[] = ['status' => 'in_progress', 'notes' => 'Job started by technician', 'created_at' => $bookingData['started_at']];
            }

            if (isset($bookingData['completed_at'])) {
                $statuses[] = ['status' => 'completed', 'notes' => 'Job completed by technician', 'created_at' => $bookingData['completed_at']];
            }

            foreach ($statuses as $statusData) {
                $booking->statuses()->create([
                    'status' => $statusData['status'],
                    'notes' => $statusData['notes'],
                    'created_at' => $statusData['created_at'],
                ]);
            }
        }

        $this->command->info('Sample bookings created successfully!');
    }
}
