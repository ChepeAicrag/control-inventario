<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class reporteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reportes')->insert([
            'nombre' => 'Llanta',
            'stock' => 20,
            'imagen' => 'imagen',
            'status_delete' => false,
            'id_producto' => 1,
            'id_categoria' => 1,
            'id_catalogo' => 1,
            'descripcion' => 'es una llanta',
        ]);
    }
}
