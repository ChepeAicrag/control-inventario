<!DOCTYPE html>
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
        id_usuario: <input type="number" name="id_usuario">
        id_auth: <input type="number" name="id_auth">
        id_producto: <input type="number" name="id_producto">

        <input type="submit" name="boton" value="Registrar">

    </form>
</body>
</html>
