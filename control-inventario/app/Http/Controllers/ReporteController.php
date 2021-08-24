<?php

namespace App\Http\Controllers;

use App\Models\Reporte;
use App\Models\Producto;
use Illuminate\Http\Request;
use App\Exports\ReporteExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade as PDF;
use Auth;
use App\Http\Controllers\Messages\WhatsAppMessage;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\console;
class ReporteController extends Controller
{
    public function __construct(){
        $this->middleware('auth');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Reporte/indice');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Reporte/crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $accion = $request->accion;
        $cantidad = $request->cantidad;
        $cantidad_ant = $request->cantidad_ant;
        $cantidad_act = $request->cantidad_act;
        $status_Delete = 0;
        $id_usuario = $request->id_usuario;
        $id_auth = $request->id_auth;
        $id_producto = $request->id_producto;

        Reporte::create([
            'accion' => $accion, 'cantidad' => $cantidad, 'cantidad_ant' => $cantidad_ant, 'cantidad_act' => $cantidad_act, 'status_delete' => $status_Delete, 'id_usuario' => $id_usuario, 'id_auth' => $id_auth, 'id_producto' => $id_producto
        ]);

        return redirect()->to('Crear-Reporte');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reporte  $reporte
     * @return \Illuminate\Http\Response
     */
    public function show(Reporte $reporte)
    {


        $ver = DB::table('reportes')
        ->join('productos','productos.id','=','reportes.id_producto')
        ->join('users','users.id','=','reportes.id_usuario')
        ->join('users as autori','autori.id','=','reportes.id_auth')
        ->select('reportes.id', 'reportes.accion', 'reportes.cantidad', 'reportes.cantidad_ant', 'reportes.cantidad_act', 'users.nombre', 'autori.nombre as autorizador', 'productos.nombre as producto',DB::raw("DATE_FORMAT(reportes.created_at,'%d-%M-%Y') as months"))
        ->where('reportes.status_delete', 0)
        ->paginate(3);

        /* $ver = Reporte::select('id', 'accion', 'cantidad', 'cantidad_ant', 'cantidad_act', 'id_usuario', 'id_auth', 'id_producto',DB::raw("DATE_FORMAT(created_at,'%d-%M-%Y') as months"))
            ->where('status_delete', 0)
            ->paginate(3);
 */
        $fechas = Reporte::select(DB::raw("DATE_FORMAT(created_at,'%M %Y') as months"))
        ->groupByRaw('months')
        ->get();

        

        return view('Reporte/mostrar', compact('ver','fechas'));
        
        //echo $fechas;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reporte  $reporte
     * @return \Illuminate\Http\Response
     */
    public function edit(Reporte $reporte)
    {
        return view('Reporte/editar', compact('reporte'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reporte  $reporte
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reporte $reporte)
    {
        $id = $request->id;
        $accion = $request->accion;
        $cantidad = $request->cantidad;
        $cantidad_ant = $request->cantidad_ant;
        $cantidad_act = $request->cantidad_act;
        $id_usuario = $request->id_usuario;
        $id_auth = $request->id_auth;
        $id_producto = $request->id_producto;

        Reporte::select('id', 'nombre', 'descripcion')
            ->where('id', $id)
            ->update([
                'accion' => $accion, 'cantidad' => $cantidad, 'cantidad_ant' => $cantidad_ant, 'cantidad_act' => $cantidad_act, 'id_usuario' => $id_usuario, 'id_auth' => $id_auth, 'id_producto' => $id_producto

            ]);

        return redirect()->to('Mostrar-Reporte');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reporte  $reporte
     * @return \Illuminate\Http\Response
     */
    public function destroy($reporte)
    {
        Reporte::select('id', 'nombre', 'descripcion')
            ->where('id', $reporte)
            ->update([
                'status_delete' => 0
            ]);
        return redirect()->to('Mostrar-Reporte');
    }

    public function stock(Producto $producto)
    {
        $users = User::select('id', 'nombre')
            ->where('status_delete', 0)
            ->get();

            
        return view('Stock', compact('producto', $producto, 'users', $users));
    }

    public function stockP(Request $request)
    {
        $id = $request->id;
        $cantidad = $request->cantidad;
        $accion = $request->accion;
        $status_Delete = 0;
        $id_usuario = $request->id_usuario;
        $id_auth = Auth::user()->id;

        $stock = Producto::select('stock', 'nombre')
            ->where('id', $id)
            ->get();

        $resultado = $stock[0]->stock;

        //echo $resultado;

        if (strcmp($accion, "sumar") == 0) {
            $resultado = $stock[0]->stock + $cantidad;
        } else if (strcmp($accion, "restar") == 0) {
            if ($stock[0]->stock >= $cantidad) {
                $resultado = $stock[0]->stock - $cantidad;
            }
        }

        Producto::select('id', 'stock')->where('id', $id)
            ->update([
                'stock' => $resultado
            ]);

        Reporte::create([
            'accion' => $accion, 'cantidad' => $cantidad, 'cantidad_ant' => $stock[0]->stock, 'cantidad_act' => $resultado, 'status_delete' => $status_Delete, 'id_usuario' => $id_usuario, 'id_auth' => $id_auth, 'id_producto' => $id
        ]);

        $to = User::select('telefono')->where('id', $id_auth)->get()[0]->telefono;

        $message = 'Se ha ralizado un movimiento en el inventario
El empleado ' . Auth::user()->nombre . ' acaba de ' . $accion . ' ' . $cantidad . ' piezas del producto  ' . $stock[0]->nombre . '.
¡Gracias por su atención!';

        # WhatsAppMessage::send($message, $to); # Favor de no eliminar esta línea, plis :)

        $token = env('TELEGRAM_BOT_TOKEN');
        $id = env('TELEGRAM_CHAT_ID');
        $urlMsg = "https://api.telegram.org/bot{$token}/sendMessage";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $urlMsg);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "chat_id={$id}&parse_mode=HTML&text=$message");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $server_output = curl_exec($ch);
        curl_close($ch);

        return redirect()->to('productos/index');
    }

    public function exportxlsx($months)
    {
        return Excel::download(new ReporteExport($months), 'Reporte.xlsx');
    }

    public function exportpdf(Request $request)
    {   
        
        /* echo $request->url();
        echo $request->months;
        $mes=$request->input('name','months'); */
        $mes='August 2021';

        
        
        $fecha=explode(" ",$mes,$limit = PHP_INT_MAX);
        
        
                
        $meses = ["January","February","March","April","May","June","July","August","September","October","November","December"];
        $numero_mes = 0;
        for ($i=0; $i < sizeof($meses); $i++) { 
            if (strcmp($meses[$i],$fecha[0])==0) {
                $numero_mes = $i+1;
            }
        }
        
       /*  $ver = Reporte::select('id', 'accion', 'cantidad', 'cantidad_ant', 'cantidad_act', 'id_usuario', 'id_auth', 'id_producto',DB::raw("DATE_FORMAT(created_at,'%d-%M-%Y') as months"))
            ->where('status_delete', 0)
            ->whereMonth('created_at',$numero_mes)
            ->whereYear('created_at',$fecha[1]) */

            
        $ver = DB::table('reportes')
        ->join('productos','productos.id','=','reportes.id_producto')
        ->join('users','users.id','=','reportes.id_usuario')
        ->join('users as autori','autori.id','=','reportes.id_auth')
        ->select('reportes.id', 'reportes.accion', 'reportes.cantidad', 'reportes.cantidad_ant', 'reportes.cantidad_act', 'users.nombre', 'autori.nombre as autorizador', 'productos.nombre as producto',DB::raw("DATE_FORMAT(reportes.created_at,'%d-%M-%Y') as months"))
        ->where('reportes.status_delete', 0)
        ->whereMonth('reportes.created_at',$numero_mes)
        /* ->whereYear('created_at',$fecha[1]) */
            ->get();
        
        $pdf = PDF::loadView('pdf', compact('ver'));

        return $pdf->stream();
        
    }
}
