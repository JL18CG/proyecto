@extends('pagina.main-sec')

@section('link_n','active')
@section('link_n_a','activo-l')

@section('content')


<div class="row">

    <!-- Post Content Column -->
    <div class="col-12">

      <!-- Title -->
     <h2 class="mt-4">{{$noticia[0]->titulo}}</h2>

      <!-- Author -->
      <p class="lead">
       <small> Publicado por {{$noticia[0]->autor}}</small>
      </p>
      <!-- Preview Image -->
      <img class="img-fluid rounded" src="{{asset('web/img/noticias/'.$noticia[0]->imagen)}}" alt="">
      <hr>
      <!-- Date/Time -->
        <p class="d-block"><small class="float-right">{{ $publicacion}} </small> <br>
      <hr>
      <hr>
      <p class="text-justify mb-5">  {!! $noticia[0]->descripcion !!} </p>
      <hr>

    </div>

</div>

    
@endsection