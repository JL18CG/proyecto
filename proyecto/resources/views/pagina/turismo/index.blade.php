@extends('pagina.main-sec')


@section('content')
<div class="container">
  <div class="row">  
<h3 style="margin-top:1rem;">Sitios Interesantes para Visitar</h3>
</div>
@foreach ($sitios as $sitio) 
 <div class="row">  
    <div class="card col-12" style="width: 18rem; margin-bottom:1rem; margin-top:1rem;">
        <img class="d-block w-100" src="{{asset("web/img/sitios/thumbs/".$sitio->img)}}" alt="">
        <div class="card-body">
          <h5 class="card-title">{{$sitio->nombre_lugar}}</h5>
          <p class="card-text">{{$sitio->descripcion}}</p>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">{{$sitio->tipo_lugar}}</li>
        </ul>
        <div class="card-body">
          <p class="col-6"> Direccion: <br> {{$sitio->direccion}}</p>
          <a href="{{$sitio->ubicacion}}" target="_blank" class="btn btn-primary col-12">Ver en Maps</a>
        </div>
      </div>
    </div>
@endforeach
</div>
 {{ $sitios->links() }}
@endsection