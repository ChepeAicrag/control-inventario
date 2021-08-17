@extends('layouts.inicio')
@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.css" integrity="sha512-pTg+WiPDTz84G07BAHMkDjq5jbLS/AqY0rU/QdugnfeE0+zu0Kjz++0rrtYNK9gtzEZ33p+S53S2skXAZttrug==" crossorigin="anonymous" />
    <link href="{{ asset('css/Productos/crear.css') }}" rel="stylesheet">
@endsection

@section('botones')
   <a href="{{ url('/Catalogo') }}" class=" volver btn btn-dark"> Volver</a>
@endsection
@section('content')

    <h2 class="text-center mb-3 mt-4">Editar Cátalogo</h2>
    {{-- <div id="example"></div> --}}
    <div class="contenedor-form mb-5 ">
        <div class="formulario mb-5">
            <form id="formulario" method="POST" action="{{url('Actualizar-catalogo')}}" enctype="multipart/form-data" novalidate>
                @csrf
                <div class="form-group">
                    @csrf

                    <input type="hidden" name="id" value="{{$catalogo->id}}">
                    <label for="nombre">Nombre Cátalogo</label>
                    <input type="text" name="nombre" class="form-control @error ('nombre') is-invalid @enderror" id="nombre" placeholder="Titulo Receta..." 
                            value="{{$catalogo->nombre}}" 
                    >
                    @error('nombre')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>

                

                

                <div class="form-group mt-3">
                    <label for="descripcion">Descripción</label>
                    <input type="hidden" id="descripcion" name="descripcion" value="{{$catalogo->descripcion}}">
                    <trix-editor input="descripcion" class="form-control form-control-lg @error ('descripcion') is-invalid @enderror" ></trix-editor>
                    @error('descripcion')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>

            
                <div class="form-group mt-3">
                    <input type="submit"  class="btn btn-dark" value="Editar Producto" >
                </div>


            </form>

        </div>
    </div>
    
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.js" integrity="sha512-EkeUJgnk4loe2w6/w2sDdVmrFAj+znkMvAZN6sje3ffEDkxTXDiPq99JpWASW+FyriFah5HqxrXKmMiZr/2iQA==" crossorigin="anonymous" defer></script>
    <script src="{{asset('js/app.js')}}" defer> </script>
@endsection