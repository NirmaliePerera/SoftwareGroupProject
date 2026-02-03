<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Products = [
            [
                'name' => 'A-Line',
                'category' => 'Wedding frock',
                'color' => 'Sugar White',
                'size' => 'Small',
                'initial_price' => 100000.00,
                'description' => 'Wedding frock, A-line, sugar white, long, deep neck',
                'image' => 'https://i.pinimg.com/564x/ae/2b/58/ae2b58289de4ada4c4173fc699c9b83f.jpg'
            ],
            [
                'name' => 'Mermaid',
                'category' => 'Wedding frock',
                'color' => 'Pio White',
                'size' => 'Medium',
                'initial_price' => 120000.00,
                'description' => 'Wedding Frock, Fish Tail, Pio White',
                'image' => 'https://i.pinimg.com/564x/e3/66/4d/e3664dc1fe1f135c74555af856d4f6bb.jpg'
            ],
            [
                'name' => 'Slip',
                'category' => 'Wedding frock',
                'color' => 'Sugar White',
                'size' => 'Large',
                'initial_price' => 90000.00,
                'description' => 'Wedding frock, A-line, sugar white, long, deep neck',
                'image' => 'https://i.pinimg.com/564x/f7/f2/b0/f7f2b060a3cd7387784978d7b97a40ce.jpg'
            ],

        ];
        foreach ($Products as $key => $value){
            Product::create($value);
        }
    }
}
