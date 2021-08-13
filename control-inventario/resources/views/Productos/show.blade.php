@extends('layouts.inicio')
@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.css" integrity="sha512-pTg+WiPDTz84G07BAHMkDjq5jbLS/AqY0rU/QdugnfeE0+zu0Kjz++0rrtYNK9gtzEZ33p+S53S2skXAZttrug==" crossorigin="anonymous" />
    <link href="{{ asset('css/Productos/show.css') }}" rel="stylesheet">
@endsection

@section('botones')
   <a href="{{ url('/productos/index') }}" class=" volver btn btn-primary"> Volver</a>
@endsection
@section('content')

<article class="contenido-receta">
    <h1 class="text-center mb-10">{{$producto->nombre}}</h1>
</article>
<div class="imagen-receta">
    <img src="/storage/{{$producto->imagen}}" class="w-100" alt="">
</div>
<div class="receta-meta mt-2">
       <p>
           <span class="font-weight-bold text-primary">Categoria:</span>
           {{$producto->id_categoria}}
       </p>

       <p>
        <span class="font-weight-bold text-primary">Catalogo:</span>
        {{$producto->id_catalogo}}
      </p>

      <p>
        <span class="font-weight-bold text-primary">Bodega:</span>
        {{$producto->id_bodega}}
      </p>

            
       <div class="preparacion">
            <h2 class="my-3 text-primary">Descripcion</h2>
            {!!$producto->descripcion!!}
        </div>

        <div class="preparacion">
            <h2 class="my-3 text-primary">Precio Venta</h2>
            {!!$producto->precio_v!!}
        </div>

        <div class="preparacion">
            <h2 class="my-3 text-primary">Precio Compra</h2>
            {!!$producto->precio_c!!}
        </div>
        
        
        
</div>
    
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.js" integrity="sha512-EkeUJgnk4loe2w6/w2sDdVmrFAj+znkMvAZN6sje3ffEDkxTXDiPq99JpWASW+FyriFah5HqxrXKmMiZr/2iQA==" crossorigin="anonymous" defer></script>
    <script src="{{asset('js/app.js')}}" defer> </script>
@endsection