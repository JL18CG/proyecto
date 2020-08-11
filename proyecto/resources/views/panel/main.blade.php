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

        <div class="principal">
            <div class="container">
                
                @yield('content')
                
                <div class="row">

                    <div class="col-sm-6">
                        <div class="card border-info  mb-3">
                            <div class="card-header">Header</div>
                            <div class="card-body text-info ">
                              <h5 class="card-title">Success card title</h5>
                              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card´s content.</p>
                            </div>
                          </div>
                    </div>
                    
                    <div class="col-sm-6">
                        <div class="card border-info  mb-3">
                            <div class="card-header">Header</div>
                            <div class="card-body text-info ">
                              <h5 class="card-title">Success card title</h5>
                              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card´s content.</p>
                            </div>
                          </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="card border-info  mb-3">
                            <div class="card-header">Header</div>
                            <div class="card-body text-info ">
                              <h5 class="card-title">Success card title</h5>
                              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card´s content.</p>
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

            
  


   
    



    <script src="https://kit.fontawesome.com/c0c6128a40.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/c0c6128a40.js" crossorigin="anonymous"></script>
    <script src="{{ asset("js/panel.js") }}"></script>
 


</body>
</html>