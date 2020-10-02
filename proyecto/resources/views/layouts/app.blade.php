<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="{{ asset("img/iconos/icon.png") }}">
    <title>Iniciar Seción</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/estilos-main-login.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset("css/anim-page.css") }}">

</head>
<body>

    <div class="alert-preloader" id="preloader-page">
        <div class="d-flex justify-content-center cargar">
            <div class="loader loader-g">
                <div class="loader-outter"></div>
                <div class="loader-inner"></div>
            </div>
            </div>
        </div>
    </div>
    @yield('content')


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
          setTimeout(function(){ 

            $( "#preloader-page" ).fadeOut( "slow");
            }, 1000);
    </script>
</body>
</html>
