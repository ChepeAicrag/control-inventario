@extends('layouts.inicio')
@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.css" integrity="sha512-pTg+WiPDTz84G07BAHMkDjq5jbLS/AqY0rU/QdugnfeE0+zu0Kjz++0rrtYNK9gtzEZ33p+S53S2skXAZttrug==" crossorigin="anonymous" />
<link href="{{ asset('css/Productos/crear.css') }}" rel="stylesheet">
@endsection
@section('botones')
{{-- <a href="{{ url('/productos/index') }}" class=" volver btn btn-dark"> Volver</a> --}}
<div class="regresar">
    <a href="{{ url('/productos/index') }}" class=" volver"> <img class="imagen" src="/imagenes/regresar.png" /></a>
</div>
@endsection

@section('content')
<h2 class="text-center mb-3 mt-4">Stock</h2>
{{-- <div id="example"></div> --}}
<div class="contenedor-form mb-5 ">
    <div class="formulario mb-5">
        <form id="formulario" method="POST" action="{{url('StockP')}}" enctype="multipart/form-data" novalidate>
            @csrf
            <input type="hidden" name="id" value="{{$producto->id}}">

            <div class="form-group mt-3">
                <label for="accion">Accion</label>

                <select name="accion" class="form-control form-control-lg @error('accion') is-invalid @enderror" id="accion">
                    <option value="">-- Seleccione --</option>
                    <option value="sumar">Sumar</option>
                    <option value="restar">Resta</option>
                </select>
                @error('accion')
                <span class="invalid-feedback d-block" role="alert">
                    <p class="errores">{{ 'Seleccione una accion' }}</p>
                </span>
                @enderror
            </div>

            <div class="form-group mt-3">
                <label for="cantidad">Cantidad</label>
                <input onkeypress="return valideKey(event);"  name="cantidad" step="1.00">
                @error('cantidad')
                        <span class="invalid-feedback d-block" role="alert">
                            <p class="errores">{{ 'Se necesita un número' }}</p>
                        </span>
                @enderror

            </div>
            <div class="form-group mt-3">
                <label for="id_usuario">ID Usuario:</label>
                {{--<input type="number"  name="id_usuario" step="1.00">--}}
                <select name="id_usuario" class="form-control form-control-lg @error ('id_usuario') is-invalid @enderror" id="id_usuario">

                    <option value="">-- Seleccione --</option>
                    @foreach ($users as $users)
                    <option value={{$users->id}}>{{$users->nombre}}</option>
                    @endforeach


                </select>

                @error('id_usuario')
                <span class="invalid-feedback d-block" role="alert">
                    <p class="errores">{{"Seleccione un usuario"}}</p>
                </span>
                @enderror

                <div class="form-group mt-3">
                    <label for="id_auth">ID Auth:</label>

                    <input disabled name="id_auth" class="text-center form-control form-control-lg @error ('id_auth') is-invalid @enderror" id="id " value="{{ Auth::user()->nombre}}">
                    </input>

                   
                </div>

                <div class="form-group mt-3">
                    <input type="submit" class="btn btn-dark" value="Editar Stock">
                </div>

        </form>

    </div>
</div>

@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.js" integrity="sha512-EkeUJgnk4loe2w6/w2sDdVmrFAj+znkMvAZN6sje3ffEDkxTXDiPq99JpWASW+FyriFah5HqxrXKmMiZr/2iQA==" crossorigin="anonymous" defer></script>
<script src="{{ asset('js/app.js') }}" defer> </script>
@endsection
