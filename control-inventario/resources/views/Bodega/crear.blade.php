<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Guardar bodega</title>
</head>

<body>
    <h3> Creacion de Bodegas </h3>

    <form action="{{url('Guardar-bodega')}}" method="post">

        @csrf

        nombre: <input type="text" name="nombre">
        descripcion: <input type="text" name="descripcion">
        direccion: <input type="text" name="direccion">

        <input type="submit" name="boton" value="Registrar">

    </form>
</body>

</html>
