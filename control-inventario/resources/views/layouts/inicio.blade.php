<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
    {{-- @yield('script') --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>


    @yield('styles')
    <!-- Styles -->
    <link href="{{ asset('css/inicio.css') }}" rel="stylesheet">
</head>
<html lang="en">
    <body>
        <div class="app">
            <nav class="nav-header navbar navbar-expand-md navbar-light ">
                <div class="nav-header container">
                    <a class=" letra navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
    
            </nav>
    
            <div class="principal">
                
                    <div class="botones mt-3">
                        @yield('botones')
                    </div>
                    
                    <main class="contenido ">
                        @yield('content')
                    </main>
               
    
            </div>
            <div class="mt-5 footer-inicio">
                <div class="footer-copyright text-center py-3">© 2021 Copyright:
                </div>
            </div>
           
        </div>
        @yield('scripts')
    </body>
</html>