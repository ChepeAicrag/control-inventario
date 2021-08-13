<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class catalogoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('catalogos')->insert([
            'nombre' => 'Catalogo 1',
            'status_delete' => false,
            'descripcion' => 'es el catalogo 1',
        ]);

        DB::table('catalogos')->insert([
            'nombre' => 'Catalogo 2',
            'status_delete' => false,
            'descripcion' => 'es el catalogo 2',
        ]);

        DB::table('catalogos')->insert([
            'nombre' => 'Catalogo 3',
            'status_delete' => false,
            'descripcion' => 'es el catalogo 3',
        ]);
    }
}
