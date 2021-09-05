<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CategoriaController extends Controller
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
        $ver=Categoria::select('id','nombre','descripcion','created_at')
        ->where('status_delete',0)->paginate(3);
        return view('Categoria/CategoriaVer',compact('ver'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Categoria/CategoriaAlta');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate(
            [
                'nombre' => 'required|min:3',
                'descripcion' => 'required|min:6',
            ]
        );

        $nombre = $data['nombre'];
        $descripcion = $data['descripcion'];
        $status_delete= false;

        Categoria:: create([
            'nombre' => $nombre, 
            'descripcion' => $descripcion, 
            'status_delete' => $status_delete
        ]);
        return redirect()->to('Categoria-ver');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show(Categoria $categoria)
    {
        return view('categoria.show',compact('categoria',$categoria));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoria= categoria::select('id','nombre','descripcion')
        ->where('id',$id)
        ->first();
        return view('Categoria/CategoriaEditar')->with('categoria',$categoria);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categoria $categoria)
    {
        $nombre = $request->nombre;
        $descripcion = $request->descripcion;
        $id = $request->id;

        Categoria::select('id','nombre','descripcion')
        ->where('id',$id)
        ->update([
            'nombre' => $nombre, 
            'descripcion' => $descripcion
        ]);
        return redirect()->to('Categoria-ver');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy($categoria)
    {
        Categoria::select('id','nombre','descripcion')
        ->where('id',$categoria)
        ->update([
            'status_delete' => 1
        ]);
        return redirect()->to('Categoria-ver');
    }
}
