<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Reporte</title>
</head>
<body>
    <h3> Editar Reporte </h3>

    <form action="{{url('Actualizar-Reporte')}}" method="post">
        
        @csrf

        <input type="hidden" name="id" value="{{$reporte->id}}">

        accion: <input type="text" name="accion">
        cantidad: <input type="number" name="cantidad">
        id_usuario: <input type="number" name="id_usuario">
        id_auth: <input type="number" name="id_auth">
        id_producto: <input type="number" name="id_producto">

        <input type="submit" name="boton" value="Actualizar">

    </form>
</body>
</html>