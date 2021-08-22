@extends('layouts.inicio')
<title>Reporte</title>
@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.css"
        integrity="sha512-pTg+WiPDTz84G07BAHMkDjq5jbLS/AqY0rU/QdugnfeE0+zu0Kjz++0rrtYNK9gtzEZ33p+S53S2skXAZttrug=="
        crossorigin="anonymous" />
    <link href="{{ asset('css/Productos/index.css') }}" rel="stylesheet">
@endsection
@section('botones')
    <div class="regresar">
        <a href="{{ url('/inicio') }}" class=" volver"> <img class="imagen" src="/imagenes/regresar.png" /></a>
    </div>
    {{-- <a href="{{ url('/inicio') }}" class=" mt-3 volver btn btn-dark"> Volver</a> --}}
    {{-- <a href="../PDF-Reporte" target="_blank" class="mt-3 volver btn btn-danger ">PDF</a> --}}
    <a href="../PDF-Reporte" target="_blank" class=" boton-a mt-4 volver"> <img class="imagen" src="/imagenes/pdf.png" />
        <p class="mt-2 mb-0">PDF</p>
    </a>
    {{-- <a href="../Exportar-Reporte" class="mt-3 volver btn btn-success ">EXCEL</a> --}}
    <a href="../Exportar-Reporte" class=" boton-a mt-4 volver"> <img class="imagen" src="/imagenes/excel.png" />
        <p class="mt-2 mb-0">EXCEL</p>
    </a>

    {{-- <a href="{{ url('/Crear-Reporte') }}" class=" mt-3 volver btn btn-secondary"> Agregar Categoria +</a> --}}
@endsection
@section('content')


    <div class="col-md-10  mx-auto p-3">
        <h2 class="text-center  mb-3">Reporte</h2>
        <p>Fecha de Creacion:</p>
        <div class="botonesacciones">
            <div>
                <select name="months" class="form-control form-control-lg @error('months') is-invalid @enderror" id="months">
                    <option value="">-- Seleccione --</option>
                    @foreach ($fechas as $fechas)
                    <option value={{$fechas->months}}>{{$fechas->months}}</option>
                    @endforeach    
                </select>
                @error('months')
                <span class="invalid-feedback d-block" role="alert">
                    <p class="errores">{{"Seleccione un usuario"}}</p>
                </span>
                
                @enderror
            </div>
            
            <div>
                <button type="button" class="btn btn-dark">Ordenar</button>
            </div>
           
        </div>

        <table class="table mt-3">
            <thead class="bg-dark text-light text-center">
                <tr>
                    <th scole="col">ID</th>
                    <th scole="col">Accion</th>
                    <th scole="col">Cantidad</th>
                    <th scole="col">ID Usuario</th>
                    <th scole="col">ID Autorizacion</th>
                    <th scole="col">ID Producto</th>
                    <th scole="col">Fecha</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($ver as $x)
                    <tr class="text-center">
                        <td>{{ $x->id }}</td>
                        <td>{{ $x->accion }}</td>
                        <td>{{ $x->cantidad }}</td>
                        <td>{{ $x->id_usuario }}</td>
                        <td>{{ $x->id_auth }}</td>
                        <td>{{ $x->id_producto }}</td>
                        <td>{{ $x->months }}</td>
                        {{-- <td>
                            <a href="../PDF-Reporte" target="_blank"
                                class="btn btn-danger mr-1 mb-2 d-block w-100">PDF</a> 
                            <a href="" class="btn btn-success mr-1 mb-2 d-block w-100">PDF</a>
                            <a href="../Exportar-Reporte"
                                class="btn btn-success mr-1 mb-2 d-block w-100">EXCEL</a> 
                        </td> --}}


                    </tr>
                @endforeach

            </tbody>

        </table>

        <div class="mb-5">
            @if ($ver->currentPage() > 1)
                <a href=" {{ $ver->previousPageUrl() }}" class="btn btn-dark">atras</a>
            @endif

            @if ($ver->hasMorePages())
                <a href=" {{ $ver->nextPageUrl() }}" class="btn btn-dark">siguiente</a>
            @endif

            <p class="mt-2">Mostrando {{ $ver->firstItem() }} a {{ $ver->lastItem() }} ... de
                {{ $ver->total() }} </p>

        </div>

    </div>

@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.js"
        integrity="sha512-EkeUJgnk4loe2w6/w2sDdVmrFAj+znkMvAZN6sje3ffEDkxTXDiPq99JpWASW+FyriFah5HqxrXKmMiZr/2iQA=="
        crossorigin="anonymous" defer></script>
    <script src="{{ asset('js/app.js') }}" defer> </script>
@endsection
