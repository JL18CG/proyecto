@extends('pagina.main-sec')

@section('link_a','active')
@section('link_a_a','activo-l')
@section('link_directorios','active')

@section('content')

<div class="col">
    <div class="col-12 mb-5">
        <h3 class="my-4">Directorio</h3>
        <hr>
        @if (!$presidente->isEmpty())
        <div class="col-12">
            <div class="card bg-light mx-auto mb-5 mt-5 card-directorios" >
                <img class="card-img-top" src="{{ asset('web/img/directorio/'.$presidente[0]->img)}}" alt="Card image cap">
                <div class="card-header text-center card-pres">{{$presidente[0]->cargo}}</div>
                <div class="card-body">
                  <h5 class="card-title text-center dir-nombre">{{$presidente[0]->nombre_completo}}</h5>
                  {{-- <p class="card-text text-center">{{$presidente[0]->tel_contacto}} @if ($presidente[0]->ext != null) ext {{$presidente[0]->ext}} @endif </p> --}}
                </div>
            </div>
        </div>
        <hr>
        @endif
    </div>
    <div class="row mb-5">
        @foreach ($directorios as $directorio)
        <div class="card bg-light mx-auto mb-5 mt-5 card-directorios">
            <img class="card-img-top" src="{{ asset('web/img/directorio/'.$directorio->img)}}" alt="Card image cap">
            <div class="card-header text-center card-pres ">{{$directorio->cargo}}</div>
            <div class="card-body">
              <h5 class="card-title text-center dir-nombre">{{$directorio->nombre_completo}}</h5>
              {{-- <p class="card-text text-center">{{$directorio->tel_contacto}} @if ($directorio->ext != null) ext {{$directorio->ext}}  @endif</p> --}}
            </div>
        </div>
        @endforeach
    </div>
</div>


    

   
@endsection