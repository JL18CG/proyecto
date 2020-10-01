@section('titulo','Inicio')
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel | @yield('titulo')</title>
    <link rel="icon" type="image/png" href="{{ asset("img/iconos/icon.png") }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    {{-- Personalizados --}}
     <link rel="stylesheet" href="{{ asset("css/estilos.css") }}">

     
    @yield('css')
</head>
<body>
    <div class="alert-preloader d-none" id="preloader-page">
        <div class="d-flex justify-content-center cargar">
            <div class="loader loader-g">
                <div class="loader-outter"></div>
                <div class="loader-inner"></div>
            </div>
            </div>
        </div>
    </div>

    @include('panel.partials.nav')
   
    
    <div class="container container-2">
        @include('panel.partials._mensajes_estado')

        @yield('content')

        @yield('modals')
    </div>


            
    @include('panel.partials.footer')
   
    

    

    <script src="https://kit.fontawesome.com/c0c6128a40.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    {{-- Personalizados --}}

    
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="{{ asset("js/panel.js") }}"> </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    @yield('scripts')

</body>
</html>