<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mostrar Catalogo</title>
</head>
<body>
    @extends('layouts.inicio')
@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.css" integrity="sha512-pTg+WiPDTz84G07BAHMkDjq5jbLS/AqY0rU/QdugnfeE0+zu0Kjz++0rrtYNK9gtzEZ33p+S53S2skXAZttrug==" crossorigin="anonymous" />
    <link href="{{ asset('css/Productos/index.css') }}" rel="stylesheet">
@endsection

@section('botones')
   <a href="{{ url('/inicio') }}" class=" mt-3 volver btn btn-dark"> Volver</a>
   <a href="{{ url('/Crear-catalogo') }}" class=" mt-3 volver btn btn-secondary"> Agregar Catálogo +</a>
@endsection
@section('content')


<div class="col-md-10  mx-auto p-3">
    <h2 class="text-center  mb-3">Catálogos</h2>
        <table class="table">
            <thead class="bg-dark text-light">
                <tr>
                    <th scole="col">Id</th>
                    <th scole="col">Nombre</th>
                    <th scole="col">Descripción</th>
                    <th scole="col">Fecha de creación</th>
                    <th scole="col">Acciones</th>
                </tr>
            </thead>

            <tbody >
                @foreach ($ver as $x)
                    <tr> 
                        <td>{{$x->id}}</td>
                        <td>{{$x->nombre}}</td>
                        <td>{!!$x->descripcion!!}</td>
                        <td>{{$x->created_at}}</td>
                        <td>
                            <a href="../Editar-catalogo/{{$x->id}}" class="btn btn-dark mr-1 mb-2 d-block w-100">Editar</a>
                            <a href="" class="btn btn-success mr-1 mb-2 d-block w-100">Ver</a>
                            <a  href="../Baja-catalogo/{{$x->id}}" class="btn btn-danger mr-1 mb-2 d-block w-100">Eliminar</a>
                        </td>
                      
                        
                    </tr>
                @endforeach
               
            </tbody>

        </table>

        <div class="mb-5">
            @if ($ver->currentPage()>1)
                <a href=" {{$ver->previousPageUrl()}}" class="btn btn-dark" >atras</a>
            @endif

            @if ($ver->hasMorePages())
            <a href=" {{$ver->nextPageUrl()}}" class="btn btn-dark" >siguiente</a>
            @endif

            <p class="mt-2">Mostrando {{$ver->firstItem()}} a {{$ver->lastItem()}} ... de {{$ver->total()}} </p>
            
        </div>
        
</div>
    
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.js" integrity="sha512-EkeUJgnk4loe2w6/w2sDdVmrFAj+znkMvAZN6sje3ffEDkxTXDiPq99JpWASW+FyriFah5HqxrXKmMiZr/2iQA==" crossorigin="anonymous" defer></script>
    <script src="{{asset('js/app.js')}}" defer> </script>
@endsection
</body>
</html>