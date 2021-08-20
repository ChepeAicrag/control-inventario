@extends('layouts.inicio')
@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.css"
        integrity="sha512-pTg+WiPDTz84G07BAHMkDjq5jbLS/AqY0rU/QdugnfeE0+zu0Kjz++0rrtYNK9gtzEZ33p+S53S2skXAZttrug=="
        crossorigin="anonymous" />
    <link href="{{ asset('css/Productos/index.css') }}" rel="stylesheet">
@endsection


@section('botones')

    {{-- <a href="{{ url('/inicio') }}" class=" mt-2 volver btn btn-dark"> Volver</a> --}}
    <div class="regresar">
        <a href="{{ url('/inicio') }}" class=" volver"> <img class="imagen" src="/imagenes/regresar.png" /></a>
        
    </div>
    <a href="{{ url('/productos') }}" class=" boton-a mt-4 volver"> <img class="imagen" src="/imagenes/add.png" /> <p class="mt-2 mb-0">Agregar</p></a>
    {{-- <a href="{{ url('/productos') }}" class=" mt-2 volver btn btn-secondary"> Agregar Producto +</a> --}}
@endsection


@section('content')


    <div class="col-md-10  mx-auto p-3">
        <h2 class="text-center  mb-4">PRODUCTOS</h2>
        <table class="table ">
            <thead class="bg-dark text-light text-center">
                <tr>
                    <th scole="col">Id</th>
                    <th scole="col">Imagen</th>
                    <th scole="col">Nombre</th>
                    <th scole="col">Precio</th>
                    <th scole="col">Acciones</th>

                </tr>
            </thead>

            <tbody>
                @foreach ($productos as $producto)
                    <tr>
                        <td class="id text-center">{{ $producto->id }}</td>
                        
                        <td class="imagen-cont">
                            
                                <img src="/storage/{{$producto->imagen}}" class="imagen-prod" alt="">
                          
                        </td>
                        <td class="nombre text-center">{{ $producto->nombre }}</td>
                        <td class="precio text-center">${{ $producto->precio_v }}</td>
                        <td class="acciones">
                            <div class="botonesacciones">
                                <a  title="Editar" href="{{ action('App\Http\Controllers\ProductoController@edit', ['producto' => $producto->id]) }}"
                                    class="boton-a"><img class="icono "  src="/imagenes/lapiz.png" />{{-- <p class="mt-2 mb-0">Editar</p> --}}</a>

                                <a  title="Ver Producto"  href="{{ action('App\Http\Controllers\ProductoController@show', ['producto' => $producto->id]) }}"
                                    class="boton-a"><img  class="icono" src="/imagenes/ver.png" />
                                    {{-- <p class="mt-2 mb-0">Ver</p> --}}
                                </a>

                                <a  title="Editar Stock" href="../Stock/{{ $producto->id }}" class="boton-a"><img class="icono"
                                        src="/imagenes/stock.png" /> <p class="mt-2 mb-0">Stock</p>
                                    </a>

                                <a  title="Eliminar" href="/productos/delete/{{ $producto->id }}" class="boton-a"><img class="icono"
                                        src="/imagenes/eliminar.png" /> {{-- <p class="mt-2 mb-0">Eliminar</p> --}}</a>
                            </div>
                        </td>
                    </tr>
                @endforeach

            </tbody>

        </table>

        <div class="mb-5">
            @if ($productos->currentPage() > 1)
                <a href=" {{ $productos->previousPageUrl() }}" class="btn btn-dark">atras</a>
            @endif

            @if ($productos->hasMorePages())
                <a href=" {{ $productos->nextPageUrl() }}" class="btn btn-dark">siguiente</a>
            @endif

            <p class="mt-2">Mostrando {{ $productos->firstItem() }} a {{ $productos->lastItem() }} ... de
                {{ $productos->total() }} </p>

        </div>

    </div>

@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.js"
        integrity="sha512-EkeUJgnk4loe2w6/w2sDdVmrFAj+znkMvAZN6sje3ffEDkxTXDiPq99JpWASW+FyriFah5HqxrXKmMiZr/2iQA=="
        crossorigin="anonymous" defer></script>
    <script src="{{ asset('js/app.js') }}" defer> </script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
@endsection
