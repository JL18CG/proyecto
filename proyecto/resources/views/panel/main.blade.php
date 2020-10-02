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
    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light shadow-sm">
        <div class="container">

        
            <a class="navbar-brand" href="#!"><img src="{{ asset("img/logos/nav.png") }}" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item ">
                        <a  href="{{ route("usuarios.index") }}"  data-toggle="tooltip" title="Usuarios"  class="nav-link pl-3 pr-3 {{ $active ?? '' }}"> <i class="mr-1 fa fa-users-cog"></i>Usuarios</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route("noticias.index") }}"  data-toggle="tooltip" title="Noticias" class="nav-link pl-3 pr-3 {{ $link_noticia ?? '' }}"> <i class="mr-1 fa fa-newspaper"></i>Noticias</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route("directorios.index") }}" data-toggle="tooltip" title="Directorios" class="nav-link pl-3 pr-3 {{ $link_directorio ?? '' }}"> <i class="mr-1 fa fa-address-book"></i>Directorios</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route("turismo.inicio") }}" data-toggle="tooltip" title="Turismo" class="nav-link pl-3 pr-3 {{ $link_turismo ?? '' }}"> <i class="mr-1 fa fa-bus"></i>Turismo</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route("reportes.index") }}" data-toggle="tooltip" title="Reportes" class="nav-link pl-3 pr-3 {{ $link_reportes ?? '' }}"> <i class="mr-1 fa fa-file-pdf"></i>Reportes</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route("consultas.index") }}" data-toggle="tooltip" title="Consultas" class="nav-link pl-3 pr-3"> <i class="mr-1 fa fa-envelope"></i>Consultas</a>
                    </li>
                    
                    <li class="nav-item">
                        <a href="{{ route('logout') }}" id="log-out" data-toggle="tooltip" title="Cerrar Sesión" class=" nav-link pl-3 pr-3 rounded btn btn-outline-danger">{{  Str::upper(auth()->user()->name)}} <i class="mr-1 fa fa-sign-out-alt"></i>  </a>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    
                </ul>
            </div>
        </div>
    </nav>

    <div class="container container-2">

        @include('panel.partials._mensajes_estado')

        @yield('content')

        @yield('modals')
    </div>


            
  
    <footer class="footer navbar-light bg-light shadow-sm">
        <div class="container pt-5 pb-2">
            <div class="text-center">
                   <a class=" " href="#!"><img src="{{ asset("img/logos/nav-001.png") }}" alt=""></a>
                   <p class="mt-5">Gobierno Municipal de Casas Grandes 2020&copy; Todos los Derechos Reservados</p> 
            </div>
        </div>
    </footer>

   
    

    

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