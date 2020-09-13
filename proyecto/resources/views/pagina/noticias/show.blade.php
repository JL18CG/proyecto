@extends('pagina.main-sec')

@section('link_n','active')


@section('content')


<div class="row">

    <!-- Post Content Column -->
    <div class="col-lg-8">

      <!-- Title -->
     <h1 class="mt-4">{{$noticia[0]->titulo}}</h1>

      <!-- Author -->
      <p class="lead">
       <small> Publicado por {{$noticia[0]->autor}}</small>
      </p>
      <!-- Preview Image -->
      <img class="img-fluid rounded" src="{{asset('web/img/noticias/'.$noticia[0]->imagen)}}" alt="">
      <hr>
      <!-- Date/Time -->
        <p><small> Publicado el {{ $publicacion}} </small> <br>
      <hr>
      <hr>
      <p class="text-justify">  {!! $noticia[0]->descripcion !!} </p>
      <hr>

    </div>

    <!-- Sidebar Widgets Column -->
    <div class="col-md-4">

    <!-- Search Widget -->
    <div class="card my-4 ">
      <h5 class="card-header">Buscador de Noticias</h5>
      <div class="card-body">
        <div class="input-group">
          <form action="{{ route('index.noticia') }}" class="form-inline">
            <input type="text" name="busqueda" class="form-control" value="{{request('busqueda')}}"  placeholder="Buscar...">
            <span class="input-group-append">
           <button class="btn btn-secondary" type="submit"><i class="fa fa-search"></i></button>
            </span>
          </form>
        </div>
      </div>
    </div>

    <!-- Categories Widget -->
    <div class="card my-4">
    <h5 class="card-header">Categorías</h5>
    <div class="card-body ">
        <div class="row">
        <div class="col">
            <ul class="list-unstyled mb-0 row text-center">
            @foreach ($categorias as $categoria)
            <li class="col-6">
                <a href="{{ route('index.categoria_busqueda', $categoria->url) }}" class="categoria">{{$categoria->nombre}}</a>
            </li>
            @endforeach
            </ul>
        </div>
        </div>
    </div>
    </div>

      <!-- Side Widget -->
      <div class="card my-4">
        <h5 class="card-header">Side Widget</h5>
        <div class="card-body">
          You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
        </div>
      </div>

    </div>

  </div>

    
@endsection