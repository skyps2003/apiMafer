<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Company::create([
            'name' => 'Mafer',
            'description' => 'Mafer S.A. es una empresa dedicada a la producción y comercialización de una amplia variedad de productos derivados de la leche, así como otros productos dulces de alta calidad. Nuestra misión es ofrecer a nuestros clientes sabores únicos y nutritivos, utilizando ingredientes frescos y procesos de elaboración que conservan las propiedades naturales de los alimentos.',
            'img' => 'http://127.0.0.1:8000/storage/images/logo.png',
            'address' => 'ni idea',
            'phone' => '123456789',
            'created_by' => 1,
            'updated_by' => 1
        ]);
    }
}
