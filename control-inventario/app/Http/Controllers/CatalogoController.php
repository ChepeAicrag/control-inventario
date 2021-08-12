<?php

namespace App\Http\Controllers;

use App\Models\Catalogo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CatalogoController extends Controller
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
        return view('Catalogo/crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nombre = $request->nombre;
        $descripcion = $request->descripcion;
        $status_Delete = 1;

        Catalogo::create([
            'nombre' => $nombre, 'descripcion' => $descripcion, 'status_delete' => $status_Delete
        ]);

        return redirect()->to('Crear-catalogo');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Catalogo  $catalogo
     * @return \Illuminate\Http\Response
     */
    public function show(Catalogo $catalogo)
    {
        //$ver = Catalogo::all();
        $ver = Catalogo::select('id','nombre','descripcion','created_at')
        ->where('status_delete',1)
        ->get();
        return view('Catalogo/mostrar',compact('ver'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Catalogo  $catalogo
     * @return \Illuminate\Http\Response
     */
    public function edit(Catalogo $catalogo)
    {
        return view('Catalogo/editar',compact('catalogo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Catalogo  $catalogo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Catalogo $catalogo)
    {
        $nombre = $request->nombre;
        $descripcion = $request->descripcion;
        $id = $request->id;

        Catalogo::select('id','nombre','descripcion')
        ->where('id',$id)
        ->update([
            'nombre' => $nombre, 'descripcion' => $descripcion
        ]);

        return redirect()->to('Mostrar-catalogo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Catalogo  $catalogo
     * @return \Illuminate\Http\Response
     */
    public function destroy($catalogo)
    {
        Catalogo::select('id','nombre','descripcion')
        ->where('id',$catalogo)
        ->update([
            'status_delete' => 0
        ]);
        return redirect()->to('Mostrar-catalogo');
    }
}
