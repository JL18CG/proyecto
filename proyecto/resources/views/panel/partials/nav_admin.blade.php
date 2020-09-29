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