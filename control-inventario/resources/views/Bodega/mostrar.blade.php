<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mostrar Bodega</title>
</head>

<body>
    <h3> Tabla de Bodegas </h3>
    <br>
    <table border="1">
        <tr>
            <td>id</td>
            <td>nombre</td>
            <td>descripcion</td>
            <td>direccion</td>
            <td>fecha de creacion</td>
        </tr>
        @foreach ($ver as $bodega)
        <tr>
            <td>{{$bodega->id}}</td>
            <td>{{$bodega->nombre}}</td>
            <td>{{$bodega->descripcion}}</td>
            <td>{{$bodega->direccion}}</td>
            <td>{{$bodega->created_at}}</td>
            <td><a href="../Editar-bodega/{{$bodega->id}}">Editar</a></td>
            <td><a href="../Baja-bodega/{{$bodega->id}}">Baja</a></td>
        </tr>
        @endforeach
    </table>
</body>

</html>
