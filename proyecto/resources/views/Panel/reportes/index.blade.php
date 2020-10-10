@extends('panel.main')
@section('titulo') Reportes @endsection

@section('content')
<div class="pt-1 pb-5">
    <h3 class="h2 d-block pt-2">Panel de Reportes</h3>
    <hr>
    <p>Agrega los reportes para que se publiquen en la página principal.</p>
    <div class="mt-3">
        <a href="{{ route("reportes.create") }}" type="button" class="btn btn-success mt-2 mb-2">Agregar <i class="fa fa-plus"></i> </a>
        <form action="{{ route('reportes.index') }}" class="">
            
            <div class="row col-12 mb-3">
                <div class="col-md-3 col-xs-12 mt-2">
                    <select name="created_at" class="form-control mr-1">
                        <option value="DESC">Descenente</option>
                        <option  {{ request('created_at') == "ASC" ? "selected": "" }} value="ASC">Ascendente</option>
                    </select>
                </div>

                <div class="input-group col-md-9 col-xs-12 mt-2">
                    <input type="text" value="{{request('busqueda')}}" style="min-width: 250px" name="busqueda" placeholder="Buscar" class="form-control">
                    <span class="input-group-append">
                    <button class="btn btn-success text-white" type="submit"><i class="fa fa-search"></i></button>
                    </span>
                </div>
    
            </div>
            

     
            
        </form>
        <div class=" table-responsive ">
            <table class="table table-hover">
                <caption>Lista de Noticias Publicadas</caption>
                <thead>
                <tr class="fondo">
                    <th scope="col " style="min-width:400px !important;">Nombre del Archivo</th>
                    <th scope="col" class="text-center">Tipo</th>
                    <th scope="col" class="text-center">Clasificación</th>
                    <th scope="col" class="text-center">Publicación</th>
                    <th scope="col"><div class="text-center tabla-w"><span>Acciones</span></div></th>
                </tr>
                </thead>
                <tbody>
    
                @foreach ($reportes as $reporte)
                <tr>
                        <td class="pt-3 text-size" >{{ $reporte->titulo }}</td>
                        <td class="pt-3 text-size text-center" >{{ $reporte->tipo }}</td>
                        <td class="pt-3 text-size text-center" >{{ $reporte->clas_reporte }}</td>
                        <td class="text-center pt-3 text-size">{{   date('d-m-Y H:i:s', strtotime($reporte->created_at)) }}</td>
                        <td class="text-center"> 
                            
                            <a class="btn btn-outline-success ml-2 mr-2 " href="{{route('pdf.dowload',$reporte->archivo)}}"><i class="fa fa-download"></i></a>
                            <a class="btn btn-outline-warning ml-2 mr-2 edit-item" href="{{route('reportes.edit',$reporte->id)}}"><i class="fa fa-pen"></i></a>
                            <button class="btn btn-outline-danger target-modal ml-2 mr-2" data-toggle="modal" data-target="#deleteModalReporte" data-nombre="{{ $reporte->titulo }}" data-id="{{ $reporte->id }}"><i class="fa fa-trash"></i></button>
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



@section('modals')
<div class="modal fade mt-5"  id="deleteModalReporte" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog mt-5 "  role="document">
        <div class="modal-content  mt-5" >
            <div class="modal-header" >
                <h5 class="modal-title " id="modalLabel"><i class="fa fa-exclamation-triangle text-danger mr-2"></i> Advertencia</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body  mt-3">
                <p class="w-100 text-justify">Esta acción borrará el registro y todos los archivos relacionados con el mismo, de forma permanente
                <br>
                <small><strong></strong></small></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>

                <form id="formDeleteReporte" method="POST" action="{{ route('reportes.destroy',0) }}"
                    data-action="{{ route('reportes.destroy',0) }}">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-outline-danger">Borrar</button>
                </form>


            </div>
        </div>
    </div>
</div>



@endsection



@section('scripts')
<script>
window.onload = function (){

        $('#deleteModalReporte').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var nombre = button.data('nombre') 
        var id = button.data('id') 
        action = $('#formDeleteReporte').attr('data-action').slice(0,-1);
        action += id
        console.log(action)
        $('#formDeleteReporte').attr('action',action);

        var modal = $(this);
        modal.find('.modal-body >p> small >strong').text("( "+nombre+" )");
        });

        
    }
</script>

@endsection
