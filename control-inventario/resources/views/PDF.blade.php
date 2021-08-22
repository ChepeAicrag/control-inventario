<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=3.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Example 1</title>
    <link rel="stylesheet" href="../public/css/pdf.css">
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="../public/imagenes/agragar.png" >
      </div>
      <h1>Reporte de Inventario</h1>
    </header>
    <main>
        <table>
            <thead>
                <tr>
                  <th class="service nom">ID:</th>
                  <th class="service nom">Accion:</th>
                  <th class="service nom">Cantidad</th>
                  <th class="service nom">Cantidad Ant:</th>
                  <th class="service nom">Cantidad Act:</th>
                  <th class="service nom">ID Usuario:</th>
                  <th class="service nom">ID Autorizacion:</th>
                  <th class="service nom">ID Producto:</th>
                  <th class="service nom">Fecha:</th>
                </tr>
              </thead>
            @foreach ($ver as $x)
                <tr class="text-center">
                    <td class="service">{{ $x->id }}</td>
                    <td class="service">{{ $x->accion }}</td>
                    <td class="service">{{ $x->cantidad }}</td>
                    <td class="service">{{$x->cantidad_ant}}</td>
                    <td class="service">{{$x->cantidad_act}}</td>
                    <td class="service">{{ $x->id_usuario }}</td>
                    <td class="service">{{ $x->id_auth }}</td>
                    <td class="service">{{ $x->id_producto }}</td>
                    <td class="service">{{ $x->months }}</td>
                </tr>
            @endforeach
        </table>
    </main>
    <footer>
    </footer>
  </body>
</html>