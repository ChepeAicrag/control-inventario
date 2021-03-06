<?php

namespace App\Exports;

use App\Models\Reporte;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromQuery;

class ReporteExport implements FromQuery,WithHeadings
{
    public function headings(): array
    {
        return [
            'Id',
            'Accion',
            'Cantidad',
            'Cantidad_ant',
            'Cantidad_act',
            'Usuario',
            'Autorizacion',
            'Producto',
            'fecha'
        ];
    }
    public function __construct($months)
    {
        $this->months = $months;

        return $this;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        $fecha=explode(" ",$this->months,$limit = PHP_INT_MAX);
        
                
        $meses = ["January","February","March","April","May","June","July","August","September","October","November","December"];
        $numero_mes = 0;
        for ($i=0; $i < sizeof($meses); $i++) { 
            if (strcmp($meses[$i],$fecha[0])==0) {
                $numero_mes = $i+1;
            }
        }
        //echo $numero_mes;

        return DB::table('reportes')
        ->join('productos','productos.id','=','reportes.id_producto')
        ->join('users','users.id','=','reportes.id_usuario')
        ->join('users as autori','autori.id','=','reportes.id_auth')
        ->select('reportes.id', 'reportes.accion', 'reportes.cantidad', 'reportes.cantidad_ant', 'reportes.cantidad_act', 'users.nombre', 'autori.nombre as autorizador', 'productos.nombre as producto',DB::raw("DATE_FORMAT(reportes.created_at,'%d-%M-%Y') as months"))
        ->where('reportes.status_delete', 0)
        ->whereMonth('reportes.created_at',$numero_mes)
        ->whereYear('reportes.created_at',$fecha[1])
        ->orderBy('reportes.id');
        
    }
}
