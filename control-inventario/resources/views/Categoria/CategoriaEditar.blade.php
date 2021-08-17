<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Categoria</title>
</head>
<body>

    <h3>Editar Categoria</h3>
    <form action="{{url('Categoria-actualizar')}}" method="post">
    @csrf
   <input type="hidden" name="id" value="{{$categoria->id}}">
    Nombre: <input type="text" name="nombre" value="{{$categoria->nombre}}">
    Descripcion: <input type="text" name="descripcion" value="{{$categoria->descripcion}}">
    <input type="submit" name="actualizar" value="Actualizar">
</body>
</html>