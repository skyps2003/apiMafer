<?php

namespace Database\Seeders;

use App\Models\Provider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Provider::create([
            'ruc' => '12345678901',
            'name' => 'Proveedor Ejemplo 1',
            'phone' => '123-456-7890',
            'email' => 'contacto1@proveedorejemplo.com',
            'reason' => 'Proveedor de productos de oficina',
            'address' => 'Av. Ejemplo 123, Ciudad, País',
            'created_by' => 1,
            'updated_by' => 1
        ]);
    }
}
