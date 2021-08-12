<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar catalogo</title>
</head>
<body>
    <h3> Editar catalogo </h3>

    <form action="{{url('Actualizar-catalogo')}}" method="post">
        
        @csrf

        <input type="hidden" name="id" value="{{$catalogo->id}}">

        nombre: <input type="text" name="nombre" value="{{$catalogo->nombre}}">
        descripcion: <input type="text" name="descripcion" value="{{$catalogo->descripcion}}">

        <input type="submit" name="boton" value="Actualizar">

    </form>
</body>
</html>