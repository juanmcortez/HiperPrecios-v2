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
                'searchable' => "on",
                'name'      => "Almacén",
                'slug'      => "almacén",
                'similar'   => "almacén, desayuno-y-merienda, kiosco, frescos, comidas-preparadas, aceites-y-aderezos, arroz-y-legumbres, conservas, desayuno-y-golosinas, snacks, sopas-caldos-y-puré, dulces-frescos, dulce-de-membrillo-y-otros-dulces, sal, postres-flanes-y-gelatinas",
            ],
            [
                'name'      => "Automotor",
                'slug'      => "automotor",
                'similar'   => "automotor, vehículos, neumáticos, alfombras-fundas-y-cobertores-para-auto, baterias-auto, accesorios-para-autos, lubricantes-y-aditivos-para-auto, motos",
            ],
            [
                'name'      => "Bazar y Hogar",
                'slug'      => "bazar-y-hogar",
                'similar'   => "bazar, bazar-y-textil, librería, hogar, hogar-y-deco, colchones-y-sommiers, hogar-y-textil, herramientas-cajas-y-escaleras, lamparitas-y-electricidad, pintureria, bolsos-y-valijas, para-la-cocina, para-la-mesa, organización-para-la-ropa, muebles-de-interior, colchones-y-almohadas, ropa-de-cama-y-baño, decoración, libros, música, películas, ferretería, fósforos-y-velas",
            ],
            [
                'name'      => "Bebés y Niños",
                'slug'      => "bebés-y-niños",
                'similar'   => "bebés-y-niños, mundo-bebé, cuidado-del-bebé, juegos-de-mesa, juguetes, peluches, primera-infancia, alimentación-infantil, paseo-y-viaje, varios-para-el-bebé, cuidado-mamá, juguetería",
            ],
            [
                'name'      => "Bebidas",
                'slug'      => "bebidas",
                'similar'   => "bebidas, aperitivos, cervezas, vinos-y-espumantes, bebidas-blancas-y-licores, a-base-de-hierbas, aguas, gaseosas, jugos, isotónicas-y-energizantes",
            ],
            [
                'name'      => "Carnes",
                'slug'      => "carnes",
                'similar'   => "carnes, carnes-y-pescados, carnicería-y-pescadería, pescados-y-mariscos",
            ],
            [
                'name'      => "Congelados",
                'slug'      => "congelados",
                'similar'   => "congelados, hielo, salchichas, hamburguesas, hamburguesas-y-milanesas, salchichas-y-hamburguesas",
            ],
            [
                'name'      => "Cuidado de la ropa",
                'slug'      => "cuidado-de-la-ropa",
                'similar'   => "cuidado-de-la-ropa, limpieza-de-ropa, limpieza-de-calzado",
            ],
            [
                'name'      => "Cuidado Personal",
                'slug'      => "cuidado-personal",
                'similar'   => "cuidado-personal, perfumería, cuidado-del-cabello, cuidado-oral, cuidado-facial, cuidado-corporal, protección-femenina, cuidado-del-adulto, farmacia",
            ],
            [
                'name'      => "Deporte",
                'slug'      => "deporte",
                'similar'   => "deporte, deportes, rodados, bicicletas, fitness, otros-deportes, tiempo-libre-y-deportes",
            ],
            [
                'name'      => "Electro y Tecno",
                'slug'      => "electro-y-tecno",
                'similar'   => "tecnología, electro-y-tecnología, electrodomésticos, electro-hogar, electro, tv-y-video, audio, informática, gaming, telefonía, almacenamiento, impresoras, climatización, calefacción, heladeras-y-freezers, lavado, calefones-y-termotanques, cocinas-y-extractores, pequeño-electro",
            ],
            [
                'name'      => "Fiambres y Quesos",
                'slug'      => "fiambres-y-quesos",
                'similar'   => "fiambres-y-quesos, quesos-y-fiambres, fiambrería, aceitunas-y-encurtidos",
            ],
            [
                'name'      => "Frutas y Verduras",
                'slug'      => "frutas-y-verduras",
                'similar'   => "frutas-y-verduras, huevos",
            ],
            [
                'name'      => "Indumentaria y calzado",
                'slug'      => "indumentaria-y-calzado",
                'similar'   => "indumentaria-y-calzado, moda, textil, guardapolvos",
            ],
            [
                'name'      => "Jardín",
                'slug'      => "jardín",
                'similar'   => "jardín, aire-libre-y-jardín, aire-libre, tiempo-libre, camping, máquinas-y-herramientas-de-jardín, macetas-semillas-tierras-y-abonos, muebles-de-jardín-y-playa, decoración-y-accesorios-de-jardín, parrillas-y-carbón, piletas-y-accesorios, carbón-y-encendido, carbón-y-leña",
            ],
            [
                'name'      => "Lácteos",
                'slug'      => "lácteos",
                'similar'   => "lácteos, lácteos-y-productos-frescos, leches, leche-en-polvo",
            ],
            [
                'name'      => "Limpieza",
                'slug'      => "limpieza",
                'similar'   => "limpíeza, limpieza-y-hogar, desodorante-de-ambientes, papeles, limpieza-de-baño, limpieza-de-cocina, limpieza-de-pisos-y-muebles, accesorios-de-limpieza, insecticidas, lavandina, lavandinas, desodorantes-de-ambiente, artículos-de-limpieza,  papelería, limpiadores, rollos-de-cocina-y-servilletas, papeles-higiénicos, bolsas",
            ],
            [
                'name'      => "Mascotas",
                'slug'      => "mascotas",
                'similar'   => "mascotas, alimento-perro, alimento-gato, accesorios-y-otras-mascotas",
            ],
            [
                'name'      => "Otros",
                'slug'      => "otros",
                'similar'   => "combos, bolsones, otros, taeq, sin-categoría, no-corresponde, test-category, navidad-y-año-nuevo, cajas-navidenas, cotillón, halloween, vuelta-al-cole",
            ],
            [
                'name'      => "Panadería y Repostería",
                'slug'      => "panadería-y-repostería",
                'similar'   => "panadería, repostería, panadería-y-repostería, repostería-y-postres, panificados, reposteros",
            ],
            [
                'name'      => "Pastas",
                'slug'      => "pastas",
                'similar'   => "pastas, pastas-frescas-y-tapas, pastas-y-harinas, pastas-y-tapas, tapas-y-pastas-frescas, pastas-secas, levaduras, grasas, levaduras-y-grasas",
            ],
            [
                'name'      => "Sin Gluten y Diet",
                'slug'      => "sin-gluten-y-diet",
                'similar'   => "sin-gluten-y-diet, sin-tacc, libre-de-gluten, orgánicos",
            ],
        ];

        // Iterate and create.
        foreach ($categories as $category) {
            Category::factory()->create([
                'name'      => $category['name'],
                'slug'      => $category['slug'],
                'similar'   => $category['similar'],
                'searchable' => (isset($category['searchable'])) ? $category['searchable'] : "off",
            ]);
        }
    }
}
