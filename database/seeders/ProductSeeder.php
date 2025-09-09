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
        Product::create([
            'name' => 'Paket Kenalan',
            'description' => '3 Churros original dengan taburan kayu manis dan saus coklat klasik.',
            'price' => 15000,
            'is_bestseller' => true,
            'is_available' => true,
        ]);

        Product::create([
            'name' => 'Paket Rame-Rame',
            'description' => '10 Churros porsi besar dengan 3 pilihan saus: coklat, vanilla, dan strawberry.',
            'price' => 45000,
            'is_bestseller' => false,
            'is_available' => true,
        ]);

        Product::create([
            'name' => 'Paket Sendiri',
            'description' => '2 Churros jumbo dengan isian coklat lumer di dalamnya.',
            'price' => 12000,
            'is_bestseller' => false,
            'is_available' => false,
        ]);
    }
}
