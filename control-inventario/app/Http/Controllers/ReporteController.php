<?php

namespace App\Http\Controllers;

use App\Models\Reporte;
use App\Models\Producto;
use Illuminate\Http\Request;

class ReporteController extends Controller
{
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
            'accion' => $accion, 'cantidad' => $cantidad, 'cantidad_ant' => $cantidad_ant, 'cantidad_act' => $cantidad_act, 'status_delete' => $status_Delete, 'id_usuario'=>$id_usuario, 'id_auth'=>$id_auth,'id_producto'=>$id_producto
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
        $ver = Reporte::select('id','accion','cantidad','cantidad_ant','cantidad_act','id_usuario','id_auth','id_producto')
        ->where('status_delete',0)
        ->get();
        return view('Reporte/mostrar',compact('ver'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reporte  $reporte
     * @return \Illuminate\Http\Response
     */
    public function edit(Reporte $reporte)
    {
        return view('Reporte/editar',compact('reporte'));
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

        Reporte::select('id','nombre','descripcion')
        ->where('id',$id)
        ->update([
            'accion' => $accion, 'cantidad' => $cantidad, 'cantidad_ant' => $cantidad_ant, 'cantidad_act' => $cantidad_act, 'id_usuario'=>$id_usuario, 'id_auth'=>$id_auth,'id_producto'=>$id_producto
        
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
        Reporte::select('id','nombre','descripcion')
        ->where('id',$reporte)
        ->update([
            'status_delete' => 0
        ]);
        return redirect()->to('Mostrar-Reporte');
    }

    public function stock(Producto $producto)
    {
        return view('Stock',compact('producto'));
    }

    public function stockP(Request $request)
    {
        $id = $request->id;
        $cantidad = $request->cantidad;
        $accion = $request->accion;
        $status_Delete = 0;
        $id_usuario = $request->id_usuario;
        $id_auth = $request->id_auth;

        $stock=Producto::select('stock')
        ->where('id',$id)
        ->get();

        $resultado=$stock[0]->stock;

        //echo $resultado;
        
        if(strcmp($accion,"sumar")==0){
            $resultado=$stock[0]->stock + $cantidad;
        }else if(strcmp($accion,"restar")==0){
            if($stock[0]->stock>=$cantidad){
                $resultado=$stock[0]->stock - $cantidad;
            }
        }

        Producto::select('id','stock')
        ->where('id',$id)
        ->update([
            'stock'=>$resultado
        ]);

        Reporte::create([
            'accion' => $accion, 'cantidad' => $cantidad, 'cantidad_ant' => $stock[0]->stock, 'cantidad_act' => $resultado, 'status_delete' => $status_Delete, 'id_usuario'=>$id_usuario, 'id_auth'=>$id_auth,'id_producto'=>$id
        ]);

        return redirect()->to('productos/index');
        
    }
}
