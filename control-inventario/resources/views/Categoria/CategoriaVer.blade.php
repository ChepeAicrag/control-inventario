<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ver Categoria</title>
</head>

<body>
    <table border="1">
        <tr>
            <td>ID:</td>
            <td>Nombre:</td>
            <td>Descripcion:</td>
            <td>Creacion:</td>
            <td colspan="2">Accion</td>
        </tr>
        @foreach ($categoria as $x)
        <tr>
           
            <td>{{$x->id}}</td>
            <td>{{$x->nombre}}</td>
            <td>{{$x->descripcion}}</td>
            <td>{{$x->created_at}}</td>
            <td><a href="../Categoria-editar/{{$x->id}}">Editar</a></td>
            <td><a href="../Categoria-baja/{{$x->id}}">Baja</a></td>
            @endforeach
        </tr>
    </table>
</body>

</html>
