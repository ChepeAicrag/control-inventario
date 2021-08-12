<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Guardar catalogo</title>
</head>
<body>
    <h3> Creacion de Catalogos </h3>

    <form action="{{url('Guardar-catalogo')}}" method="post">
        
        @csrf

        nombre: <input type="text" name="nombre">
        descripcion: <input type="text" name="descripcion">

        <input type="submit" name="boton" value="Registrar">

    </form>
</body>
</html>
