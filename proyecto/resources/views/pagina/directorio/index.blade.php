@extends('pagina.main-sec')

@section('link_a','active')
@section('link_a_a','activo-l')
@section('link_directorios','active')

@section('content')

<div class="row">
    <div class="col-12 mb-5">
        <h3 class="my-4 text-center">Directorio</h3>
        <hr class="divider-sm">
        @if (!$presidente->isEmpty())
        <div class="col-12">
            <div class="card bg-light mx-auto mb-5 mt-5 card-directorios" >
                <img class="card-img-top" src="{{ asset('web/img/directorio/'.$presidente[0]->img)}}" alt="Card image cap">
                <div class="card-header card-header-directorio text-center card-pres">{{$presidente[0]->cargo}}</div>
                <div class="card-body">
                  <h5 class="card-title text-center dir-nombre">{{$presidente[0]->nombre_completo}}</h5>
                  <p class="card-text text-center"> <small>{{$presidente[0]->tel_contacto}}</small> @if ($presidente[0]->ext != null)  <small>ext {{$presidente[0]->ext}}</small> @endif</p>
                </div>
            </div>
        </div>
        <hr class="divider-sm">
        @endif
    </div>
   
</div>

<div class="row mb-5">
    @foreach ($directorios as $directorio)
    <div class="card bg-light mx-auto mb-5 mt-5 card-directorios">
        <img class="card-img-top" src="{{ asset('web/img/directorio/'.$directorio->img)}}" alt="Card image cap">
        <div class="card-header card-header-directorio text-center card-pres ">{{$directorio->cargo}}</div>
        <div class="card-body card-body-directorio">
          <h5 class="card-title text-center dir-nombre">{{$directorio->nombre_completo}}</h5>
          <p class="card-text text-center"> <small>{{$directorio->tel_contacto}}</small> @if ($directorio->ext != null)  <small>ext {{$directorio->ext}}</small> @endif</p>
        </div>
    </div>
    @endforeach
    
</div>
    

   
@endsection