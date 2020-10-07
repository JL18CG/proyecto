@extends('pagina.main-sec')


@section('content')
<div class="container">
  <div class="row">  
<h3 style="margin-top:1rem;">Sitios Interesantes para Visitar</h3>
</div>
@foreach ($eventos as $evento) 
  
<div class="row">  
    <div class="card col-12" style="width: 18rem; margin-bottom:1rem; margin-top:1rem;">
        <img class="d-block w-100" src="{{asset("web/img/evts/thumbs/".$evento->img)}}" alt="">
        <div class="card-body">
          <h5 class="card-title">{{$evento->titulo}}</h5>
          <p class="card-text">{{$evento->desc}}</p>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">Fecha: {{date('d-m-Y', strtotime($evento->fecha))}}</li>
          <li class="list-group-item">Hora: {{ date('G:i', strtotime($evento->tiempo))}}</li> 
          <p class="col-6"> Lugar: {{$evento->lugar}}</p>
        </ul>
      </div>
    </div>
@endforeach
</div> 
{{ $eventos->links() }}
@endsection