@extends('panel.main')
@section('titulo') Directorios @endsection

@section('content')
<div class="pt-1 pb-5">
    <h3 class="h2 d-block pt-2">Panel de Directorios</h3>
    <hr>
    <p>Agrega los directorios de la administracion actual para que la informacion se publique en la página principal.</p>
    <a href="{{ route("directorios.create") }}" type="button" class="btn btn-success mt-2 mb-2">Agregar <i class="fa fa-plus"></i> </a>
    <div class="row">

        {{-- $directorios --}}

        @foreach ($directorios as $directorio)
        <div class="col-md-3 col-sm-6 d-flex justify-content-center mt-2 mb-2">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="{{ asset('web/img/directorio/'.$directorio->img)}}" alt="Card image cap">
                <div class="card-body">
                    <hr>
                    <p class="card-text text-center font-weight-bold h6">
                        {{$directorio->cargo}}
                    </p>
                    <p class="card-text text-center">
                        {{$directorio->nombre_completo}}
                    </p>
                    <hr>
                </div>
                <div class="card-footer text-muted text-right">
                    <a class="btn btn-outline-warning edit-item" href="{{route('directorios.edit',$directorio->id)}}"><i class="fa fa-pen"></i></a>
                    <button class="btn btn-outline-danger target-modal" data-toggle="modal" data-target="#deleteModalDirectorio" data-nombre="{{ $directorio->nombre_completo.' - '.$directorio->cargo }}" data-id="{{ $directorio->id }}"><i class="fa fa-trash"></i></button>
              </div>
            </div>
        </div>
        @endforeach
       
    </div>

</div>
   
@endsection


@section('modals')

<div class="modal fade mt-5"  id="deleteModalDirectorio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

                <form id="formDeleteDirectorio" method="POST" action="{{ route('directorios.destroy',0) }}"
                    data-action="{{ route('directorios.destroy',0) }}">
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
            $('#deleteModalDirectorio').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var nombre = button.data('nombre') 
            var id = button.data('id') 
            action = $('#formDeleteDirectorio').attr('data-action').slice(0,-1);
            action += id
            console.log(action)
            $('#formDeleteDirectorio').attr('action',action);

            var modal = $(this);
            modal.find('.modal-body >p> small >strong').text("( "+nombre+" )");
            });
        }
    </script>
@endsection