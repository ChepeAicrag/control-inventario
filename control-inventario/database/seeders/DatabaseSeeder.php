<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(bodegaSeeder::class);
        $this->call(catalogoSeeder::class);
        $this->call(categoriaSeeder::class);
        $this->call(productoSeeder::class);
    }
}
