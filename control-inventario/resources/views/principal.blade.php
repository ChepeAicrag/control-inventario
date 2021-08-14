@extends('layouts.inicio')
@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.css" integrity="sha512-pTg+WiPDTz84G07BAHMkDjq5jbLS/AqY0rU/QdugnfeE0+zu0Kjz++0rrtYNK9gtzEZ33p+S53S2skXAZttrug==" crossorigin="anonymous" />
    <link href="{{ asset('css/principal.css') }}" rel="stylesheet">
@endsection

@section('content')

    <h1 class="text-center mt-3 mb-5">CONTROL DE INVENTARIO</h1>
    <h4 class="text-center">Elige una opción</h4>
    <div class="menu">
        <div class="opciones ">
            <div class="card" >
                <img src="imagenes/llanta.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Productos</h5>
                  <p class="card-text">Elegir esta opcion si desea realizar una ver, agregar o eliminar un producto.</p>
                  <a href="{{route('productos.index')}}" class="btn btn-primary"> Ir a productos</a>
                </div>
            </div>
    
            <div class="card" >
                <img src="imagenes/folleto.png" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Catálogos</h5>
                  <p class="card-text">Elegir esta opcion si desea  ver, agregar o eliminar un catalogo.</p>
                  <a href="{{route('catalogo.index')}}" class="btn btn-primary"> Ir a cátalogos</a>
                </div>
            </div>
        </div>
        
        <div class="opciones  mt-5">
            <div class="card" >
                <img src="imagenes/bodega.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Bodegas</h5>
                  <p class="card-text">Elegir esta opción si desea ver, agregar o eliminar una bodega.</p>
                  <a href="{{route('bodega.index')}}" class="btn btn-primary"> Ir a Bodegas</a>
                </div>
            </div>

            <div class="card" >
                <img src="imagenes/reporte.png" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Reportes</h5>
                  <p class="card-text">Elegir esta opcion si desea ver los reportes.</p>
                  <a href="{{route('reporte.show')}}" class="btn btn-primary"> Ir a Reportes</a>
                </div>
            </div>
          
        </div>

        <div class="opciones  mt-5">
            <div class="card" >
                <img src="imagenes/categoria.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Categorias</h5>
                  <p class="card-text">Elegir esta opción si desea ver, agregar o eliminar una categoria.</p>
                  <a href="{{route('categoria.show')}}" class="btn btn-primary"> Ir a Categorias</a>
                </div>
            </div>
        </div>

    </div>
    
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.js" integrity="sha512-EkeUJgnk4loe2w6/w2sDdVmrFAj+znkMvAZN6sje3ffEDkxTXDiPq99JpWASW+FyriFah5HqxrXKmMiZr/2iQA==" crossorigin="anonymous" defer></script>
@endsection