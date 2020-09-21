@extends('pagina.main-sec')

@section('link_n','active')
@section('link_n_a','activo-l')

@section('content')

<div class="row">

    <!-- Blog Entries Column -->
    <div class="col-md-8">

      <h3 class="my-4">Sección de Noticias</h3>
      <hr>
      @foreach ($noticias as $noticia)
                <!-- Blog Post -->
          <div class="card mb-4">
            <img class="card-img-top" src="{{asset('web/img/noticias/thumbs/'.$noticia->imagen)}}" alt="Card image cap">
              <div class="card-body">
                <h2 class="card-title">{{$noticia->titulo}}</h2>
                  <p class="card-text">{!!Str::limit($noticia->descripcion, 150)!!}</p>
                <a href="{{route('show.noticia', $noticia->url)}}" class="btn btn-primary">Leer Nota Completa <i class="fa fa-arrow-right ml-2"></i></a>
              </div>
              <div class="card-footer text-muted">
                @php                  
                  $fecha= date("d-m-Y", strtotime($noticia->created_at));$dia = strftime("%A", strtotime($fecha));                            
                  $dia_numero =strftime("%d", strtotime($fecha));$mes =strftime("%B", strtotime($fecha));$anio=strftime("%Y", strtotime($fecha));$publicacion = (ucfirst(trans($dia)).' '.$dia_numero.' de '.ucfirst(trans($mes)).' de '.$anio);
                @endphp              
                  <p><small> Publicado el {{ $publicacion}} </small> 
                    <br>
                    <hr>
                    <div class="row">
                      <span class="col-12">Categorías</span>
 

                      @foreach ($noticia->categorias as $item)
                      <a href="{{ route('index.categoria_busqueda', $item->url) }}" class="btn btn-success m-2">{{$item->nombre}}</a>
                      @endforeach 
                    
                    </div>
                    
                  </p>
              </div>
          </div>
      @endforeach



      <!-- Pagination -->
      {{ $noticias->appends( ['busqueda'=> request('busqueda')])->links() }}

    </div>

    <!-- Sidebar Widgets Column -->
    <div class="col-md-4">

      <!-- Search Widget -->
      <div class="card my-4">
        <h5 class="card-header">Buscador de Noticias</h5>
        <div class="card-body">

            <form action="{{ route('index.noticia') }}" class="form-inline">
              <div class="input-group col-12">
                <input type="text" name="busqueda" class="form-control " value="{{request('busqueda')}}" placeholder="Buscar...">
                <span class="input-group-append">
                <button class="btn btn-secondary" type="submit"><i class="fa fa-search"></i></button>
                </span>
              </div>
            </form>
 
        </div>
      </div>

      <!-- Categories Widget -->
      <div class="card my-4">
        <h5 class="card-header">Categorías</h5>
        <div class="card-body">
          <div class="row">
            <div class="col">
              <ul class="list-unstyled mb-0 row text-center">
                @foreach ($categorias as $categoria)
                <li class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                  <a href="{{ route('index.categoria_busqueda', $categoria->url) }}" class="categoria">{{$categoria->nombre}}</a>
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