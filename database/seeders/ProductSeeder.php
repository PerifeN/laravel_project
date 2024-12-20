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
        Product::create(['name' => 'Produkt 1', 'price' => 100.00]);
        Product::create(['name' => 'Produkt 2', 'price' => 150.50]);
        Product::create(['name' => 'Produkt 3', 'price' => 200.20]);    
    }
}
