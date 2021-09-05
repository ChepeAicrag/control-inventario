<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class productoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('productos')->insert([
            'precio_v' => 35.5,
            'precio_c' => 35.5,
            'nombre' => 'Llanta',
            'stock' => 20,
            'imagen' => 'imagen',
            'status_delete' => false,
            'id_bodega' => 1,
            'id_categoria' => 1,
            'id_catalogo' => 1,
            'descripcion' => 'es una llanta',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);

        DB::table('productos')->insert([
            'precio_v' => 35.5,
            'precio_c' => 35.5,
            'nombre' => 'Tuerca',
            'stock' => 20,
            'imagen' => 'imagen',
            'status_delete' => false,
            'id_bodega' => 2,
            'id_categoria' => 2,
            'id_catalogo' => 2,
            'descripcion' => 'es una tuerca',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);

        DB::table('productos')->insert([
            'precio_v' => 35.5,
            'precio_c' => 35.5,
            'nombre' => 'Llanta de camión',
            'stock' => 20,
            'imagen' => 'imagen',
            'status_delete' => false,
            'id_bodega' => 3,
            'id_categoria' => 3,
            'id_catalogo' => 3,
            'descripcion' => 'es una llanta',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
    }
}
