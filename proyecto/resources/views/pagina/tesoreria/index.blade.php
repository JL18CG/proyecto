@extends('pagina.main-sec')


@section('link_a_a','activo-l')

@section('link', 'btn-outline-info')
@section('link_m', 'btn-outline-info')
@section('link_t', 'btn-outline-info')
@section('link_a', 'btn-outline-info')

@section('content')

<div class="row">
    <div class="col-12">
        <h3 class="my-4">Tesorería</h3>
        <hr class="divider-sm">
    </div>

    <div class="col-xs-12 col-sm-6  col-md-6 col-lg-3 text-center">
        <a type="button" href="{{ route('sevac.index') }}" class="btn @yield('link') p-3 d-block mt-2">SEVAC</a>
    </div>
    <div class="col-xs-12 col-sm-6  col-md-6 col-lg-3 text-center">
        <a type="button" href="{{ route('mensual.index') }}" class="btn @yield('link_m') p-3 d-block mt-2">Reportes Mensuales</a>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 text-center">
        <a type="button" href="{{ route('trimestral.index') }}" class="btn @yield('link_t') p-3 d-block mt-2">Reportes Trimestrales</a>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 text-center">
        <a type="button" href="{{ route('anual.index') }}" class="btn @yield('link_a') p-3 d-block mt-2">Reportes Anuales</a>
    </div>

    @yield('contenedor')
    
    <div class="col-12 mt-1 mb-1 text-center">
        <p class="d-block">Busca <i class="fa fa-search text-info"></i> y descarga los archivos en formato PDF <i class="fa fa-file-pdf text-info"></i></p>    
    </div>

 
</div>
   
@endsection