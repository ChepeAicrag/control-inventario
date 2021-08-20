<?php

namespace App\Exports;

use App\Models\Reporte;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;

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
            'Producto',
            'fecha'
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $ver = Reporte::select('id','accion','cantidad','cantidad_ant','cantidad_act','id_usuario','id_auth','id_producto',DB::raw("DATE_FORMAT(created_at,'%d-%M-%Y') as months"))
        ->where('status_delete',0)
        ->get();
        return $ver;
    }
}
