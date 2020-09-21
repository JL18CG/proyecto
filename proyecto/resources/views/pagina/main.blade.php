<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="Municipio de Casas Grandes, Chihuahua" />
        <meta name="author" content="José Luis V" />
        <title>Municipio de Casas Grandes | Pueblo Mágico</title>
        <!-- icono-->
        <link rel="icon" type="image/png" href="{{ asset("img/iconos/logo.png") }}">
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
        <!-- Third party plugin CSS-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link rel="stylesheet" href="{{ asset("css/normalize.css") }}">
        <link rel="stylesheet" href="{{ asset("css/estilos-main-01.css") }}">
        <link rel="stylesheet" href="{{ asset("css/custom.css") }}">
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
        <!-- Masthead-->
        @include('pagina.partials.header')
       
        <div class="container container-main pt-5 pb-5">
            <div class="col-12">


                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img class="d-block w-100" src="{{asset("/img/publics/home-pres/pres-01.jpg")}}" alt="First slide">
                        <div class="carousel-caption d-none d-md-block">
                          <h5>Texto de Presentacíon</h5>
                          <p>Breve descripción sobre la infografía o nota.</p>
                          <button class="btn btn-primary">Ver mas</button>
                        </div>
                      </div>
                      <div class="carousel-item">
                        <img class="d-block w-100" src="{{asset("/img/publics/home-pres/pres-02.jpg")}}" alt="Second slide">
                        <div class="carousel-caption d-none d-md-block">
                          <h5>Texto de Presentacíon</h5>
                          <p>Breve descripción sobre la infografía o nota.</p>
                          <button class="btn btn-primary">Ver mas</button>
                        </div>
                      </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                  </div>

            </div>
            <div class="col-12 mb-5">
            
            </div>

            <div class="col-12">
                <hr>
                <p class="d-block text-center mt-2 mb-3">Casas Grandes Pueblo Mágico</p>
                <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d40863.14679730461!2d-107.9717579141836!3d30.37687692417775!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sCasas%20Grandes%20Pueblo%20magico!5e0!3m2!1ses-419!2smx!4v1600154472561!5m2!1ses-419!2smx" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
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
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">
        <script src="{{ asset("js/js-main-01.js") }}"> </script>
    </body>
</html>
