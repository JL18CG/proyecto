<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="Municipio de Casas Grandes, Chihuahua" />
        <meta name="author" content="José Luis V" />
        <meta name="keywords" content="Casas Grandes Chihuahua, Paquimé, Casas Grandes Pueblo Mágico, Ayuntamiento">
        <title>Municipio de Casas Grandes | Pueblo Mágico</title>
        
        <meta name="twitter:description"  content="Casas Grandes Chihuahua, Paquimé, Casas Grandes Pueblo Mágico, Ayuntamiento">
        <meta name="twitter:image"  content="{{ asset("img/publics/d-ipp/d-imp-log/logo-original.png") }}"/>
      
      
        <meta property="og:image:type" content="image/png" />
        <meta property="og:image" content="{{ asset("img/publics/d-ipp/d-imp-log/logo-original.png") }}" />
        <meta property="og:type" content="article" />
        <meta property="og:image:width" content="250" />
        <meta property="og:url" content="http://www.joseluisvillalobos.net/" />
        <meta property="og:description" content="Página Oficial del Municipio de Casas Grandes, Chihuahua, Administración 2018 - 2021" />
      
        
        <!-- icono-->
        <link rel="icon" type="image/png" href="{{ asset("img/iconos/logo.png") }}">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">
        
        
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
