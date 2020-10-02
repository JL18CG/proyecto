@extends('pagina.main-sec')

@section('link_n','active')
@section('link_n_a','activo-l')

@section('content')

@section('fb-comentarios')
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v8.0&appId=834076760667509&autoLogAppEvents=1" nonce="til3jUZC"></script>
@endsection

<div class="row">
    <!-- Post Content Column -->
    <div class="col-12">
      <!-- Title -->
     <h3 class="mt-4 h7 text-justify pl-2 pr-2 text-noticia-show">{{$noticia[0]->titulo}}</h3>
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


@section('comentarios-area')
    <div class="fb-comments col-12 mt-5" data-href="{{Request::url()}}" data-numposts="5" data-width="100%"></div>
@endsection