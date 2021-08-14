<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
</html>