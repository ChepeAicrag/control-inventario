<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reporte extends Model
{
    use HasFactory;

    protected $table = 'reportes';
    protected $primarykey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'accion','cantidad','cantidad_ant','cantidad_act','status_delete','id_usuario','id_auth','id_producto'
    ];
}
