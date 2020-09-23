@extends('pagina.tesoreria.index')
@section('link_t', 'btn-info')


@section('contenedor')
   <div class="col-12">
    <hr>
   </div>
   <div class="col-12 mt-2 mb-3">
    <form action="{{ route('trimestral.index') }}" class="form-inline">
        <div class="input-group col-12">
          <input type="text" name="busqueda" class="form-control " value="{{request('busqueda')}}" placeholder="Buscar...">
          <span class="input-group-append">
          <button class="btn btn-secondary" type="submit"><i class="fa fa-search"></i></button>
          </span>
        </div>
      </form>
   </div>
   @foreach ($reportes as $reporte)
       <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 mb-2">
           <a href="{{ route('reporte.dowload', $reporte->archivo) }}" class="d-block btn btn-info pt-3 pb-3 text-left">{{$reporte->titulo}} <i class="fa fa-download float-right mt-1"></i></a>
       </div>
   @endforeach

   <div class="col-12 mt-4">
    {{ $reportes->appends( ['busqueda'=> request('busqueda')])->links() }}
   </div>


@endsection