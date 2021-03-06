@extends('panel.main')
@section('titulo') Noticias @endsection
@section('content')

<div class="pt-1 pb-5">
    <h3 class="h2 d-block pt-2">Panel de Noticias</h3>
    <hr>
    <p>Agrega las noticias para que se publique en la página principal.</p>

    <ul class="nav nav-tabs mt-4" id="myTab" role="tablist">
        <li class="nav-item ">
        <a class="nav-link {{ (session('active')) ? '' : 'active' }}" id="home-tab" data-toggle="tab" href="#p-noticia" role="tab" aria-controls="p-noticia" aria-selected="true">Registro de Noticias</a>
        </li>
        <li class="nav-item ">
        <a class="nav-link {{ (session('active')) ? 'active' : '' }}" id="profile-tab" data-toggle="tab" href="#p-categorias" role="tab" aria-controls="p-categorias" aria-selected="false">Registro de Categorías</a>
        </li>
    </ul>

    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade {{ (session('active')) ? '' : 'active show ' }} " id="p-noticia" role="tabpanel" aria-labelledby="home-tab">

            <div class="mt-3">
                <a href="{{ route("noticias.create") }}" type="button" class="btn btn-success mt-2 mb-2">Agregar <i class="fa fa-plus"></i> </a>

                <form action="{{ route('noticias.index') }}" class="">
            
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
                            <th scope="col " style="min-width:550px !important;">Título de la Noticia</th>
                            <th scope="col" class="text-center">Publicación</th>
                            <th scope="col"><div class="text-center tabla-w"><span>Acciones</span></div></th>
                        </tr>
                        </thead>
                        <tbody>
            
                        @foreach ($noticias as $noticia)
                        <tr>
                                <td class="pt-3 text-size" >{{ Str::limit($noticia->titulo, 100) }}   </td>
                                <td class="text-center pt-3 text-size">{{   date('d-m-Y H:i:s', strtotime($noticia->created_at)) }}</td>
                                <td class="text-center"> 
                                    
                                    <a class="btn btn-outline-warning ml-2 mr-2 edit-item" href="{{route('noticias.edit',$noticia->id)}}"><i class="fa fa-pen"></i></a>
                                    <button class="btn btn-outline-danger target-modal ml-2 mr-2" data-toggle="modal" data-target="#deleteModalNoticia" data-nombre="{{ $noticia->titulo }}" data-id="{{ $noticia->id }}"><i class="fa fa-trash"></i></button>
                                </td>
                        
                        </tr>
                        @endforeach
            
                        </tbody>
                    </table>

                    {{ $noticias->appends(
                        [
                            'created_at'=> request('created_at'),
                            'busqueda'=> request('busqueda')
                        ]
                        )->links() }}
                </div>
            </div>
            

        </div>

        <div class="tab-pane fade {{ (session('active')) ? 'active show ' : '' }} " id="p-categorias" role="tabpanel" aria-labelledby="profile-tab">

            <div class="mt-3 mb-3">
                <button type="button" data-toggle="modal" data-target="#agregarModalCategoria" class="btn btn-success mt-2 mb-2">Agregar <i class="fa fa-plus"></i> </button>
                
                <div class="col-xs-12 col-md-8 col-lg-8 m-table">
                    <div class="table-responsive">
                        <table class="table table-hover ">
                            <caption>Lista de Categorías Registradas</caption>
                            <thead>
                            <tr class="fondo">
                                <th scope="col">Nombre de la Categoría</th>
                                <th scope="col"><div class="text-center tabla-w"><span>Acciones</span></div></th>
                            </tr>
                            </thead>
                            <tbody>
                
                            @foreach ($categorias as $nombre => $id)
                            <tr>
                                    <td class="pt-3">{{$nombre}}</td>
                                    <td class="text-center"> 
                                        <button class="btn btn-outline-warning" data-toggle="modal" data-target="#updateModalCategoria" data-nombre="{{ $nombre }}" data-id="{{ $id }}"><i class="fa fa-pencil-alt"></i></button>
                                        <button class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteModalCategoria" data-nombre="{{ $nombre }}" data-id="{{ $id }}"><i class="fa fa-trash"></i></button>
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
<div class="modal fade mt-5"  id="deleteModalNoticia" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

                <form id="formDelete" method="POST" action="{{ route('noticias.destroy',0) }}"
                    data-action="{{ route('noticias.destroy',0) }}">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-outline-danger">Borrar</button>
                </form>


            </div>
        </div>
    </div>
</div>


<div class="modal fade mt-5" id="agregarModalCategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog mt-5" role="document">
        <div class="modal-content mt-5">
            <div class="modal-header">
                <h5 class="modal-title " id="modalLabel"><i class="fa fa-pencil-alt text-success mr-2"></i> Agregar Categoría</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formAgregar" method="POST" action="{{ route('categoria.post') }}">
                    @csrf  
                    <div class="form-group">
                        <input class="form-control" type="text" name="nombre" id="cont-categoria" value="{{ old('nombre') }}" maxlength="50" placeholder="Nombre de la Nueva Categoría">
                    </div>

                    <input type="submit" id="btn-cat">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="button" id="categoria" class="btn btn-success" >Agregar</button>
            </div>
        </div>
    </div>
</div>






<div class="modal fade mt-5"  id="deleteModalCategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog mt-5 "  role="document">
        <div class="modal-content  mt-5" >
            <div class="modal-header" >
                <h5 class="modal-title " id="modalLabel"><i class="fa fa-exclamation-triangle text-danger mr-2"></i> Advertencia <strong>NO SE RECOMIENDA BORRAR</strong></h5>
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

                <form id="formDeleteCategoria" method="POST" action="{{ route('categoria.delete',0) }}"
                    data-action="{{ route('categoria.delete',0) }}">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-outline-danger">Borrar</button>
                </form>


            </div>
        </div>
    </div>
</div>


<div class="modal fade mt-5" id="updateModalCategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog mt-5" role="document">
        <div class="modal-content mt-5">
            <div class="modal-header">
                <h5 class="modal-title " id="modalLabel"><i class="fa fa-pencil-alt text-warning mr-2"></i> Actualizar Categoría</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formUpdateCategoria" method="POST" action="{{ route('categoria.update',0) }}"
                    data-action="{{ route('categoria.update',0) }}">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <input class="form-control" id="update-categoria" type="text" name="nombre" maxlength="50"  value="{{ old('nombre') }}" placeholder="Nuevo Nombre de la Categoría">
                    </div>

                    <input type="submit" id="btn-update">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="button" id="up-categoria" class="btn btn-warning" >Actualizar</button>
            </div>
        </div>
    </div>
</div>



@endsection



@section('scripts')

<script>
window.onload = function (){

        $('#deleteModalNoticia').on('show.bs.modal', function (event) {
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


        $('#btn-cat').hide();

        $("#cont-categoria").change(function() {
            var value=$.trim($("#cont-categoria").val());
            if(value.length>0){$("#cont-categoria").removeClass('is-invalid');$("#cont-categoria").addClass('is-valid');
            }else{$("#cont-categoria").removeClass('is-valid');$("#cont-categoria").addClass('is-invalid');}
        });
   
        $('#categoria').click(function() {            
            var value=$.trim($("#cont-categoria").val());
                if(value.length>2){
                $('#btn-cat').click();}else{$("#cont-categoria").addClass('is-invalid');}
        });


        $('#deleteModalCategoria').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var nombre = button.data('nombre') 
        var id = button.data('id') 
        action = $('#formDeleteCategoria').attr('data-action').slice(0,-1);
        action += id
        $('#formDeleteCategoria').attr('action',action);

        var modal = $(this);
        modal.find('.modal-body >p> small >strong').text("( "+nombre+" )");
        });


        $('#updateModalCategoria').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var nombre = button.data('nombre') 
        var id = button.data('id') 
        action = $('#formUpdateCategoria').attr('data-action').slice(0,-1);
        action += id
        $('#formUpdateCategoria').attr('action',action);

        var modal = $(this);
        modal.find('.modal-body > form > div > input[type="text"]').val(nombre);
        });

        $('#btn-update').hide();

        


        $("#update-categoria").change(function() {
            var value=$.trim($("#update-categoria").val());
            if(value.length>0){$("#update-categoria").removeClass('is-invalid');$("#update-categoria").addClass('is-valid');
            }else{$("#update-categoria").removeClass('is-valid');$("#update-categoria").addClass('is-invalid');}
        });
   
        $('#up-categoria').click(function() {           
            var value=$.trim($("#update-categoria").val());
                if(value.length>2){
                    $('#btn-update').click();
                }else
                    {$("#update-categoria").addClass('is-invalid');
                }
        });

        
    }
</script>







@endsection
