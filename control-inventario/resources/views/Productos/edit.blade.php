@extends('layouts.inicio')
@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.css" integrity="sha512-pTg+WiPDTz84G07BAHMkDjq5jbLS/AqY0rU/QdugnfeE0+zu0Kjz++0rrtYNK9gtzEZ33p+S53S2skXAZttrug==" crossorigin="anonymous" />
    <link href="{{ asset('css/Productos/crear.css') }}" rel="stylesheet">
@endsection

@section('botones')
   {{-- <a href="{{ url('/productos/index') }}" class=" volver btn btn-dark"> Volver</a> --}}
   <div class="regresar">
    <a href="{{ url('/productos/index') }}" class=" volver"> <img class="imagen" src="/imagenes/regresar.png" /></a>
</div>
@endsection
@section('content')

    <h2 class="text-center mb-3 mt-4">Editar Producto</h2>
    {{-- <div id="example"></div> --}}
    <div class="contenedor-form mb-5 ">
        <div class="formulario mb-5">
            <form id="formulario" method="POST" action="{{route('productos.update',['producto'=>$producto->id])}}" enctype="multipart/form-data" novalidate>
                @csrf
                <div class="form-group">
                    <label for="nombre">Nombre Receta</label>
                    <input type="text" name="nombre" class="form-control @error ('nombre') is-invalid @enderror" id="nombre" placeholder="Titulo producto..."
                            value="{{$producto->nombre}}"
                    >
                    @error('nombre')
                        <span class="invalid-feedback d-block" role="alert">
                            <p class="errores">{{$message}}</p>
                        </span>
                    @enderror
                </div>

                <div class="form-group mt-3">
                    <label for="id_categoria">Categoria</label>

                    <select name="id_categoria"
                            class="form-control form-control-lg @error ('id_categoria') is-invalid @enderror"
                            id="id_categoria">

                        <option value="">-- Seleccione --</option>
                        @foreach ($categorias as $categoria)
                        <option value="{{$categoria->id}}"{{$producto->id_categoria==$categoria->id ? 'selected':''}}> {{$categoria->nombre}}</option>
                        @endforeach
                    </select>

                    @error('id_categoria')
                        <span class="invalid-feedback d-block" role="alert">
                            <p class="errores">{{"Seleccione una categoria"}}</p>
                        </span>
                    @enderror
                </div>

                <div class="form-group mt-3">
                    <label for="id_catalogo">Catalogo</label>

                    <select name="id_catalogo"
                            class="form-control form-control-lg @error ('id_catalogo') is-invalid @enderror"
                            id="id_catalogo">

                        <option value="">-- Seleccione --</option>
                        @foreach ($catalogos as $catalogo)
                        <option value="{{$catalogo->id}}"{{$producto->id_catalogo==$catalogo->id ? 'selected':''}}> {{$catalogo->nombre}}</option>
                        @endforeach
                    </select>

                    @error('id_catalogo')
                    <span class="invalid-feedback d-block" role="alert">
                        <p class="errores">{{"Seleccione una catálogo"}}</p>
                    </span>
                @enderror
                </div>

                <div class="form-group mt-3">
                    <label for="id_bodega">Bodega</label>

                    <select name="id_bodega"
                            class="form-control form-control-lg @error ('id_bodega') is-invalid @enderror"
                            id="id_bodega">

                        <option value="">-- Seleccione --</option>
                        @foreach ($bodegas as $bodega)
                            <option value="{{$bodega->id}}"{{$producto->id_bodega==$bodega->id ? 'selected':''}}> {{$bodega->nombre}}</option>
                        @endforeach
                    </select>

                    @error('id_bodega')
                        <span class="invalid-feedback d-block" role="alert">
                            <p class="errores">{{"Seleccione una bodega"}}</p>
                        </span>
                    @enderror
                </div>


                <div class="form-group mt-3">
                    <label for="descripcion">Descripción</label>
                    <input type="hidden" id="descripcion" name="descripcion" value="{{$producto->descripcion}}">
                    <trix-editor input="descripcion" class="form-control form-control-lg @error ('descripcion') is-invalid @enderror" ></trix-editor>
                    @error('descripcion')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group mt-3">
                    <label for="precio_c">Precio compra</label>
                    <input onkeypress="return validecimal(event);"  value="{{$producto->precio_c}}" name="precio_c" class="@error ('precio_c') is-invalid @enderror" step="1.00">
                    @error('precio_c')
                        <span class="invalid-feedback d-block" role="alert">
                            <p class="errores">{{"Se necesita un número"}}</p>
                        </span>
                    @enderror
                </div>

                <div class="form-group mt-3">
                    <label for="precio_v">Precio venta</label>
                    <input onkeypress="return validecimal(event);"  value="{{$producto->precio_v}}" class="@error ('precio_v') is-invalid @enderror" name="precio_v" step="1.00">
                    @error('precio_v')
                    <span class="invalid-feedback d-block" role="alert">
                        <p class="errores">{{"Se necesita un número"}}</p>
                    </span>
                @enderror
                </div>

                {{-- <div class="form-group mt-3">
                    <label for="stock">Stock</label>
                    <input disabled type="number"  value="{{$producto->stock}}" name="stock" step="1.00">
                </div> --}}



                <div class="form-group mt-3">
                    <label for="imagen">Imagen</label>
                    <input type="file"
                            class="form-control  @error ('preparacion') is-invalid @enderror"
                            id="imagen"
                            name="imagen"
                         >
                    <div class="mt-4">
                            <p>Imagen Actual: </p>
                            <img src="/storage/{{$producto->imagen}}" style="width: 300px">
                           </div>
                    @error('imagen')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <input type="submit"  class="btn btn-dark" value="Editar Producto" >
                </div>


            </form>

        </div>
    </div>

@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.js" integrity="sha512-EkeUJgnk4loe2w6/w2sDdVmrFAj+znkMvAZN6sje3ffEDkxTXDiPq99JpWASW+FyriFah5HqxrXKmMiZr/2iQA==" crossorigin="anonymous" defer></script>
    <script src="{{ asset('js/app.js') }}" defer> </script>
    <script src="{{ asset('js/validarCrear.js') }}" defer> </script>
@endsection
