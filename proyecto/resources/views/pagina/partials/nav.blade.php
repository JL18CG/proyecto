<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger nav-items" href="{{ route('index.inicio')}}"> <img src="{{ asset("img/publics/d-ipp/d-imp-log/logo.png") }}" height="70px" alt=""> <div class="float-right admon ml-3  d-none d-sm-block"> <label class="pres-label">Ayuntamiento de Casas Grandes</label><hr><label class="pres-label">Administración 2018-2021</label> </div> </a>
      <button class="navbar-toggler navbar-toggler-right nav-tog" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto my-2 my-lg-0">
                <li class="nav-item pb-2 pt-2 custom-nav @yield('mi_link')"><a class="nav-link js-scroll-trigger" href="{{route('index.inicio')}}">Inicio</a></li>
                <li class="nav-item pb-2 pt-2 @yield('link_n_a') custom-nav"><a class="nav-link js-scroll-trigger" href="{{route('index.noticia')}}">Noticias</a></li>

                <li class="nav-item dropdown pb-2 pt-2 custom-nav @yield('link_a_a')">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Ayuntamiento
                  </a>
                    <div class="dropdown-menu dropdown-menu-right animate slideIn" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item " href="{{route('index.directorio')}}">Directorio</a>
                      <a class="dropdown-item" href="{{route('tesoreria.index')}}">Tesorería</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="{{route('consu.index')}}">Reportes Ciudadanos</a>
                    </div>
                  </li>

                 <li class="nav-item dropdown pb-2 pt-2 custom-nav">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownTransparencia" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Transparencia
                  </a>
                    <div class="dropdown-menu dropdown-menu-right animate slideIn" aria-labelledby="navbarDropdownTransparencia">
                      <a class="dropdown-item" href="https://transparenciachihuahua.org/infomex/" target="_blank">Infomex Chihuahua</a>
                      <a class="dropdown-item" href="https://www.plataformadetransparencia.org.mx/web/guest/inicio" target="_blank">PNT</a>
                      <a class="dropdown-item" href="https://www.ichitaip.org" target="_blank">ICHITAIP</a>
                    </div>
                  </li>
                 
                <li class="nav-item dropdown pb-2 pt-2 custom-nav">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMunicipio" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Municipio
                  </a>
                    <div class="dropdown-menu dropdown-menu-right animate slideIn" aria-labelledby="navbarDropdownMunicipio">
                      <a class="dropdown-item" href="{{Route('turismo.index')}}">Turismo</a>
                      <a class="dropdown-item" href="{{Route('evento.index')}}">Eventos</a>
                      <a class="dropdown-item" href="{{Route('historia.index')}}">Historia</a>
                    </div>
                  </li>
            </ul>
        </div>
    </div>
</nav>