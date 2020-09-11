@extends('panel.main')
@section('titulo') Reportes @endsection

@section('content')
<div class="pt-1 pb-5">
    <h3 class="h2 d-block pt-2">Panel de Reportes</h3>
    <hr>
    <p>Agrega los reportes para que se publiquen en la página principal.</p>
    <div class="mt-3">
        <a href="{{ route("reportes.create") }}" type="button" class="btn btn-success mt-2 mb-2">Agregar <i class="fa fa-plus"></i> </a>
        <form action="{{ route('reportes.index') }}" class="form-inline float-right mt-2">
   
                <select name="created_at" class="form-control mr-3">
                    <option value="DESC">Descenente</option>
                    <option  {{ request('created_at') == "ASC" ? "selected": "" }} value="ASC">Ascendente</option>
            </select>
            <input type="text" value="{{request('busqueda')}}" name="busqueda" placeholder="Buscar" class="form-control mr-3">

            <button type="submit" class="btn btn-success"><i class="fa fa-search"></i></button>
     
            
        </form>
        <div class=" table-responsive ">
            <table class="table table-hover">
                <caption>Lista de Noticias Publicadas</caption>
                <thead>
                <tr class="fondo">
                    <th scope="col " style="min-width:550px !important;">Nombre del Archivo</th>
                    <th scope="col" class="text-center">Tipo</th>
                    <th scope="col" class="text-center">Publicación</th>
                    <th scope="col"><div class="text-center tabla-w"><span>Acciones</span></div></th>
                </tr>
                </thead>
                <tbody>
    
                @foreach ($reportes as $reporte)
                <tr>
                        <td class="pt-3 text-size" >{{ Str::limit($reporte->titulo, 100) }}   </td>
                        <td class="text-center pt-3 text-size">{{   date('d-m-Y H:i:s', strtotime($reporte->created_at)) }}</td>
                        <td class="text-center"> 
                            
                            <a class="btn btn-outline-warning ml-2 mr-2 edit-item" href="{{route('noticias.edit',$reporte->id)}}"><i class="fa fa-pen"></i></a>
                            <button class="btn btn-outline-danger target-modal ml-2 mr-2" data-toggle="modal" data-target="#deleteModalNoticia" data-nombre="{{ $reporte->titulo }}" data-id="{{ $reporte->id }}"><i class="fa fa-trash"></i></button>
                        </td>
                
                </tr>
                @endforeach
    
                </tbody>
            </table>

            {{ $reportes->appends(
                [
                    'created_at'=> request('created_at'),
                    'busqueda'=> request('busqueda')
                ]
                )->links() }}
        </div>
    </div>

</div>
   
@endsection