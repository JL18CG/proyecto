@extends('pagina.main-sec')

@section('link_n','active')
@section('link_n_a','activo-l')

@section('content')

<div class="row">
<div class="col-12">
  <h3 class="my-4 d-block text-center">Noticias</h3>
  <hr class="divider-sm">
</div>
    <!-- Search Widget -->
    <div class="col-12 mb-4">
          <form action="{{ route('index.noticia') }}" class="form-inline">
            <div class="input-group col-12">
              <input type="text" name="busqueda" class="form-control " value="{{request('busqueda')}}" placeholder="¿Quieres Buscar Alguna Noticia en Particular? Solo Escríbelo Aquí">
              <span class="input-group-append">
              <button class="btn btn-info text-white" type="submit"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
    </div>


    <!-- Blog Entries Column -->
    <div class="col-md-12 col-lg-9">
      <div class="p-2">
        <div class="card-columns ">
      @foreach ($noticias as $noticia)
          <div class="card text-justify">
            <img  src="{{asset('web/img/noticias/thumbs/'.$noticia->imagen)}}" class="card-img-top" alt="img">
            <div class="card-body">
              <h2 class="card-title card-title-h2"><a href="{{route('show.noticia', $noticia->url)}}">{{$noticia->titulo}}</a></h2>
              <p class="card-text">{!!Str::limit($noticia->descripcion, 150)!!}</p>
              <div class="row pl-3 pr-3">
                @foreach ($noticia->categorias as $item)
                <a href="{{ route('index.categoria_busqueda', $item->url) }}" class="badge color-tags p-2 m-1">{{$item->nombre}}</a>
                @endforeach 
              </div>
              <p class="card-text"><small class="text-muted ml-2"><i class="fa fa-clock"></i> {{$noticia->created_at->diffForHumans() }}</small></p>
            </div>
          </div>
      @endforeach
    </div>
  </div>
      <!-- Pagination -->
      {{ $noticias->appends( ['busqueda'=> request('busqueda')])->links() }}

    </div>

    <!-- Sidebar Widgets Column -->
    <div class="col-md-12 col-lg-3">
      <!-- Categories Widget -->
      <div class="card  mt-1">
        <h5 class="card-header-noticia text-center">Categorías</h5>
        <div class="card-body">
          <div class="row">
            <div class="col-lg-12 col ">
              <ul class="list-unstyled mb-0 row text-center">
                @foreach ($categorias as $categoria)
                <li class="mx-auto p-2">
                  <a href="{{ route('index.categoria_busqueda', $categoria->url) }}" class="categoria"> {{$categoria->nombre}}</a>
                </li>
                @endforeach
              </ul>
            </div>
            
          </div>
        </div>
      </div>
      
    </div>

  </div>
  <!-- /.row -->

    
@endsection