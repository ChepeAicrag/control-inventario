<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mostrar Reporte</title>
</head>
<body>
    <h3> Tabla de Reporte </h3>
    <br>
    <table border="1">
        <tr>
            <td>id</td>
            <td>accion</td>
            <td>cantidad</td>
            <td>cantidad_ant</td>
            <td>cantidad_act</td>
            <td>id usuario</td>
            <td>id autorizacion</td>
            <td>id producto</td>
        </tr>
        @foreach ($ver as $x)
            <tr>
                <td>{{$x->id}}</td>
                <td>{{$x->accion}}</td>
                <td>{{$x->cantidad}}</td>
                <td>{{$x->cantidad_ant}}</td>
                <td>{{$x->cantidad_act}}</td>
                <td>{{$x->id_usuario}}</td>
                <td>{{$x->id_auth}}</td>
                <td>{{$x->id_producto}}</td>
                <td><a href="../Editar-Reporte/{{$x->id}}">Editar</a></td>
                <td><a href="../Baja-Reporte/{{$x->id}}">Baja</a></td>
            </tr>
        @endforeach
    </table>
</body>
</html>