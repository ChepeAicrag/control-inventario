@extends('layouts.inicio')
@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.css" integrity="sha512-pTg+WiPDTz84G07BAHMkDjq5jbLS/AqY0rU/QdugnfeE0+zu0Kjz++0rrtYNK9gtzEZ33p+S53S2skXAZttrug==" crossorigin="anonymous" />
    <link href="{{ asset('css/Productos/show.css') }}" rel="stylesheet">
@endsection

@section('botones')
   <a href="{{ url('/productos/index') }}" class=" mt-3 volver btn btn-dark"> Volver</a>
@endsection
@section('content')

<article class="contenido-receta">
    <h1 class="titulo mt-5 mb-10">{{$producto->nombre}}</h1>
</article>
<div class="imagen-receta">
    <img src="/storage/{{$producto->imagen}}" class="w-100" alt="">
</div>
<div class=" contenedor-vista mb-5">

    <div class="caracteristicas">
        <div class="fila">
            <div class="preparacion">
                <h3 class="my-3">Categoria: </h3>
                {{$producto->id_categoria}}
            </div>
        
              <div class="preparacion">
                <h3 class="my-3 ">Catalogo:</h3>
                {{$producto->id_catalogo}}
              </div>
        
        </div>

        <div class="fila">
            <div class="mt-3 preparacion">
                <h4 class="my-3 ">Precio de Venta: </h4>
                ${!!$producto->precio_v!!}
            </div>
    
            <div class="preparacion">
                <h4 class="mr-5">Precio Compra: </h4>
                ${!!$producto->precio_c!!}
            </div>
        </div>

        <div class="fila">
            <div class="preparacion">
                <h3 class="my-3 ">Bodega: </h3>
                {{$producto->id_bodega}}
              </div>

        </div>
        </div>

        
    
       <div class="descripcion">
            <h3 class="my-3">Descripción: </h3>
            {!!$producto->descripcion!!}
        </div>
  
</div>
    
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.js" integrity="sha512-EkeUJgnk4loe2w6/w2sDdVmrFAj+znkMvAZN6sje3ffEDkxTXDiPq99JpWASW+FyriFah5HqxrXKmMiZr/2iQA==" crossorigin="anonymous" defer></script>
    <script src="{{asset('js/app.js')}}" defer> </script>
@endsection