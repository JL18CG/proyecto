@extends('pagina.main-sec')
@section('link_n_mu','activo-l')

@section('content')

<div class="row">  
    <div class="col-12">
      <h3 class="my-4 text-center">Lugares Interesantes Para Visitar</h3>
      <hr class="divider-sm">
    </div>


  <div class="col-12 p-5">  
    @foreach ($sitios as $key => $sitio) 

        <div class="row card mb-5">
            <div class="col mt-2 mb-2 d-sm-flex  flex-xs-column flex-sm-column align-items-center flex-sm-row flex-lg-row ">
              <div class="{{($key%2==0) ? 'order-lg-1 ' : 'order-lg-2 '}} col-xs-12 col-sm-12 col-md-12 col-lg-6">
            
                  <img class="w-100 " src="{{asset("web/img/sitios/thumbs/".$sitio->img)}}" alt="">
         
              </div>
              
              <div class="{{($key%2==0) ? 'order-lg-2' : 'order-lg-1'}} col-xs-12 col-sm-12 col-md-12 col-lg-6">
                  <div class="card-body">
                      <p class="text-center font-weight-bold">{{$sitio->nombre_lugar}}</p>
                      <p class="card-text text-center">{{$sitio->descripcion}}</p>
                      <hr>
                      <small class="d-block text-center">{{$sitio->tipo_lugar}}</small>
                  </div>
                  <div class="text-center">
                      <p><a href="{{$sitio->ubicacion}}" target="_blank" class="btn btn-light ">{{$sitio->direccion}} <i class="fas fa-map-marker-alt ml-2"></i></a> </p>
                      
                  </div>
              </div>
            </div>
        </div>
      
    @endforeach
  </div>
{{ $sitios->links() }}


</div>



@endsection