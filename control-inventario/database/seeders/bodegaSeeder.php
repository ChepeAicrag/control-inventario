<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class bodegaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bodegas')->insert([
            'direccion' => 'Calle colorin',
            'nombre' => 'Bodega principal',
            'status_delete' => false,
            'descripcion' => 'Es la matriz',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);

        DB::table('bodegas')->insert([
            'direccion' => 'Calle 2',
            'nombre' => 'Bodega secundaria',
            'status_delete' => false,
            'descripcion' => 'es la tienda',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('bodegas')->insert([
            'direccion' => 'Calle colorin2',
            'nombre' => 'Bodega ito',
            'status_delete' => false,
            'descripcion' => 'Es la matriz 3',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('bodegas')->insert([
            'direccion' => 'Calle 4',
            'nombre' => 'Bodega 4',
            'status_delete' => false,
            'descripcion' => 'Es la matriz 4',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
    }
}
