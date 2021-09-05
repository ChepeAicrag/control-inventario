@extends('layouts.inicio')
@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.css" integrity="sha512-pTg+WiPDTz84G07BAHMkDjq5jbLS/AqY0rU/QdugnfeE0+zu0Kjz++0rrtYNK9gtzEZ33p+S53S2skXAZttrug==" crossorigin="anonymous" />
    <link href="{{ asset('css/Productos/crear.css') }}" rel="stylesheet">
@endsection

@section('botones')
   {{-- <a href="{{ url('/Mostrar-bodega') }}" class=" volver btn btn-dark"> Volver</a> --}}
   <div class="regresar">
    <a href="{{ url('/Mostrar-bodega') }}" class=" volver"> <img class="imagen" src="/imagenes/regresar.png" /></a>
    
</div>
@endsection
@section('content')
    <div class="contenedor-form">
       
        <div class="mt-3 formulario">
            <h2 class="text-center mb-5">Nueva Bodega</h2>
            <form id="formulario" class="" action="{{url('Guardar-bodega')}}" method="post" enctype="multipart/form-data" novalidate>
                @csrf
                <div class="form-group">
                    <label for="nombre">Nombre de la Bodega</label>
                    <input type="text" name="nombre" class=" mt-2 form-control @error ('nombre') is-invalid @enderror" id="nombre" placeholder="Nombre Bodega..." 
                            value={{old('nombre')}}
                    >
                    @error('nombre')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group mt-2">
                    <label for="direccion">Dirección</label>
                    <input type="text" name="direccion" class=" mt-2 form-control @error ('direccion') is-invalid @enderror" id="direccion" placeholder="Dirección..." 
                            value={{old('direccion')}}
                    >
                    @error('direccion')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group mt-3">
                    <label for="descripcion">Descripción</label>
                    <input type="hidden" id="descripcion" name="descripcion" value="{{old('descripcion')}}">
                    <trix-editor input="descripcion" class="form-control form-control-lg @error ('descripcion') is-invalid @enderror" ></trix-editor>
                    @error('descripcion')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    
                    <input type="submit"  class="btn btn-dark" value="Agregar Bodega" >
                </div>
            </form>

        </div>
    </div>
    
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.js" integrity="sha512-EkeUJgnk4loe2w6/w2sDdVmrFAj+znkMvAZN6sje3ffEDkxTXDiPq99JpWASW+FyriFah5HqxrXKmMiZr/2iQA==" crossorigin="anonymous" defer></script>
    <script src="{{asset('js/app.js')}}" defer> </script>
@endsection