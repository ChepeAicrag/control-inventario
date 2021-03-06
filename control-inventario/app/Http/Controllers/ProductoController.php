<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Catalogo;
use App\Models\Bodega;
use Intervention\Image\Facades\Image;

class ProductoController extends Controller
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
        $productos = Producto::select('*')
            ->where('status_delete', 0)->paginate(3);
        return view('productos/index')->with('productos', $productos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categorias = Categoria::select('id', 'nombre', 'descripcion')
            ->where('status_delete', 0)
            ->get();
        $catalogos = Catalogo::select('id', 'nombre')
            ->where('status_delete', 0)
            ->get();
        $bodegas = Bodega::select('id', 'nombre')
            ->where('status_delete', 0)
            ->get();

        return view('Productos/crear', compact(
            'categorias',
            $categorias,
            'catalogos',
            $catalogos,
            'bodegas',
            $bodegas,
        ));
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
                'precio_v' => 'required',
                'precio_c' => 'required',
                'stock' => 'required',
                'id_categoria' => 'required',
                'id_catalogo' => 'required',
                'id_bodega' => 'required'
            ]
        );

        $ruta_imagen = "";
        if ($request['imagen']) {

            $ruta_imagen = $request['imagen']->store('upload-productos', 'public');

            //Reajustar la imgaeb
            $img = Image::make(public_path("storage/{$ruta_imagen}"))->resize(400, 150);
            #$img = Image::make(storage_path("app/public/{$ruta_imagen}"))->resize(400, 150);
            $img->save();
        }


        Producto::create([
            'nombre' => $data['nombre'],
            'descripcion' => $data['descripcion'],
            'precio_v' => $data['precio_v'],
            'precio_c' => $data['precio_c'],
            'stock' => $data['stock'],
            'status_delete' => false,
            'imagen' => $ruta_imagen,
            'id_categoria' => $data['id_categoria'],
            'id_catalogo' => $data['id_catalogo'],
            'id_bodega' => $data['id_bodega']
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
        $categorias = Categoria::select('id', 'nombre', 'descripcion')
            ->where('id', $producto->id_categoria)
            ->get();
        $catalogos = Catalogo::select('id', 'nombre')
            ->where('id', $producto->id_catalogo)
            ->get();
        $bodegas = Bodega::select('id', 'nombre')
            ->where('id', $producto->id_bodega)
            ->get();

        return view('productos.show', compact(
            'producto',
            $producto,
            'categorias',
            $categorias,
            'catalogos',
            $catalogos,
            'bodegas',
            $bodegas,
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        $categorias = Categoria::select('id', 'nombre', 'descripcion')
            ->where('status_delete', 0)
            ->get();
        $catalogos = Catalogo::select('id', 'nombre')
            ->where('status_delete', 0)
            ->get();
        $bodegas = Bodega::select('id', 'nombre')
            ->where('status_delete', 0)
            ->get();
        return view('productos.edit', compact(
            'producto',
            'categorias',
            'catalogos',
            'bodegas'
        ));
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
        

        $data = request()->validate(
            [
                'nombre' => 'required|min:3',
                'descripcion' => 'required|min:6',
                'precio_v' => 'required',
                'precio_c' => 'required',
                'id_categoria' => 'required',
                'id_catalogo' => 'required',
                'id_bodega' => 'required'
            ]
        );

        if ($request['imagen']) {
            $ruta_imagen = $request['imagen']->store('upload-productos', 'public');

            //Reajustar la imgaeb
            $img = Image::make(public_path("storage/{$ruta_imagen}"))->resize(400, 150);
            $img->save();
            $producto->imagen = $ruta_imagen;
        }

    

        $producto->nombre = $data['nombre'];
        $producto->descripcion = $data['descripcion'];
        $producto->precio_v = $data['precio_v'];
        $producto->precio_c = $data['precio_c'];
        $producto->stock = $producto->stock;
        $producto->status_delete = $producto->status_delete;
        $producto->id_categoria = $data['id_categoria'];
        $producto->id_catalogo = $data['id_catalogo'];
        $producto->id_bodega = $data['id_bodega'];

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
    public function destroy($producto)
    {
        Producto::select('*')
            ->where('id', $producto)
            ->update([
                'status_delete' => 1
            ]);
        return redirect()->to('/productos/index');
    }
}
