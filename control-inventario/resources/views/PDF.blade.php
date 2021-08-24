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
           {{--  <img src="../public/imagenes/m.png"> --}}
        </div>
        <h1>Reporte de Inventario</h1>
        
        <div id="project">
            
            <div>
              <span>Venta de llantas S.A de C.V</span>
            </div>
            <span>Oaxaca de Juarez.</span>

        </div>
    </header>
    <main>
        <table>
            <thead>
                <tr>
                    <th class="service nom">ID:</th>
                    <th class="service nom">Accion:</th>
                    <th class="service nom">Cant</th>
                    <th class="service nom">Cant Ant:</th>
                    <th class="service nom">Cant Act:</th>
                    <th class="service nom">Usuario:</th>
                    <th class="service nom">Autorizacion:</th>
                    <th class="service nom">Producto:</th>
                    <th class="service nom">Fecha:</th>
                </tr>
            </thead>
            @foreach ($ver as $x)
                <tr class="text-center">
                    <td class="service">{{ $x->id }}</td>
                    <td class="service">{{ $x->accion }}</td>
                    <td class="service">{{ $x->cantidad }}</td>
                    <td class="service">{{ $x->cantidad_ant }}</td>
                    <td class="service">{{ $x->cantidad_act }}</td>
                    <td class="service">{{ $x->nombre }}</td>
                    <td class="service">{{ $x->autorizador }}</td>
                    <td class="service">{{ $x->producto }}</td>
                    <td class="service">{{ $x->months }}</td>
                </tr>
            @endforeach
        </table>
    </main>
    <footer>
    </footer>
</body>

</html>
