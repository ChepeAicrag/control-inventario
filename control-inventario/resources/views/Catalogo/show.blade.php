@extends('layouts.inicio')
@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.css"
        integrity="sha512-pTg+WiPDTz84G07BAHMkDjq5jbLS/AqY0rU/QdugnfeE0+zu0Kjz++0rrtYNK9gtzEZ33p+S53S2skXAZttrug=="
        crossorigin="anonymous" />
    <link href="{{ asset('css/Productos/show.css') }}" rel="stylesheet">
@endsection

@section('botones')
    <a href="{{ url('Catalogo') }}" class=" volver btn btn-primary"> Volver</a>
@endsection
@section('content')

    <article class="contenido-receta">
        <h1 class="titulo mt-5 mb-10">{{ $catalogo->nombre }}</h1>
    </article>

    <div class=" contenedor-vista mb-5">

        <div class="caracteristicas">
            <div class="fila">
                <div class="preparacion">
                    <h3 class="my-3 ">Descripcion:</h3>
                    {{ $catalogo->descripcion }}
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
