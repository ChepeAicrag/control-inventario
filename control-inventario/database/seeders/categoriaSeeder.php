<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class categoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorias')->insert([
            'nombre' => 'Categoria 1',
            'status_delete' => false,
            'descripcion' => 'es la categoria 1',
        ]);
        DB::table('categorias')->insert([
            'nombre' => 'Categoria 3',
            'status_delete' => false,
            'descripcion' => 'es la categoria 3',
        ]);
        DB::table('categorias')->insert([
            'nombre' => 'Categoria 2',
            'status_delete' => false,
            'descripcion' => 'es la categoria 2',
        ]);
    }
}
