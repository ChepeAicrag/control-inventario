@extends('layouts.inicio')
@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.css" integrity="sha512-pTg+WiPDTz84G07BAHMkDjq5jbLS/AqY0rU/QdugnfeE0+zu0Kjz++0rrtYNK9gtzEZ33p+S53S2skXAZttrug==" crossorigin="anonymous" />
    <link href="{{ asset('css/Productos/crear.css') }}" rel="stylesheet">
@endsection
@section('botones')
   <a href="{{ url('/productos/index') }}" class=" volver btn btn-dark"> Volver</a>
@endsection
{{-- 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Stock</title>
</head>
<body>
    <h3> Sumar y Restar stock </h3>

    <form action="{{url('StockP')}}" method="post">
        
        @csrf

        <input type="hidden" name="id" value="{{$producto->id}}">

        accion: <input type="text" name="accion">
        cantidad: <input type="number" name="cantidad">
        id_usuario: <input type="number" name="id_usuario">
        id_auth: <input type="number" name="id_auth">

        <input type="submit" name="boton" value="Hecho">

    </form>
</body>
</html> --}}


@section('content')
<h2 class="text-center mb-3 mt-4">Stock</h2>
{{-- <div id="example"></div> --}}
<div class="contenedor-form mb-5 ">
    <div class="formulario mb-5">
        <form id="formulario" method="POST" action="{{url('StockP')}}" enctype="multipart/form-data" novalidate>
            @csrf
            <input type="hidden" name="id" value="{{$producto->id}}">

            <div class="form-group">
                <label for="accion">Accion</label>
                <input type="text" name="accion" class="form-control @error('accion') is-invalid @enderror" id="accion"
                    placeholder="Accion">
                @error('titulo')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mt-3">
                <label for="cantidad">Cantidad</label>
                <input type="number"  name="cantidad" step="1.00">

            </div>
            <div class="form-group mt-3">
                <label for="id_usuario">ID Usuario:</label>
                {{--<input type="number"  name="id_usuario" step="1.00">--}}
                    <select name="id_usuario"
                            class="form-control form-control-lg @error ('id_usuario') is-invalid @enderror"
                            id="id_usuario">

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

            </div>
            <div class="form-group mt-3">
                <label for="id_auth">ID Auth:</label>
                <input type="number"  name="id_auth" step="0.00" value= {{ Auth::user()->id }}>

            </div>
            <div class="form-group mt-3">
                <input type="submit" class="btn btn-dark" value="Editar Stock">
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