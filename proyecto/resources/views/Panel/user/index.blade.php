@extends('panel.main')
@section('titulo') Usuarios @endsection
@section('content')
<div class="pt-1 pb-5">
    <h3 class="h2 d-block pt-2">Panel de Usuarios</h3>
    <hr>
    <p>Agrega a usuarios para que ayuden a administrar el contenido de la página.</p>


    <ul class="nav nav-tabs mt-4" id="myTab" role="tablist">
        <li class="nav-item ">
        <a class="nav-link {{ (session('active-rol')) ? '' : 'active' }} " id="home-tab" data-toggle="tab" href="#p-usuarios" role="tab" aria-controls="p-noticia" aria-selected="true">Usuarios</a>
        </li>
        <li class="nav-item ">
        <a class="nav-link {{ (session('active-rol')) ? 'active' : '  ' }} " id="profile-tab" data-toggle="tab" href="#p-roles" role="tab" aria-controls="profile" aria-selected="false">Registro de Roles</a>
        </li>
        <li class="nav-item ">
            <a class="nav-link  " id="profile-tab" data-toggle="tab" href="#p-auditoria" role="tab" aria-controls="profile" aria-selected="false">Registro de Auditoría</a>
        </li>
    </ul>

   
    <div class="tab-content" id="myTabContent">

        <div class="tab-pane fade {{ (session('active-rol')) ? '' : 'active show' }}" id="p-usuarios" role="tabpanel" aria-labelledby="home-tab">
            <div class="mt-3">
                <a href="{{ route("usuarios.create") }}" type="button" class="btn btn-success mt-2 mb-2">Agregar <i class="fa fa-plus"></i> </a>
                    <div class=" table-responsive ">
                        <table class="table table-hover">
                            <caption>Lista de Usuarios Registrados</caption>
                            <thead>
                            <tr class="fondo">
                                <th scope="col" style="width: 250px">Nombre</th>
                                <th scope="col " style="width: 400px" class="text-justify">Nivel</th>
                                <th scope="col"  style="width: 250px" class="text-center">Correo Electrónico</th>
                                <th scope="col">Teléfono</th>
                                <th scope="col"><div class="text-center tabla-w"><span>Acciones</span></div></th>
                            </tr>
                            </thead>
                            <tbody>
                
                            @foreach ($usuarios as $usuario)
                            <tr>
                                    <td class="pt-3 text-size">{{ $usuario->name }}   </td>
                                    <td class="pt-3 text-size text-justify">Usuario con Accesos a 
                                         @foreach ($usuario->roles->pluck('token') as $item)
                                            {{$item}}
                                        @endforeach 
                                        </td>
                                    <td class="pt-3 text-size text-center">{{ $usuario->email }}   </td>
                                    <td class="pt-3 text-size text-center ">{{ $usuario->telefono }}   </td>
                                    <td class="pt-3 text-size">
                                        <a class="btn btn-outline-warning ml-2 mr-2 edit-item" href="{{route('usuarios.edit',$usuario->id)}}"><i class="fa fa-pen"></i></a>
                                        <button class="btn btn-outline-danger target-modal ml-2 mr-2" data-toggle="modal" data-target="#deleteModalUsuario" data-nombre="{{ $usuario->name }}" data-id="{{ $usuario->id }}"><i class="fa fa-trash"></i></button>
                                    </td>
                                    
                            
                            </tr>
                            @endforeach
                
                            </tbody>
                        </table>
                    </div>
            </div>
        </div>

        <div class="tab-pane fade {{ (session('active-rol')) ? 'active show' : ' ' }}" id="p-roles" role="tabpanel" aria-labelledby="home-tab">
            <div class="mt-3">
                <button type="button" data-toggle="modal" data-target="#agregarModalRol" class="btn btn-success mt-2 mb-2">Agregar <i class="fa fa-plus"></i> </button>
                    <div class=" table-responsive ">
                        <table class="table table-hover">
                            <caption>Lista de Roles Registrados</caption>
                            <thead>
                                <tr class="fondo">
                                    <th scope="col" style="width: 250px">Módulo</th>
                                    <th scope="col">Descripcion del Rol</th>
                                    <th scope="col" style="width: 100px"><div class="text-center tabla-w"><span>Acciones</span></div></th>
                                </tr>
                            </thead>
                            <tbody>
                
                            @foreach ($list as $role)
                            <tr>
                                    <td class="pt-3 text-size">{{ $role->token }}   </td>
                                    <td class="pt-3 text-size text-justify">{{ $role->nombre }}   </td>
                                    <td class="pt-3 text-size ">
                                        <button class="btn btn-outline-warning ml-2 mr-2 edit-item" data-toggle="modal" data-target="#updateModalRol" data-descripcion="{{ $role->nombre }}" data-id="{{ $role->id }}" data-nombre="{{ $role->token }}"><i class="fa fa-pen"></i></button>
                                        <button class="btn btn-outline-danger target-modal ml-2 mr-2" data-toggle="modal" data-target="#deleteModalRol" data-nombre="{{ $role->token }}" data-id="{{ $role->id }}"><i class="fa fa-trash"></i></button>
                                    </td>                          
                            </tr>
                            @endforeach
                
                            </tbody>
                        </table>
                    </div>
            </div>
        </div>

        <div class="tab-pane fade" id="p-auditoria" role="tabpanel" aria-labelledby="home-tab">
            <div class="mt-3">
                <div class=" table-responsive ">
                    <table class="table table-hover">
                        <caption>Lista de Roles Registrados</caption>
                        <thead>
                            <tr class="fondo">
                                <th scope="col">Usuario</th>
                                <th scope="col">Descripcion de Actividad</th>
                            </tr>
                        </thead>
                        <tbody>
            
                        @foreach ($usuarios as $usuario)
                        <tr>
                                <td class="pt-3 text-size">{{ $usuario->name }}   </td>
                                <td class="pt-3 text-size text-center">{{ $usuario->rol_id }}   </td>
                        </tr>
                        @endforeach
            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>



    </div>
    
</div>

@endsection


@section('modals')

<div class="modal fade mt-5"  id="deleteModalUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog mt-5 "  role="document">
        <div class="modal-content  mt-5" >
            <div class="modal-header" >
                <h5 class="modal-title " id="modalLabel"><i class="fa fa-exclamation-triangle text-danger mr-2"></i> Advertencia</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body  mt-3">
                <p class="w-100 text-justify">Esta acción borrará el Usuario seleccionado, de forma permanente.
                <br>
                <small><strong></strong></small></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>

                <form id="formDeleteUsuario" method="POST" action="{{ route('usuarios.destroy',0) }}"
                    data-action="{{ route('usuarios.destroy',0) }}">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-outline-danger">Borrar</button>
                </form>


            </div>
        </div>
    </div>
</div>


<div class="modal fade mt-5" id="agregarModalRol" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog mt-5" role="document">
        <div class="modal-content mt-5">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel"><i class="fa fa-pencil-alt text-success mr-2"></i> Agregar Nuevo Rol</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formAgregarRol" method="POST" action="{{ route('role.post') }}">
                    @csrf  
                    <div class="form-group">
                        <input class="form-control" type="text" name="nombre"  value="{{ old('nombre') }}" placeholder="Nombre del Nuevo Rol">
                        <label for="desc-rol" class="mt-3">Agrega la Descripción del Nuevo Rol</label>
                        <textarea class="form-control mt-1" name="descripcion" id="desc-rol"></textarea>
                    </div>

                    <input type="submit" id="btn-rol">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="button" id="rol-enviar" class="btn btn-success" >Agregar</button>
            </div>
        </div>
    </div>
</div>



<div class="modal fade mt-5" id="updateModalRol" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog mt-5" role="document">
        <div class="modal-content mt-5">
            <div class="modal-header">
                <h5 class="modal-title " id="modalLabel"><i class="fa fa-pencil-alt text-warning mr-2"></i> Actualizar Rol</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formUpdateRol" method="POST" action="{{ route('role.update',0) }}"
                    data-action="{{ route('role.update',0) }}">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <input class="form-control" type="text" name="nombre"  value="" placeholder="Nombre del Rol">
                        <label for="desc-rol" class="mt-3">Actualizar Descripción del Rol</label>
                        <textarea class="form-control mt-1" name="descripcion" id="desc-rol"></textarea>
                    </div>

                    <input type="submit" id="btn-update-rol">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="button" id="up-rol" class="btn btn-warning" >Actualizar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade mt-5"  id="deleteModalRol" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

                <form id="formDeleteRol" method="POST" action="{{ route('role.delete',0) }}"
                    data-action="{{ route('role.delete',0) }}">
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
        $('#btn-rol').hide();

        $('#rol-enviar').click(function() {
            $('#btn-rol').click();
        });
        

        $('#btn-update-rol').hide();

        $('#up-rol').click(function() {
            $('#btn-update-rol').click();
        });


        $('#updateModalRol').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var descripcion= button.data('descripcion')
        var nombre = button.data('nombre')  
        var id = button.data('id') 
        action = $('#formUpdateRol').attr('data-action').slice(0,-1);
        action += id
        $('#formUpdateRol').attr('action',action);

        var modal = $(this);
        modal.find('.modal-body > form > div > input[type="text"]').val(nombre);
        modal.find('.modal-body > form > div > textarea').val(descripcion);
        });


        $('#deleteModalRol').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var nombre = button.data('nombre') 
        var id = button.data('id') 
        action = $('#formDeleteRol').attr('data-action').slice(0,-1);
        action += id
        $('#formDeleteRol').attr('action',action);

        var modal = $(this);
        modal.find('.modal-body >p> small >strong').text("( "+nombre+" )");
        });

        
        $('#deleteModalUsuario').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var nombre = button.data('nombre') 
        var id = button.data('id') 
        action = $('#formDeleteUsuario').attr('data-action').slice(0,-1);
        action += id
        $('#formDeleteUsuario').attr('action',action);

        var modal = $(this);
        modal.find('.modal-body >p> small >strong').text("( "+nombre+" )");
        });

}
</script>







@endsection