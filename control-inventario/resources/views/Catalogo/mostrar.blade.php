<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mostrar Catalogo</title>
</head>
<body>
    <h3> Tabla de Catalogos </h3>
    <br>
    <table border="1">
        <tr>
            <td>id</td>
            <td>nombre</td>
            <td>descripcion</td>
            <td>fecha de creacion</td>
        </tr>
        @foreach ($ver as $x)
            <tr>
                <td>{{$x->id}}</td>
                <td>{{$x->nombre}}</td>
                <td>{{$x->descripcion}}</td>
                <td>{{$x->created_at}}</td>
                <td><a href="../Editar-catalogo/{{$x->id}}">Editar</a></td>
                <td><a href="../Baja-catalogo/{{$x->id}}">Baja</a></td>
            </tr>
        @endforeach
    </table>
</body>
</html>