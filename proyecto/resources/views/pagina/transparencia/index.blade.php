@extends('pagina.main-sec')

@section('link_t','active')
@section('link_t_a','activo-l')

@section('content')

<div class="row">
    <div class="col-12 mb-5">
        <h3 class="my-4">Plataformas de Transparencia</h3>
        <hr>
    </div>
    <div class="col-md-6  col-sm-12 pt-2">
        <a href="https://transparenciachihuahua.org/infomex/" target="_blank" class="text-center d-block mt-5"><img src="{{ asset("web/img/transparencia/log-01.png") }}"  height="170px" alt=""></a>
    </div>
    <div class="col-md-6 col-sm-12 pt-2">
        <a href="https://www.plataformadetransparencia.org.mx/web/guest/inicio" target="_blank" class="text-center d-block mt-5"><img src="{{ asset("web/img/transparencia/log-02.png") }}"  height="170px" alt=""></a>
    </div>
</div>
    
@endsection