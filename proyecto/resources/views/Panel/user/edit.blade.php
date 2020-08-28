@extends('panel.main')
@section('titulo') Usuarios @endsection
@section('content')

<div class="pb-5">

    <a href="{{ route("usuarios.index") }}" type="button" class="btn btn-danger mt-5"><i class="fa fa-arrow-left"></i> Regresar  </a>
            
    <form  class="mt-3 mb-5 pb-2" action="{{ route("usuarios.update",$usuario->id) }}" method="POST" enctype='multipart/form-data'>
        @csrf
        @method('PUT')
        @include('panel.user._form')
        <input type="submit" value="Guardar Datos" class="btn btn-success mt-3 float-right">
    </form>



</div>
@endsection


@section('scripts')
    <script>
        var input=  document.getElementById('tel-contacto');
        input.addEventListener('input',function(){
        if (this.value.length > 10) 
        this.value = this.value.slice(0,10); 
        })
    </script>
@endsection