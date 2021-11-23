<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\StoreSeeder;
use Database\Seeders\ProductSeeder;
use Database\Seeders\InternalExternalSeeder;
use Database\Seeders\CategorySeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Run all the seeds.
        $this->call([
            StoreSeeder::class,             // Seed the stores.
            CategorySeeder::class,          // Seed the product categories.
            // ProductSeeder::class,        // Seed the products.
            // InternalExternalSeeder::class,  // Seed the categories relations.
        ]);
    }
}
