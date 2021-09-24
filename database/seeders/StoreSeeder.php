<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Stores\Store;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // List of stores
        $stores = [
            ['carrefour', 'Carrefour', 'https://www.carrefour.com.ar'],
            ['cordiez', 'Cordiez', 'https://www.cordiez.com.ar'],
            ['libertad', 'Hiper Libertad', 'https://www.hiperlibertad.com.ar'],
            ['diaonline', 'Supermercados Día', 'https://diaonline.supermercadosdia.com.ar'],
            ['vea', 'Supermercado Vea', 'https://www.vea.com.ar'],
            ['walmart', 'Walmart', 'https://www.walmart.com.ar'],
        ];

        // Iterate and create.
        foreach ($stores as $store) {
            Store::factory()->create([
                'storeShortName'        => $store[0],
                'storeFullName'         => $store[1],
                'storeApiUrl'           => $store[2],
                'enableApiScrapping'    => false,
                'isaVtexStore'          => true,
            ]);
        }
    }
}
