<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categories\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // List of categories
        $categories = [
            [
                'name'      => "Almacén",
                'slug'      => "almacén",
                'similar'   => "almacén, aceites, acetos, aderezos, arroz, legumbres, caldos, sopas, puré, condimentos, conservas, harinas, sal, snacks, copetín, vinagres, frescos, rotisería, comidas, preparadas",
            ],
            [
                'name'      => "Automotor",
                'slug'      => "automotor",
                'similar'   => "accesorios, automotor, auto, autos, alfombras, fundas, cobertores, baterias, lubricantes, aditivos, motos, neumáticos, vehículos",
            ],
            [
                'name'      => "Bazar",
                'slug'      => "bazar",
                'similar'   => "bazar, hogar, organización, muebles, bicicletas, rodados, blanco, ferretería, indumentaria, juguetes, librería, mobiliario, platos, copas, cubiertos, vivero, adhesivos, aire, tiempo, libre, bolsos, valijas, camping, cotillón, decoración, jardín, fitness, halloween, herramientas, cajas, escaleras, deco, lamparitas, electricidad, libros, macetas, semillas, tierras, abonos, máquinas, playa, música, navidad, año, nuevo, deportes, paseo, viaje, piletas, accesorios, vuelta, cole, textil, ropa, para, cocina, mesa, cama, baño",
            ],
            [
                'name'      => "Bebés y Niños",
                'slug'      => "bebés-y-niños",
                'similar'   => "cuidado, bebé, bebés, niños, pañales, alimentación, infantil, juegos, mesa, juguetes, mundo, peluches, primera, infancia, varios",
            ],
            [
                'name'      => "Bebidas",
                'slug'      => "bebidas",
                'similar'   => "bebidas, aguas, aperitivos, licores, cervezas, espumantes, sidras, gaseosas, jugos, vinos, isotónicas, energizantes, jugos",
            ],
            [
                'name'      => "Carnes",
                'slug'      => "carnes",
                'similar'   => "carnes, aves, vacunos, cerdo, chasinados, embutidos, pescados, pulpas, parrillas, carbon, carbón, leña, carnicería, pescadería, pescados, mariscos",
            ],
            [
                'name'      => "Combos",
                'slug'      => "combos",
                'similar'   => "combos",
            ],
            [
                'name'      => "Congelados",
                'slug'      => "congelados",
                'similar'   => "congelados, helados",
            ],
            [
                'name'      => "Cuidado de la ropa",
                'slug'      => "cuidado-de-la-ropa",
                'similar'   => "cuidado, ropa, aprestos, quitamanchas, jabon, polvo, líquido, barra, lavado",
            ],
            [
                'name'      => "Cuidado Personal",
                'slug'      => "cuidado-personal",
                'similar'   => "cuidado, personal, botiquín, farmacia, bucal, desodorantes, jabones, cremas, afeitar, perfumes, colonias, shampoo, enjuague, tinturas, fijadores, toallas, apósitos, perfumería, protección, femenina, corporal, adulto, cabello, facial, oral, mamá",
            ],
            [
                'name'      => "Desayuno y Merienda",
                'slug'      => "desayuno-y-merienda",
                'similar'   => "desayuno, merienda, golosinas, cacaos, café, cereales, avenas, dulces, jaleas, galletas, infusiones, yerbas, azucar, edulcorante, té, base, hierbas",
            ],
            [
                'name'      => "Fiambres y Quesos",
                'slug'      => "fiambres-y-quesos",
                'similar'   => "fiambres, quesos, aceitunas, encurtidos, pickles, salames, mortadelas, salchichas, hamburguesas, untables, fiambrería",
            ],
            [
                'name'      => "Frutas y Verduras",
                'slug'      => "frutas-y-verduras",
                'similar'   => "frutas, verduras, frutos, secos, huevos",
            ],
            [
                'name'      => "Indumentaria y calzado",
                'slug'      => "indumentaria-y-calzado",
                'similar'   => "indumentaria, calzado, moda, otros, deportes",
            ],
            [
                'name'      => "Kiosco",
                'slug'      => "kiosco",
                'similar'   => "kiosco, alfajores, caramelos, chicles, chocolates, turrones, crocantes",
            ],
            [
                'name'      => "Lácteos",
                'slug'      => "lácteos",
                'similar'   => "lácteos, cremas, leches, mantecas, margarinas, postres, flanes, yogures, productos, frescos",
            ],
            [
                'name'      => "Limpieza y Hogar",
                'slug'      => "limipieza-y-hogar",
                'similar'   => "accesorios, limpíeza, hogar, baños, cocinas, bolsas, residuos, cuidado, desodorante, ambiente, ambientes, iluminación, energía, insecticidas, repelentes, lavavajillas, papeles, pisos, muebles, trapos, esponjas, guantes, calefacción, calefones, termotanques, climatización, extractores, colchones, sommiers, almohadas, electro, heladeras, freezers, lavandina, pequeño, pinturería, tecnología, electrodomésticos, calzado, ropa, interior",
            ],
            [
                'name'      => "Mascotas",
                'slug'      => "mascotas",
                'similar'   => "mascotas, alimentos, aves, gatos, perros, accesorios",
            ],
            [
                'name'      => "Otros",
                'slug'      => "otros",
                'similar'   => "otros, sin, categoría, taeq, test, category, no, corresponde",
            ],
            [
                'name'      => "Panadería y Repostería",
                'slug'      => "panadería-y-repostería",
                'similar'   => "panadería, pan, lactal, pizzas, panificados, repostería, grasas, levaduras, postres, flanes, gelatinas, reposteros",
            ],
            [
                'name'      => "Pastas",
                'slug'      => "pastas",
                'similar'   => "pastas, frescas, secas, tapas, harinas",
            ],
            [
                'name'      => "Sin Gluten y Diet",
                'slug'      => "sin-gluten-y-diet",
                'similar'   => "sin, gluten, diet, dietéticos",
            ],
            [
                'name'      => "Tecnología",
                'slug'      => "tecnología",
                'similar'   => "tecnología, telefonía, celular, audio, almacenamiento, gaming, impresoras, informática, películas, tv, video",
            ],
        ];

        // Iterate and create.
        foreach ($categories as $category) {
            Category::factory()->create([
                'name'      => $category['name'],
                'slug'      => $category['slug'],
                'similar'   => $category['similar'],
            ]);
        }
    }
}
