@extends('layouts.inicio')
@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.css" integrity="sha512-pTg+WiPDTz84G07BAHMkDjq5jbLS/AqY0rU/QdugnfeE0+zu0Kjz++0rrtYNK9gtzEZ33p+S53S2skXAZttrug==" crossorigin="anonymous" />
    <link href="{{ asset('css/Productos/index.css') }}" rel="stylesheet">
@endsection

@section('botones')
   <a href="{{ url('/inicio') }}" class=" volver btn btn-primary"> Volver</a>
   <a href="{{ url('/productos') }}" class=" volver btn btn-secondary"> Agregar Producto +</a>
@endsection
@section('content')

<h2 class="text-center  mt-3 mb-3">Productos</h2>
<div class="col-md-10 mx-auto bg-white p-3">
        <table class="table">
            <thead class="bg-primary text-light">
                <tr>
                    <th scole="col">Nombre</th>
                    <th scole="col">Precio</th>
                    <th scole="col">Acciones</th>
                    
                </tr>
            </thead>

            <tbody >
                @foreach ($productos as $producto)
                    <tr>
                        <td>{{$producto->nombre}}</td>
                        <td>${{$producto->precio_v}}</td>
                        <td>
                            <a href="{{action('App\Http\Controllers\ProductoController@edit',['producto'=>$producto->id])}}" class="btn btn-dark mr-1 mb-2 d-block w-100">Editar</a>
                            <a href="{{action('App\Http\Controllers\ProductoController@show',['producto'=>$producto->id])}}" class="btn btn-success mr-1 mb-2 d-block w-100">Ver</a>
                            <a  href="/productos/delete/{{$producto->id}}" class="btn btn-danger mr-1 mb-2 d-block w-100">Eliminar</a>
                        </td>
                        <td><a href="../Stock/{{$producto->id}}">Accion</a></td>
                        
                    </tr>
                @endforeach
               
            </tbody>

        </table>

        <div class="">
            @if ($productos->currentPage()>1)
                <a href=" {{$productos->previousPageUrl()}}" class="btn btn-dark" >atras</a>
            @endif

            @if ($productos->hasMorePages())
            <a href=" {{$productos->nextPageUrl()}}" class="btn btn-dark" >siguiente</a>
            @endif

            <p class="mt-2">Mostrando {{$productos->firstItem()}} a {{$productos->lastItem()}} ... de {{$productos->total()}} </p>
            
        </div>
        
</div>
    
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.js" integrity="sha512-EkeUJgnk4loe2w6/w2sDdVmrFAj+znkMvAZN6sje3ffEDkxTXDiPq99JpWASW+FyriFah5HqxrXKmMiZr/2iQA==" crossorigin="anonymous" defer></script>
    <script src="{{asset('js/app.js')}}" defer> </script>
@endsection