@extends('layouts.inicio')
@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.css" integrity="sha512-pTg+WiPDTz84G07BAHMkDjq5jbLS/AqY0rU/QdugnfeE0+zu0Kjz++0rrtYNK9gtzEZ33p+S53S2skXAZttrug==" crossorigin="anonymous" />
    <link href="{{ asset('css/Productos/crear.css') }}" rel="stylesheet">
@endsection

@section('botones')
   <a href="{{ url('/productos/index') }}" class=" volver btn btn-primary"> Volver</a>
@endsection
@section('content')

    <h2 class="text-center mb-5">Editar Producto</h2>
    {{-- <div id="example"></div> --}}
    <div class="row justify-content-center mt-5">
        <div class="col-md-9">
            <form id="formulario" method="POST" action="{{route('productos.update',['producto'=>$producto->id])}}" enctype="multipart/form-data" novalidate>
                @csrf
                <div class="form-group">
                    <label for="nombre">Nombre Receta</label>
                    <input type="text" name="nombre" class="form-control @error ('titulo') is-invalid @enderror" id="titulo" placeholder="Titulo Receta..." 
                            value="{{$producto->nombre}}" 
                    >
                    @error('titulo')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group mt-3">
                    <label for="id_categoria">Categoria</label>
                    
                    <select name="id_categoria" 
                            class="form-control form-control-lg @error ('categoria') is-invalid @enderror" 
                            id="categoria">
                            
                        <option value="">-- Seleccione --</option>
                        <option value="{{$producto->id_categoria}}"  {{'selected'}}>{{$producto->id_categoria}}</option>
                     
                        
                    </select>

                    @error('categoria')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group mt-3">
                    <label for="id_catalogo">Catalogo</label>
                    
                    <select name="id_catalogo" 
                            class="form-control form-control-lg @error ('categoria') is-invalid @enderror" 
                            id="catalogo">
                            
                        <option value="">-- Seleccione --</option>
                        <option value="{{$producto->id_catalogo}}"  {{'selected'}}>{{$producto->id_catalogo}}</option>
                     
                        
                    </select>

                    @error('categoria')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group mt-3">
                    <label for="id_bodega">Bodega</label>
                    
                    <select name="id_bodega" 
                            class="form-control form-control-lg @error ('categoria') is-invalid @enderror" 
                            id="bodega">
                            
                        <option value="">-- Seleccione --</option>
                        <option value="{{$producto->id_bodega}}"  {{'selected'}}>{{$producto->id_bodega}}</option>
                        
                    </select>

                    @error('categoria')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
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
                    <input type="number" value="{{$producto->precio_c}}" name="precio_c" step="1.00">
                   
                </div>

                <div class="form-group mt-3">
                    <label for="precio_v">Precio venta</label>
                    <input type="number" value="{{$producto->precio_v}}" name="precio_v" step="1.00">
                   
                </div>

                <div class="form-group mt-3">
                    <label for="stock">Stock</label>
                    <input type="number"  value="{{$producto->stock}}" name="stock" step="1.00">
                   
                </div>

                

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
                    
                    <input type="submit"  class="btn btn-primary" value="Editar Producto" >
                </div>


            </form>

        </div>
    </div>
    
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.js" integrity="sha512-EkeUJgnk4loe2w6/w2sDdVmrFAj+znkMvAZN6sje3ffEDkxTXDiPq99JpWASW+FyriFah5HqxrXKmMiZr/2iQA==" crossorigin="anonymous" defer></script>
    <script src="{{asset('js/app.js')}}" defer> </script>
@endsection