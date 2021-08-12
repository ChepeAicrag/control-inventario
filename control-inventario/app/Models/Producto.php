<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre', 'descripcion', 'precio_v', 'precio_c','stock','status_delete','imagen','id_categoria','id_catalogo','id_bodega'
    ];
}
