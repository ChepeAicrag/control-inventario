@extends('layouts.inicio')
@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.css"
        integrity="sha512-pTg+WiPDTz84G07BAHMkDjq5jbLS/AqY0rU/QdugnfeE0+zu0Kjz++0rrtYNK9gtzEZ33p+S53S2skXAZttrug=="
        crossorigin="anonymous" />
    <link href="{{ asset('css/Productos/crear.css') }}" rel="stylesheet">
@endsection
@section('botones')
    <a href="{{ url('Mostrar-Reporte') }}" class=" volver btn btn-dark"> Volver</a>
@endsection

{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Guardar Reporte</title>
</head>
<body>
    <h3> Creacion de Reportes </h3>

    <form action="{{url('Guardar-Reporte')}}" method="post">
        
        @csrf

        accion: <input type="text" name="accion">
        cantidad: <input type="number" name="cantidad">
        cantidad_ant: <input type="number" name="cantidad_ant">
        cantidad_act: <input type="number" name="cantidad_act">
        id_usuario: <input type="number" name="id_usuario">
        id_auth: <input type="number" name="id_auth">
        id_producto: <input type="number" name="id_producto">

        <input type="submit" name="boton" value="Registrar">

    </form>
</body>
</html> --}}
@section('content')


    {{-- <div id="example"></div> --}}
    <div class="  mb-5 contenedor-form row justify-content-center mt-5">
        <div class=" formulario mb-5">
            <h2 class="text-center mb-5">Agregar Reporte</h2>
            <form id="formulario" class="" method="POST" action="{{ url('Guardar-Reporte') }}" enctype="multipart/form-data"
                novalidate>
                @csrf
                <div class="form-group">
                    <label for="accion">Acción</label>
                    <input type="text" name="accion" class="form-control @error('accion') is-invalid @enderror" id="accion"
                        placeholder="Acción ..." value={{ old('accion') }}>
                    @error('accion')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <div class="form-group mt-3">
                    <label for="cantidad">Cantidad</label>
                    <input type="number" name="cantidad" step="1.00">

                </div>

                <div class="form-group mt-3">
                    <label for="id_usuario">ID Usuario</label>
                    <input type="number" name="id_usuario" step="1.00">

                </div>

                <div class="form-group mt-3">
                    <label for="id_auth">ID Auth</label>
                    <input type="number" name="id_auth" step="1.00">

                </div>

                <div class="form-group mt-3">
                    <label for="id_producto">ID Producto</label>
                    <input type="number" name="id_producto" step="1.00">

                </div>

                <div class="form-group mt-3">

                    <input type="submit" class="btn btn-dark" value="Agregar Reporte">
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
