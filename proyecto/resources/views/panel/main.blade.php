<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    {{-- Personalizados --}}
     <link rel="stylesheet" href="{{ asset("css/estilos.css") }}">
    @yield('css')
</head>
<body>

    <div class="wrapper">
        <div class="menu">
            <div class="logo">
                <a href="#" id="menu-d"><i class="fa fa-bars"></i></a>
                <span>Panel Administrativo</span>
            </div>
            <a href="">Salir<i class="ml-2 fa fa-sign-out-alt"></i></a>
        </div>

        <div class="menu_lateral" id="lateral">
            <div class="barra">
                <ul>
                    <li>
                        <a href="#"> <i class="mr-2 fa fa-users-cog"></i>Panel de Usuarios</a>
                    </li>
                    <li>
                        <a href="#"> <i class="mr-2 fa fa-newspaper"></i>Panel de Noticias</a>
                    </li>
                    <li>
                        <a href="#"> <i class="mr-2 fa fa-address-book"></i>Panel de Directorios</a>
                    </li>
                    <li>
                        <a href="#"> <i class="mr-2 fa fa-envelope"></i>Panel de Quejas</a>
                    </li>
                    <li>
                        <a href="#"> <i class="mr-2 fa fa-camera"></i>Panel de Galerías</a>
                    </li>
                    <li>
                        <a href="#"> <i class="mr-2 fa fa-info-circle"></i>Panel de Información</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="principal">
            <div class="container">
                
                @yield('content')
                
                <div class="row">

                    <div class="col-sm-6">
                        <div class="card border-info  mb-3">
                            <div class="card-header">Header</div>
                            <div class="card-body text-info ">
                              <h5 class="card-title">Success card title</h5>
                              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                          </div>
                    </div>
                    
                    <div class="col-sm-6">
                        <div class="card border-info  mb-3">
                            <div class="card-header">Header</div>
                            <div class="card-body text-info ">
                              <h5 class="card-title">Success card title</h5>
                              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                          </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="card border-info  mb-3">
                            <div class="card-header">Header</div>
                            <div class="card-body text-info ">
                              <h5 class="card-title">Success card title</h5>
                              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                          </div>
                    </div>


                </div>
                

            </div>
        </div>
    </div>






    <script src="https://kit.fontawesome.com/c0c6128a40.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="{{ asset("js/panel.js") }}"></script>
    {{-- Personalizados --}}
    @yield('scripts')
</body>
</html>