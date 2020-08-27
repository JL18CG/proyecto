<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login</title>


    <link rel="icon" type="image/png" href="{{ asset("img/iconos/icon.png") }}">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Styles -->

    <link rel="stylesheet" href="{{ asset("./css/estilos2.css") }}">
</head>


<body>



    <div class="container h-100">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-xs-12 col-sm-6 col-md-4 ">
                <div class="text-center items-c">
                    <div class="logo"></div>
                    <hr>
                    <div>
                        @yield('content')
                    </div>
              
                </div>
            </div>
          

        </div>
    </div>


 
    </body>
</html>
