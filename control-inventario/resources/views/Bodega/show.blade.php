@extends('layouts.inicio')
@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.css"
        integrity="sha512-pTg+WiPDTz84G07BAHMkDjq5jbLS/AqY0rU/QdugnfeE0+zu0Kjz++0rrtYNK9gtzEZ33p+S53S2skXAZttrug=="
        crossorigin="anonymous" />
    <link href="{{ asset('css/Productos/show.css') }}" rel="stylesheet">
@endsection

@section('botones')
    <div class="regresar">
        <a href="{{ url('Mostrar-bodega') }}" class=" mt-3 volver"> <img class="imagen"
                src="../imagenes/regresar.png" /></a>
    </div>
@endsection
@section('content')

    <article class="contenido-receta">
        <h1 class="titulo mt-5 mb-10">{{ $bodega->nombre }}</h1>
    </article>

    <div class=" contenedor-vista mt-5 mb-5">

        <div class="caracteristicas">
            <div class="fila">
                <div class="preparacion">
                    <h3 class="my-3 nom ">ID de la Bodegas: </h3>
                    {{ $bodega->id }}
                </div>
                <div class="preparacion">
                    <h3 class="my-3 nom">Nombre:</h3>
                    {{ $bodega->nombre }}
                </div>


                <div class="mt-3 preparacion">
                    <h3 class="my-3 nom ">Descripcion: </h3>
                    {{ $bodega->descripcion }}
                </div>

                <div class="preparacion">
                    <h3 class="my-3 nom">Fecha Creacion: </h3>
                    {{ $bodega->created_at }}
                </div>
            </div>






        </div>

    </div>


@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.js"
        integrity="sha512-EkeUJgnk4loe2w6/w2sDdVmrFAj+znkMvAZN6sje3ffEDkxTXDiPq99JpWASW+FyriFah5HqxrXKmMiZr/2iQA=="
        crossorigin="anonymous" defer></script>
    <script src="{{ asset('js/app.js') }}" defer> </script>
@endsection
