<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos=Producto::paginate(3);
        return view('productos/index')->with('productos',$productos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Productos/crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nombre=$request->nombre;
        $descripcion=$request->descripcion;
        $precio_v=$request->precio_v;
        $precio_c =$request->precio_c;
        $stock=$request->stock;
        $status_delete=$request->status_delete;
        $imagen=$request->imagen;
        $id_categoria=$request->id_categoria;
        $id_catalogo=$request->id_catalogo;
        $id_bodega=$request->id_bodega;

    
        Producto::create([
            'nombre'=>$nombre,
            'descripcion'=>$descripcion,
            'precio_v'=>$precio_v,
            'precio_c'=>$precio_c,
            'stock'=>$stock,
            'status_delete'=>false,
            'imagen'=>"imagen",
            'id_categoria'=>$id_categoria,
            'id_catalogo'=>$id_catalogo,
            'id_bodega'=>$id_bodega
        ]);

       return redirect()->to('/productos/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        return view('productos.show',compact('producto',$producto));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        return view('productos.edit',compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        $producto->nombre=$request->nombre;
        $producto->descripcion=$request->descripcion;
        $producto->precio_v=$request->precio_v;
        $producto->precio_c =$request->precio_c;
        $producto->stock=$request->stock;
        $producto->status_delete=$producto->status_delete;
        $producto->imagen="imagen";
        $producto->id_categoria=$request->id_categoria;
        $producto->id_catalogo=$request->id_catalogo;
        $producto->id_bodega=$request->id_bodega;

        //si el usuario sube una nueva imagen
       
        $producto->save();
        //redireccionar
        return redirect()->to('/productos/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect()->to('/productos/index');
    }
}
