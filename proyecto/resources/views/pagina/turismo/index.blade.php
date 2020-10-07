@extends('pagina.main-sec')
@section('link_n_mu','activo-l')

@section('content')
<div class="container">
  <div class="row">  
    <div class="col-12">
      <h3 class="my-4 text-center">Lugares Interesantes Para Visitar</h3>
      <hr class="divider-sm">
  </div>
</div>
<div class="row">  
@foreach ($sitios as $sitio) 

    <div class="card col-xs-12 col-sm-5 col-md-5 col-lg-5  mx-auto">
        <img class="d-block w-100 mx-auto" style="margin-top:1rem" src="{{asset("web/img/sitios/thumbs/".$sitio->img)}}" alt="">
        <div class="card-body " style="min-height:210px">
          <p class="font-weight-bold">Lugar:</p>
          <p>{{$sitio->nombre_lugar}}</p>
          <p class="font-weight-bold">Descripcion:</p>
          <p class="card-text">{{$sitio->descripcion}}</p>
        </div>
        <ul class="card-body list-group list-group-flush">
          <li class="list-group-item">{{$sitio->tipo_lugar}}</li>
        </ul>
        <div class="card-footer">
          <p class="font-weight-bold"> Direccion:</p>
          <p>{{$sitio->direccion}}</p>
          <a href="{{$sitio->ubicacion}}" target="_blank" class="btn btn-primary col-12"><i class="fas fa-route"></i> Ver en Maps</a>
        </div>
      </div>
  
@endforeach
</div>
</div>
 {{ $sitios->links() }}
@endsection