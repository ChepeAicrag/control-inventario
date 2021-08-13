@extends('layouts.inicio')
@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.css" integrity="sha512-pTg+WiPDTz84G07BAHMkDjq5jbLS/AqY0rU/QdugnfeE0+zu0Kjz++0rrtYNK9gtzEZ33p+S53S2skXAZttrug==" crossorigin="anonymous" />
    <link href="{{ asset('css/principal.css') }}" rel="stylesheet">
@endsection

@section('content')

    <h2 class="text-center mb-5">Elige una opcion</h2>
    <div class="opciones">
        <div class="card" >
            <img src="imagenes/agragar.png" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Productos</h5>
              <p class="card-text">Elegir esta opcion si desea realizar una ver, agregar o eliminar un producto.</p>
              <a href="{{route('productos.index')}}" class="btn btn-primary"> Ir a productos</a>
            </div>
          </div>
    </div>
    
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.js" integrity="sha512-EkeUJgnk4loe2w6/w2sDdVmrFAj+znkMvAZN6sje3ffEDkxTXDiPq99JpWASW+FyriFah5HqxrXKmMiZr/2iQA==" crossorigin="anonymous" defer></script>
@endsection