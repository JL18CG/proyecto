<header>
    <div class="pres text-center">
        <div class="prev"></div>
        <div class="links mr-3">
            <i class="fa fa-facebook"></i>
            <i class="fa fa-youtube"></i>
            <i class="fa fa-map-marker-alt"></i>
        </div>
        <a href="#"> <img src="{{ asset("img/publics/d-ipp/d-imp-log/logo-pueblo-magico.png") }}"  alt=""></a>
    </div>

    <nav class="nav navbar navbar-expand-lg navbar-light bg-light ">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="{{ asset("img/publics/d-ipp/d-imp-log/logo-pueblo-magico-min.png") }}" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu-inicio" aria-controls="menu-inicio" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
                <div class="collapse navbar-collapse justify-content-end" id="menu-inicio">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link  p-3" href="#">Inicio</a> </li>
                        <li class="nav-item @yield('link_n')"  > <a class="nav-link  p-3" href="{{ route("index.noticia") }}" ">Noticias</a> </li>
                        <li class="nav-item  @yield('link_d') " > <a class="nav-link  p-3" href="{{ route("index.directorio") }}" ">Directorio</a> </li>
                        <li class="nav-item"> <a class="nav-link  p-3" href="#">Tesorería</a> </li>
                        <li class="nav-item"> <a class="nav-link  p-3" href="#">Turismo</a> </li>
                        <li class="nav-item"> <a class="nav-link  p-3" href="#">Transparencia</a> </li>
                        <li class="nav-item"> <a class="nav-link  p-3" href="#">Consulta</a> </li>
                    </ul>
                </div>
        </div>    
    </nav>
</header>