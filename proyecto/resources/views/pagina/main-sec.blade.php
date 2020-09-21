<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="Municipio de Casas Grandes, Chihuahua" />
        <meta name="author" content="José Luis V" />
        <title>Municipio de Casas Grandes | Pueblo Mágico</title>
        <!-- icono-->
        <link rel="icon" type="image/png" href="{{ asset("img/iconos/logo.png") }}">
        
        <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
        <!-- Third party plugin CSS-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link rel="stylesheet" href="{{ asset("css/normalize.css") }}">
        <link rel="stylesheet" href="{{ asset("css/estilos-main-01.css") }}">
        <link rel="stylesheet" href="{{ asset("css/custom.css") }}">
        <link rel="stylesheet" href="{{ asset("css/custom-sec.css") }}">
        <link rel="stylesheet" href="{{ asset("css/anim-page.css") }}">
    </head>
    <body id="page-top">
        <div class="alert-preloader" id="preloader-page">
            <div class="d-flex justify-content-center cargar">
                <div class="loader loader-g">
                    <div class="loader-outter"></div>
                    <div class="loader-inner"></div>
                </div>
                </div>
            </div>
        </div>
        
        
        <!-- Navigation-->
        @include('pagina.partials.nav')

       
        <div class="container container-main">
            @yield('content')
        </div>
        
        <!-- Footer-->
        @include('pagina.partials.footer')


        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{ asset("js/js-main-02.js") }}"> </script>
    </body>
</html>
