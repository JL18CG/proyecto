<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    {{-- Personalizados --}}
     <link rel="stylesheet" href="{{ asset("css/estilos.css") }}">
    @yield('css')
</head>
<body>


        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
     
                <a class="navbar-brand" href="#!">Panel Administrativo</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a href="#" class="nav-link"> <i class="mr-1 fa fa-users-cog"></i>Usuarios</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route("noticias.index") }}" class="nav-link"> <i class="mr-1 fa fa-newspaper"></i>Noticias</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link"> <i class="mr-1 fa fa-address-book"></i>Directorios</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link"> <i class="mr-1 fa fa-envelope"></i>Quejas</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link"> <i class="mr-1 fa fa-info-circle"></i>Información</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link"> <i class="mr-1 fa fa-camera"></i>Galerías</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-cog"></i> Cuenta 
                            </a>
                            <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="#">Salir  <i class="fa fa-sign-out-alt float-right mt-1"></i></a>
                            </div>
                        </li>
                    </ul>
                </div>
        
        </nav>

       
    <div class="container">
            
        @include('panel.partials._mensajes_estado')

        @yield('content')

        @yield('modals')
    </div>

            
  


   
    


    {{-- Personalizados --}}
    @yield('scripts')
    
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/c0c6128a40.js" crossorigin="anonymous"></script>
    <script src="{{ asset("js/panel.js") }}"></script>
 


</body>
</html>