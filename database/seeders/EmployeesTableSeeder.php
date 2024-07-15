<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Array of sample photo filenames
        $photos = [
            'emp1.jpg',
            'emp2.jpg',
            'emp3.jpg',
            'emp4.jpg',
            'emp5.jpg',
        ];

        // Path to the photos directory
        $photoPath = 'img/';

        DB::table('employees')->insert([
            [
                'emp_name' => 'Ella Doe',
                'birthday' => '1990-01-01',
                'gender' => 'female',
                'phone' => '1234567890',
                'address' => '123 Main St, Anytown, USA',
                'email' => 'ella.doe@example.com',
                
                'joined_date' => '2022-01-01',
                'image' => $photoPath . $photos[array_rand($photos)], // Randomly pick a photo
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'emp_name' => 'Jane Smith',
                'birthday' => '1992-05-15',
                'gender' => 'female',
                'phone' => '0987654321',
                'address' => '456 Main St, Anytown, USA',
                'email' => 'jane.smith@example.com',
                
                'joined_date' => '2021-06-15',
                'image' => $photoPath . $photos[array_rand($photos)], // Randomly pick a photo
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'emp_name' => 'Anna Fernando',
                'birthday' => '1992-05-15',
                'gender' => 'female',
                'phone' => '0977654321',
                'address' => '456 Main St, Anytown, USA',
                'email' => 'anna@example.com',
                
                'joined_date' => '2021-06-15',
                'image' => $photoPath . $photos[array_rand($photos)], // Randomly pick a photo
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
