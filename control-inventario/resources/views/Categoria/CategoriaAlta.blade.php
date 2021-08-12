<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width= , initial-scale=1.0">
    <title>Alta Categoria</title>
</head>

<body>
    <h3>Bienvenido a alta de Categoria</h3>
    <form action="{{url('Categoria-guardar')}}" method="post">
        @csrf
        
        Nombre: <input type="text" name="nombre">
        Descripcion: <input type="text" name="descripcion">
        <input type="submit" name="boton" value="Crear">
    </form>
</body>

</html>
