@extends('layouts.inicio')
@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.css" integrity="sha512-pTg+WiPDTz84G07BAHMkDjq5jbLS/AqY0rU/QdugnfeE0+zu0Kjz++0rrtYNK9gtzEZ33p+S53S2skXAZttrug==" crossorigin="anonymous" />
<link href="{{ asset('css/Productos/crear.css') }}" rel="stylesheet">
@endsection

@section('botones')
    <div class="regresar">
        <a href="{{ url('/productos/index') }}" class=" volver"> <img src="imagenes/regresar.png" /></a>
    </div>
   
@endsection
@section('content')


    {{-- <div id="example"></div> --}}
    <div class="  mb-5 contenedor-form row justify-content-center mt-4">
        <div class=" formulario mb-5">
            <h2 class="text-center mb-5">Agregar Producto</h2>
            <form id="formulario" class="" method="POST" action="{{url('productos/crear')}}" enctype="multipart/form-data" novalidate>
                @csrf
                <div class="form-group">
                    <label for="nombre">Nombre Producto</label>
                    <input type="text" name="nombre" class="form-control @error ('nombre') is-invalid @enderror" id="nombre" placeholder="Nombre Producto..."
                            value={{old('nombre')}}
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
                            id="id_categoria" value={{old('id_categoria')}}>

                        <option value="">-- Seleccione --</option>
                        @foreach ($categorias as $categoria)
                            <option value={{$categoria->id}}>{{$categoria->nombre}}</option>
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
                            <option value={{$catalogo->id}}>{{$catalogo->nombre}}</option>
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
                            <option value={{$bodega->id}}>{{$bodega->nombre}}</option>
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
                    <input type="hidden" id="descripcion" name="descripcion" value="{{old('descripcion')}}">
                    <trix-editor input="descripcion" class="form-control form-control-lg @error ('descripcion') is-invalid @enderror" ></trix-editor>
                    @error('descripcion')
                        <span class="invalid-feedback d-block" role="alert">
                            <p class="errores">{{$message}}</p>
                        </span>
                    @enderror
                </div>

                
                
                <div class="form-group mt-3">
                    <label for="precio_c">Precio compra</label>
                    <input onkeypress="return validecimal(event);" v-validate="'digits:3'" name="precio_c" step="1.00" value="{{old('precio_c')}}" class="@error ('precio_c') is-invalid @enderror">
                    @error('precio_c')
                    <span class="invalid-feedback d-block" role="alert">
                        <p class="errores">{{"Se necesita un número"}}</p>
                    </span>
                @enderror
                </div>

                <div class="form-group mt-3">
                    <label for="precio_v">Precio venta</label>
                    <input onkeypress="return validecimal(event);" name="precio_v" step="1.00" value="{{old('precio_v')}}" class="@error ('precio_v') is-invalid @enderror">
                    @error('precio_v')
                    <span class="invalid-feedback d-block" role="alert">
                        <p class="errores">{{"Se necesita un número"}}</p>
                    </span>
                    @enderror
                </div>

                

                <div class="form-group mt-3">
                    <label for="stock">Stock</label>
                    <input onkeypress="return valideKey(event);" id="select_stock" type="number" name="stock" step="1.00" class="@error ('stock') is-invalid @enderror">
                   {{--  <div id="selectNumber" name="stock"></div> --}}
                    @error('stock')
                    <span class="invalid-feedback d-block" role="alert">
                        <p class="errores">{{"Se necesita un número"}}</p>
                    </span>
                    @enderror

                </div>



                <div class="form-group mt-3">
                    <label for="imagen">Imagen</label>
                    <input type="file"
                            class="form-control  @error ('imagen') is-invalid @enderror"
                            id="imagen"
                            name="imagen"
                            value="{{old('imagen')}}">

                    @error('imagen')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>



                <div class="form-group mt-3">

                    <input type="submit"  class="btn btn-dark" value="Agregar Producto" >
                </div>


            </form>

        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.js" integrity="sha512-EkeUJgnk4loe2w6/w2sDdVmrFAj+znkMvAZN6sje3ffEDkxTXDiPq99JpWASW+FyriFah5HqxrXKmMiZr/2iQA==" crossorigin="anonymous" defer></script>
<script src="{{asset('js/validarCrear.js')}}" defer> </script>
@endsection
