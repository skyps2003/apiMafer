<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'Aceite',
            'description' => 'Aceite con un sabor neutro y un alto punto de humo, ideal para freír y hornear. Rico en vitamina E y bajo en grasas saturadas.',
            'img' => 'images/aceite.jpg',
            'price' => 6,
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        Product::create([
            'name' => 'Arroz',
            'description' => 'Granos largos que se separan bien al cocinarse, con una textura ligera y esponjosa. Ideal para acompañar platos principales y en ensaladas.',
            'img' => 'images/arroz.jpg',
            'price' => 3,
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        Product::create([
            'name' => 'Atun',
            'description' => 'Atún fresco de alta calidad, conocido por su carne firme y sabor ligero. Ideal para sushi, sashimi o a la parrilla.',
            'img' => 'images/atun.jpg',
            'price' => 20,
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        Product::create([
            'name' => 'Avena',
            'description' => ' Avena precocida y procesada en copos finos, que se cocina rápidamente en unos minutos. Ideal para desayunos rápidos y fáciles.',
            'img' => 'images/avena.jpg',
            'price' => 7,
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        Product::create([
            'name' => 'Barras Energéticas',
            'description' => 'Barras con alto contenido de proteína, a menudo recubiertas con una capa de chocolate. Ideales para un impulso de energía y para después del ejercicio.',
            'img' => 'images/barras.jpg',
            'price' => 1.5,
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        Product::create([
            'name' => 'Brócoli',
            'description' => 'Vegetal crucífero con una cabeza compacta de floretes verdes, rico en vitaminas C y K, y fibra. Ideal para cocinar al vapor, saltear o agregar a ensaladas.',
            'img' => 'images/brocoli.jpg',
            'price' => 2,
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        Product::create([
            'name' => 'Café',
            'description' => 'Café de alta calidad con un sabor suave y notas afrutadas o florales. Es el tipo de café más común y apreciado. Ideal para preparación en máquina de espresso, prensa francesa o filtro.',
            'img' => 'images/cafe.jpg',
            'price' => 10,
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        Product::create([
            'name' => 'Calamares',
            'description' => 'Calamares enteros, que incluyen el cuerpo, tentáculos y a menudo la piel. Ideal para asar, freír o preparar a la parrilla.',
            'img' => 'images/cafe.jpg',
            'price' => 15,
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        Product::create([
            'name' => 'Donuts',
            'description' => 'Donuts simples cubiertos con un glaseado dulce, generalmente de vainilla o chocolate. Son suaves y tienen un sabor delicado.',
            'img' => 'images/donuts.jpg',
            'price' => 2,
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        Product::create([
            'name' => 'Espinaca',
            'description' => 'Hojas de espinaca frescas, crujientes y verdes, ideales para ensaladas, salteados o smoothies. Rica en vitaminas A, C y K, así como en hierro y antioxidantes.',
            'img' => 'images/espinaca.jpg',
            'price' => 2,
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        Product::create([
            'name' => 'Filete de Res',
            'description' => 'Corte tierno y jugoso del lomo de la res. Es conocido por su suavidad y textura, ideal para asar a la parrilla o cocinar en sartén.',
            'img' => 'images/filete.jpg',
            'price' => 40,
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        Product::create([
            'name' => 'Filete de Salmón',
            'description' => 'Filete de salmón de agua fría, conocido por su sabor rico y textura firme. Ideal para asar, cocinar a la parrilla o hacer al horno.',
            'img' => 'images/filtesalmon.jpg',
            'price' => 30,
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        Product::create([
            'name' => 'Jugo de Naranja',
            'description' => 'Jugo de naranjas frescas exprimidas al momento, sin aditivos ni conservantes. Ofrece un sabor fresco y natural, con alto contenido de vitamina C.',
            'img' => 'images/jugoN.jpg',
            'price' => 6,
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        Product::create([
            'name' => 'Leche de Vaca',
            'description' => 'Leche con su contenido completo de grasa, ofreciendo una textura cremosa y un sabor rico. Ideal para quienes buscan una leche más nutritiva.',
            'img' => 'images/leche.jpg',
            'price' => 3,
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        Product::create([
            'name' => 'Manzanas',
            'description' => 'Manzana grande, crujiente y muy dulce, con una textura jugosa. Ideal para comer fresca o usar en postres y ensaladas.',
            'img' => 'images/manzana.jpg',
            'price' => 5,
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        Product::create([
            'name' => 'Nueces',
            'description' => 'Nuez con una cáscara dura y una carne rica y suave. Se puede comer cruda, tostada o usar en recetas de repostería.',
            'img' => 'images/nueces.jpg',
            'price' => 30,
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        Product::create([
            'name' => 'Pan',
            'description' => 'Pan hecho con harina integral, ofreciendo un sabor más robusto y un contenido más alto en fibra. Ideal para sándwiches y como opción más saludable.',
            'img' => 'images/pan.jpg',
            'price' => 2.50,
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        Product::create([
            'name' => 'Papas Fritas',
            'description' => 'apas fritas cortadas en tiras delgadas y congeladas. Se pueden freír o hornear para obtener una textura crujiente.',
            'img' => 'images/papas.jpg',
            'price' => 2,
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        Product::create([
            'name' => 'Paprika',
            'description' => 'Polvo de pimiento rojo seco con un sabor suave y dulce. Ideal para añadir color y un toque sutil de dulzura a sopas, guisos, y carnes.',
            'img' => 'images/paprika.jpg',
            'price' => 3,
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        Product::create([
            'name' => 'Pastas',
            'description' => 'Pasta larga y delgada, ideal para acompañar salsas como la boloñesa o carbonara.',
            'img' => 'images/pasta.jpg',
            'price' => 4,
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        Product::create([
            'name' => 'Pechuga de Pollo',
            'description' => 'Pechuga de pollo sin huesos y sin piel, ideal para una preparación rápida y limpia. Perfecta para asar, freír, o cocinar a la parrilla.',
            'img' => 'images/pechuga.jpg',
            'price' => 8,
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        Product::create([
            'name' => 'Queso Fresco',
            'description' => 'Queso blando y sin curar, con una textura suave y desmenuzable. Tiene un sabor suave y ligeramente ácido. Ideal para ensaladas, tacos y como acompañamiento en diversos platillos.',
            'img' => 'images/queso.jpg',
            'price' => 11,
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        Product::create([
            'name' => 'Sal',
            'description' => 'al refinada con gránulos muy finos, comúnmente utilizada en la cocina diaria y en la mesa para sazonar alimentos.',
            'img' => 'images/sal.jpg',
            'price' => 3,
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        Product::create([
            'name' => 'Salchichas',
            'description' => 'Salchichas elaboradas con carne de cerdo, a menudo sazonadas con especias y hierbas. Son ideales para asar a la parrilla, freír o cocinar en guisos.',
            'img' => 'images/salchicha.jpg',
            'price' => 12,
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        Product::create([
            'name' => 'Salsas',
            'description' => 'Salsa agridulce con base de tomate y especias, ideal para costillas, hamburguesas y pollo a la parrilla.',
            'img' => 'images/salsas.jpg',
            'price' => 7,
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        Product::create([
            'name' => 'Sopa',
            'description' => 'Sopa hecha con caldo de pollo, vegetales y trozos de pollo. A menudo incluye fideos o arroz. Ideal para reconfortar y como remedio para resfriados.',
            'img' => 'images/sopa.jpg',
            'price' => 3,
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        Product::create([
            'name' => 'Té',
            'description' => 'Té negro aromatizado con aceite de bergamota, dando un sabor distintivo y cítrico. Ideal para tomar con leche o solo.',
            'img' => 'images/te.jpg',
            'price' => 5,
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        Product::create([
            'name' => 'Vegetales enlatados',
            'description' => 'Granos de maíz cocidos y conservados en una lata. Ideal para ensaladas, sopas y como acompañamiento.',
            'img' => 'images/vegetales.jpg',
            'price' => 2,
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        Product::create([
            'name' => 'Yogur',
            'description' => 'Yogur sin sabores añadidos, con un sabor suave y ácido. Ideal para mezclas con frutas, miel o para usar en recetas.',
            'img' => 'images/yogur.jpg',
            'price' => 2,
            'created_by' => 1,
            'updated_by' => 1,
        ]);
    }
}
