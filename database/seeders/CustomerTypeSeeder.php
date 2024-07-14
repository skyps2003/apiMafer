<?php

namespace Database\Seeders;

use App\Models\CustomerType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CustomerType::create([
            'name' => 'minorista'
        ]);
        CustomerType::create([
            'name' => 'mayorista'
        ]);
        CustomerType::create([
            'name' => 'corporativo'
        ]);
    }
}
