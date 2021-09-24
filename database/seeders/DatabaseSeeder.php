<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\StoreSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Seed the stores.
        $stores = new StoreSeeder;
        $stores->run();
    }
}
