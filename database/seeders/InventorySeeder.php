<?php

namespace Database\Seeders;

use App\Models\Inventory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InventorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Inventory::create([
            'stock' => 12,
            'detailed_product_id' => 1,
            'location' => 'En el inventario',
            'expiration_date' => now()->addDays(30)
        ]);
        Inventory::create([
            'stock' => 12,
            'detailed_product_id' => 2,
            'location' => 'En el inventario',
            'expiration_date' => now()->addDays(30)
        ]);
        Inventory::create([
            'stock' => 12,
            'detailed_product_id' => 3,
            'location' => 'En el inventario',
            'expiration_date' => now()->addDays(30)
        ]);
        Inventory::create([
            'stock' => 12,
            'detailed_product_id' => 4,
            'location' => 'En el inventario',
            'expiration_date' => now()->addDays(30)
        ]);
        Inventory::create([
            'stock' => 12,
            'detailed_product_id' => 5,
            'location' => 'En el inventario',
            'expiration_date' => now()->addDays(30)
        ]);
        Inventory::create([
            'stock' => 12,
            'detailed_product_id' => 6,
            'location' => 'En el inventario',
            'expiration_date' => now()->addDays(30)
        ]);
        Inventory::create([
            'stock' => 12,
            'detailed_product_id' => 7,
            'location' => 'En el inventario',
            'expiration_date' => now()->addDays(30)
        ]);
        Inventory::create([
            'stock' => 12,
            'detailed_product_id' => 8,
            'location' => 'En el inventario',
            'expiration_date' => now()->addDays(30)
        ]);
        Inventory::create([
            'stock' => 12,
            'detailed_product_id' => 9,
            'location' => 'En el inventario',
            'expiration_date' => now()->addDays(30)
        ]);
        Inventory::create([
            'stock' => 12,
            'detailed_product_id' => 10,
            'location' => 'En el inventario',
            'expiration_date' => now()->addDays(30)
        ]);
        Inventory::create([
            'stock' => 12,
            'detailed_product_id' => 11,
            'location' => 'En el inventario',
            'expiration_date' => now()->addDays(30)
        ]);
    }
}
