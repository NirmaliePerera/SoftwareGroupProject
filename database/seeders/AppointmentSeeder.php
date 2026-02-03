<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Example data for seeding
        $appointments = [
            [
                'user_id' => 1,
                'date' => '2024-07-15',
                'time' => '10:00:00',
                'email' => 'example1@example.com',
                'service' => 'Haircut',
                'message' => 'Please be on time.',
                'status' => 'pending',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 2,
                'date' => '2024-07-16',
                'time' => '14:00:00',
                'email' => 'example2@example.com',
                'service' => 'Bridal fitting',
                'message' => 'looked for western frocks.',
                'status' => 'done',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 3,
                'date' => '2024-07-17',
                'time' => '09:00:00',
                'email' => 'example3@example.com',
                'service' => 'Manicure',
                'message' => 'Prefer French manicure.',
                'status' => 'pending',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 4,
                'date' => '2024-07-18',
                'time' => '11:00:00',
                'email' => 'example4@example.com',
                'service' => 'Brides maid gown fitting  ',
                'message' => 'Focus on Indian gowns.',
                'status' => 'pending',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 5,
                'date' => '2024-07-19',
                'time' => '15:00:00',
                'email' => 'example5@example.com',
                'service' => 'Massage',
                'message' => 'Deep tissue massage preferred.',
                'status' => 'done',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        DB::table('appointments')->insert($appointments);
    }
}
