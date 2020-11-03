<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

     <!-- icono-->
     <link rel="icon" type="image/png" href="{{ asset("img/iconos/logo.png") }}">
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">
     

    <title>404 !</title>    
    <link rel="stylesheet" href="{{ asset("css/404.css") }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
    <div class="content text-center">
  
           
            <div class="desc">
                <p class="error">404!</p>
                <hr class="divider-sm">
                <p>
                <strong>Error 404:</strong> <br>Los reursos ya no existen en este sitio.</p>
                <a class="btn btn-success" href="{{route('index.inicio')}}">Página de Inicio</a>            
            </div>
            <img class="img-logo-404" " src="{{ asset('img/publics/d-ipp/d-imp-log/logo-original.png')}}" height="90px" alt="">
    </div>
</body>
</html>