<?php

namespace App\Exports;

use App\Models\Reporte;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ReporteExport implements FromCollection,WithHeadings
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
            'Producto'
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $ver = Reporte::select('id','accion','cantidad','cantidad_ant','cantidad_act','id_usuario','id_auth','id_producto')
        ->where('status_delete',0)
        ->get();
        return $ver;
    }
}
