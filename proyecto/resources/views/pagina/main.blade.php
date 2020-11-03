@section('mi_link','activo-l')
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="Página Oficial del Municipio de Casas Grandes, Chihuahua, Administración 2018 - 2021" />
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
        
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">
        <!-- icono-->
        <link rel="icon" type="image/png" href="{{ asset("img/iconos/logo.png") }}">
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
        <div class="sp-divider pt-1 pb-1"></div>
        <div class="container container-main pt-5 pb-5">

            <div class="col-12">
              <h2 class="d-block text-center">Últimas Noticias</h2>
              <hr class="divider-sm">
                  <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 mb-1">
                      <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner  fondo-img">
                                  <div class="carousel-item reset-img-size active">
                                    <img class="img-noticia" src="{{ asset("img/publics/d-ipp/d-imp-log/logo-admon.png") }}" height="60px" alt="">
                                    <img class="d-block w-100 image" src="{{asset("web/img/noticias/thumbs/".$noticias[0]->imagen)}}"  alt="First slide">
                                    <div class="carousel-caption">
                                      <h5 class="link-inicio"> <a href="{{route('show.noticia', $noticias[0]->url)}}" target="_blank">{{$noticias[0]->titulo}}</a> </h5>
                                    </div>
                                  </div>
                              
                                  <div class="carousel-item reset-img-size">
                                    <img class="img-noticia" src="{{ asset("img/publics/d-ipp/d-imp-log/logo-admon.png") }}" height="60px" alt="">
                                    <img class="d-block w-100 image " src="{{asset("web/img/noticias/thumbs/".$noticias[1]->imagen)}}" alt="First slide">
                                    <div class="carousel-caption">
                                      <h5 class="link-inicio"><a href="{{route('show.noticia', $noticias[1]->url)}}" target="_blank">{{$noticias[1]->titulo}}</a></h5>
                                    </div>
                                  </div>

                                  <div class="carousel-item reset-img-size">
                                    <img class="img-noticia" src="{{ asset("img/publics/d-ipp/d-imp-log/logo-admon.png") }}" height="60px" alt="">
                                    <img class="d-block w-100 image" src="{{asset("web/img/noticias/thumbs/".$noticias[2]->imagen)}}" alt="First slide">
                                    <div class="carousel-caption">
                                      <h5 class="link-inicio"><a href="{{route('show.noticia', $noticias[2]->url)}}" target="_blank">{{$noticias[2]->titulo}}</a></h5>
                                    </div>
                                  </div>

                                  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Anterior</span>
                                  </a>
                                  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Sigueinte</span>
                                  </a>
                              </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 ">
                      @if ($noticias->count() == 7 )
                          <div class="row">
                              <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 disp-img">
                                  <div class="img-res-noticia n-1">
                                    <img class="d-block w-100" src="{{asset("web/img/noticias/thumbs/".$noticias[3]->imagen)}}" alt="">
                                    <div class="cap-image-p text-center">
                                      <h5 class="link-inicio"> <a href="{{route('show.noticia', $noticias[3]->url)}}" target="_blank">{{Str::limit($noticias[3]->titulo,30)}}</a> </h5>
                                    </div>
                                  </div>
                              </div>
                              <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 disp-img">
                                  <div class="img-res-noticia n-2">
                                    <img class="d-block w-100" src="{{asset("web/img/noticias/thumbs/".$noticias[4]->imagen)}}" alt="">
                                    <div class="cap-image-p text-center">
                                      <h5 class="link-inicio"> <a href="{{route('show.noticia', $noticias[4]->url)}}" target="_blank">{{Str::limit($noticias[4]->titulo,30)}}</a> </h5>
                                    </div>
                                  </div>
                              </div>
                              <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 disp-img">
                                  <div class="img-res-noticia n-3">
                                      <img class="d-block w-100" src="{{asset("web/img/noticias/thumbs/".$noticias[5]->imagen)}}" alt="">
                                      <div class="cap-image-p text-center">
                                        <h5 class="link-inicio"> <a href="{{route('show.noticia', $noticias[5]->url)}}" target="_blank">{{Str::limit($noticias[5]->titulo,30)}}</a> </h5>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 disp-img">
                                  <div class="img-res-noticia n-3">
                                        <img class="d-block w-100" src="{{asset("web/img/noticias/thumbs/".$noticias[6]->imagen)}}" alt="">
                                        <div class="cap-image-p text-center">
                                          <h5 class="link-inicio"> <a href="{{route('show.noticia', $noticias[6]->url)}}" target="_blank">{{Str::limit($noticias[6]->titulo,30)}}</a> </h5>
                                        </div>
                                  </div>
                              </div>
                          </div>
                        @endif
                    </div>

                </div>
        
            </div>

            {{-- Mapa --}}
            <div class="col-12 mt-5 mb-5">
              <h2 class="d-block text-center">Casas Grandes Pueblo Mágico</h2>
              <hr class="divider-sm">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3442.131222029475!2d-107.95139488538051!3d30.375631509807057!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x86dcaca8efbea17b%3A0xdaa7040dd5df6f27!2sPresidencia%20Municipal%20De%20Casas%20Grandes!5e0!3m2!1ses-419!2smx!4v1601338733019!5m2!1ses-419!2smx" 
                          width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
            {{-- Fin Mapa --}}
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
        <script src="{{ asset("js/js-main-01.js") }}"> </script>
    </body>
</html>
