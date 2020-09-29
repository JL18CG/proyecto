@extends('pagina.main-sec')

@section('link_n','active')
@section('link_n_a','activo-l')

@section('content')


<div class="row">
    <!-- Post Content Column -->
    <div class="col-12">
      <!-- Title -->
     <h3 class="mt-4 text-justify pl-2 pr-2 text-noticia-show">{{$noticia[0]->titulo}}</h3>
     <hr class="divider-sm">
      <!-- Preview Image -->
      <img class="img-fluid rounded mx-auto d-block" src="{{asset('web/img/noticias/'.$noticia[0]->imagen)}}" alt="">
      <!-- Author -->
      <p class="lead-autor d-block mt-3  pr-2 text-right">Noticia publicada por {{$noticia[0]->autor}}</p>
      <hr class="show-n">
      <p class="text-justify">  {!! $noticia[0]->descripcion !!} </p>
      <hr class="show-n">
      <p class="d-block"><small class="float-right"> <i class="fa fa-clock"></i> Publicado {{ $date->diffForHumans() }} </small> <br> </p>

    </div>

</div>

    
@endsection