@extends('pagina.main-sec')


@section('link_a_a','activo-l')

@section('content')

<div class="row">
    <div class="col-12">
        <h3 class="my-4">Tesorería</h3>
        <hr>
    </div>
   
    <div class="col-3 text-center">
        <a type="button" class="btn btn-outline-warning">SEVAC</a>
    </div>
    <div class="col-3 text-center">
        <a type="button" class="btn btn-outline-warning">Reportes Mensuales</a>
    </div>
    <div class="col-3 text-center">
        <a type="button" class="btn btn-outline-warning">Reportes Trimestrales</a>
    </div>
    <div class="col-3 text-center">
        <a type="button" class="btn btn-outline-warning">Reportes Anuales</a>
    </div>
</div>
   
@endsection