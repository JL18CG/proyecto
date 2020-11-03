@extends('panel.main')
@section('titulo') Turismo @endsection
@section('content')

<div class="pt-1 pb-5">
    <h3 class="h2 d-block pt-2">Panel de Turismo</h3>
    <hr>    
    <p>Agrega los lugares atractivos para visitar.</p>

    <ul class="nav nav-tabs mt-4" id="myTab" role="tablist">
        {{-- <li class="nav-item ">
        <a class="nav-link {{ (session('active')) ? '' : 'active' }}" id="home-tab" data-toggle="tab" href="#p-noticia" role="tab" aria-controls="p-noticia" aria-selected="true">Registro de Eventos</a>
        </li> --}}
        <li class="nav-item ">
        <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#p-lugares" role="tab" aria-controls="p-lugares" aria-selected="false">Registro de Lugares</a>
        </li>
    </ul>

    <div class="tab-content" id="myTabContent">
        {{-- <div class="tab-pane fade {{ (session('active')) ? '' : 'active show ' }} " id="p-noticia" role="tabpanel" aria-labelledby="home-tab">

            <div class="mt-3">
                <a href="{{route('eventos.create')}}" type="button" class="btn btn-success mt-2 mb-2">Agregar <i class="fa fa-plus"></i> </a>
                
                <div class=" table-responsive ">
                    <table class="table table-hover">
                        <caption>Listas de Eventos y Sitios Publicados</caption>
                        <thead>
                        <tr class="fondo">
                            <th scope="col " style="min-width:550px !important;">Título del Evento</th>
                            <th scope="col " class="text-center">Fecha y Hora</th>
                            <th scope="col " class="text-center">Publicado</th>
                            <th scope="col "><div class="text-center tabla-w"><span>Acciones</span></div></th>
                        </tr>
                        </thead>
                        <tbody>
                            
                            @foreach ($eventos as $evento)
                            <tr>
                                    <td class="pt-3 text-size">{{ $evento->titulo }}   </td>
                                    <td class="pt-3 text-size text-center">{{ $evento->created_at }}  </td>
                                    <td class="pt-3 text-size text-center ">{{ $evento->fecha }}   </td>
                                    <td class="pt-3 text-size">
                                        <a class="btn btn-outline-warning ml-2 mr-2 edit-item" href="{{route('eventos.edit',$evento->id)}}"><i class="fa fa-pen"></i></a>
                                        <button class="btn btn-outline-danger target-modal ml-2 mr-2" data-toggle="modal" data-target="#deleteEvento" data-nombre="{{ $evento->titulo }}" data-id="{{ $evento->id }}"><i class="fa fa-trash"></i></button>
                                    </td>
                                    
                            
                            </tr>
                            @endforeach
                       

            
                        </tbody>
                    </table>
                </div>
            </div>
            

        </div> --}}

        <div class="tab-pane fade active show " id="p-lugares" role="tabpanel" aria-labelledby="profile-tab">

            <div class="mt-3">
                <a href="{{route('sitios.create')}}" type="button" class="btn btn-success mt-2 mb-2">Agregar <i class="fa fa-plus"></i> </a>
                <div class="col-12 m-table">
                    <div class="table-responsive">
                        <table class="table table-hover ">
                            <caption>Lista de Categorías Registradas</caption>
                            <thead>
                            <tr class="fondo">
                                <th scope="col" style="min-width:550px !important;"">Nombre del Lugar</th>
                                <th scope="col"  class="text-center">Tipo del lugar</th>
                                <th scope="col"><div class="text-center tabla-w"><span>Acciones</span></div></th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($sitios as $sitio)
                                <tr>
                                        <td class="pt-3 text-size">{{ $sitio->nombre_lugar }}   </td>
                                        <td class="pt-3 text-size text-center">{{ $sitio->tipo_lugar }}   </td>
                                        <td class="pt-3 text-size text-center">
                                            <a class="btn btn-outline-warning ml-2 mr-2 edit-item" href="{{route('sitios.edit',$sitio->id)}}"><i class="fa fa-pen"></i></a>
                                            <button class="btn btn-outline-danger target-modal ml-2 mr-2" data-toggle="modal" data-target="#deleteModalLugar" data-nombre="{{ $sitio->nombre_lugar }}" data-id="{{ $sitio->id }}"><i class="fa fa-trash"></i></button>
                                        </td>
                                        
                                
                                </tr>
                                @endforeach
                          
                
                            </tbody>
                        </table>
                    </div>
                </div>
                
            </div>
            
            
            

        </div>

    </div>

</div>
@endsection



@section('modals')
<div class="modal fade mt-5"  id="deleteModalLugar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

                <form id="formDelete" method="POST" action="{{route('sitios.destroy',0)}}"
                    data-action="{{route('sitios.destroy',0)}}">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-outline-danger">Borrar</button>
                </form>


            </div>
        </div>
    </div>
</div>
<div class="modal fade mt-5"  id="deleteEvento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

                <form id="formDelete-evt" method="POST" action="{{route('eventos.destroy',0)}}"
                    data-action="{{route('eventos.destroy',0)}}">
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

        $('#deleteEvento').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var nombre = button.data('nombre') 
        var id = button.data('id') 
        action = $('#formDelete-evt').attr('data-action').slice(0,-1);
        action += id
        console.log(action)
        $('#formDelete-evt').attr('action',action);

        var modal = $(this);
        modal.find('.modal-body >p> small >strong').text("( "+nombre+" )");
        });
        
    
    $('#deleteModalLugar').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var nombre = button.data('nombre') 
        var id = button.data('id') 
        action = $('#formDelete').attr('data-action').slice(0,-1);
        action += id
        console.log(action)
        $('#formDelete').attr('action',action);

        var modal = $(this);
        modal.find('.modal-body >p> small >strong').text("( "+nombre+" )");
        });
    }
</script>



@endsection