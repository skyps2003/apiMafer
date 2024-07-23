<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //1
        Category::create([
            'name' => 'Lácteos',
            'description' => 'Incluye productos como leche, queso, yogur, mantequilla, y otros derivados de la leche',
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        //2
        Category::create([
            'name' => 'Carnes y Aves',
            'description' => 'Engloba carnes rojas (res, cerdo) y carnes blancas (pollo, pavo), así como embutidos y productos procesados',
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        //3
        Category::create([
            'name' => 'Mariscos y Pescados',
            'description' => 'Incluye pescados frescos, congelados y enlatados, así como mariscos como camarones, mejillones y calamares',
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        //4
        Category::create([
            'name' => 'Panadería y Pastelería',
            'description' => 'Productos como pan, pasteles, croissants, galletas y otros productos horneados.',
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        //5
        Category::create([
            'name' => 'Frutas y Verduras',
            'description' => 'Categoría para productos frescos, tanto frutas como verduras, incluyendo opciones orgánicas y locales.',
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        //6
        Category::create([
            'name' => 'Alimentos en Conserva',
            'description' => 'Incluye productos como sopas enlatadas, frutas en conserva, vegetales enlatados y salsas.',
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        //7
        Category::create([
            'name' => 'Granos y Cereales',
            'description' => 'Productos como arroz, pasta, avena, y cereales para desayuno.',
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        //8
        Category::create([
            'name' => 'Bebidas',
            'description' => 'Incluye jugos, refrescos, bebidas alcohólicas y no alcohólicas, así como agua embotellada.',
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        //9
        Category::create([
            'name' => 'Especias y Condimentos',
            'description' => 'Productos como sal, pimienta, hierbas secas, salsas y aderezos.',
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        //10
        Category::create([
            'name' => 'Snacks y Aperitivos',
            'description' => 'Incluye productos como papas fritas, nueces, barritas energéticas y otros bocadillos.',
            'created_by' => 1,
            'updated_by' => 1,
        ]);
    }
}
