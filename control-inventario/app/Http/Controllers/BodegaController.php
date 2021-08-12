<?php

namespace App\Http\Controllers;

use App\Models\Bodega;
use Illuminate\Http\Request;

class BodegaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Bodega/crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $nombre = $request->nombre;
        $descripcion = $request->descripcion;
        $direccion = $request->direccion;

        Bodega::create([
            'nombre' => $nombre, 'descripcion' => $descripcion, 'direccion' => $direccion, 'status_delete' => 0,
        ]);

        return redirect()->to('Crear-bodega');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bodega  $bodega
     * @return \Illuminate\Http\Response
     */
    public function show(Bodega $bodega)
    {
        $ver = Bodega::select('id', 'nombre', 'descripcion', 'direccion', 'created_at')
            ->where('status_delete', 0)
            ->get();
        return view('Bodega/mostrar', compact('ver'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bodega  $bodega
     * @return \Illuminate\Http\Response
     */
    public function edit(Bodega $bodega)
    {
        //
        return view('Bodega/editar', compact('bodega'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bodega  $bodega
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bodega $bodega)
    {
        $nombre = $request->nombre;
        $descripcion = $request->descripcion;
        $direccion = $request->direccion;
        $id = $request->id;

        Bodega::select('id', 'nombre', 'descripcion', 'direccion')
            ->where('id', $id)
            ->update([
                'nombre' => $nombre, 'descripcion' => $descripcion, 'direccion' => $direccion
            ]);

        return redirect()->to('Mostrar-bodega');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bodega  $bodega
     * @return \Illuminate\Http\Response
     */
    public function destroy($bodega)
    {
        Bodega::select('id', 'nombre', 'descripcion')
            ->where('id', $bodega)
            ->update([
                'status_delete' => 1
            ]);
        return redirect()->to('Mostrar-bodega');
    }
}
