<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar bodega</title>
</head>

<body>
    <h3> Editar bodega </h3>

    <form action="{{url('Actualizar-bodega')}}" method="post">

        @csrf

        <input type="hidden" name="id" value="{{$bodega->id}}">

        nombre: <input type="text" name="nombre" value="{{$bodega->nombre}}">
        descripcion: <input type="text" name="descripcion" value="{{$bodega->descripcion}}">
        direccion: <input type="text" name="direccion" value="{{$bodega->direccion}}">

        <input type="submit" name="boton" value="Actualizar">

    </form>
</body>

</html>
