@extends('layouts.inicio')
@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.css"
        integrity="sha512-pTg+WiPDTz84G07BAHMkDjq5jbLS/AqY0rU/QdugnfeE0+zu0Kjz++0rrtYNK9gtzEZ33p+S53S2skXAZttrug=="
        crossorigin="anonymous" />
    <link href="{{ asset('css/Productos/crear.css') }}" rel="stylesheet">
@endsection
@section('botones')
    <a href="{{ url('/Categoria-ver') }}" class=" volver btn btn-dark"> Volver</a>
@endsection

@section('content')
    <div class="contenedor-form">

        <div class="formulario">
            <h2 class="text-center mb-5">Nueva Categoria</h2>
            <form id="formulario" class="" action="{{ url('Categoria-guardar') }}" method="post"
                enctype="multipart/form-data" novalidate>
                @csrf
                <div class="form-group">
                    <label for="nombre">Nombre de la Categoria</label>
                    <input type="text" name="nombre" class=" mt-2 form-control @error('nombre') is-invalid @enderror"
                        id="nombre" placeholder="Nombre Categoria..." value={{ old('nombre') }}>
                    @error('nombre')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>



                <div class="form-group mt-3">
                    <label for="descripcion">Descripción</label>
                    <input type="hidden" id="descripcion" name="descripcion" value="{{ old('descripcion') }}">
                    <trix-editor input="descripcion"
                        class="form-control form-control-lg @error('descripcion') is-invalid @enderror"></trix-editor>
                    @error('descripcion')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group mt-3">

                    <input type="submit" class="btn btn-dark" value="Agregar Categoria">
                </div>
            </form>

        </div>
    </div>

@endsection



@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.js"
        integrity="sha512-EkeUJgnk4loe2w6/w2sDdVmrFAj+znkMvAZN6sje3ffEDkxTXDiPq99JpWASW+FyriFah5HqxrXKmMiZr/2iQA=="
        crossorigin="anonymous" defer></script>
    <script src="{{ asset('js/app.js') }}" defer> </script>
@endsection
