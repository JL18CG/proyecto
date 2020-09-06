@extends('panel.main')
@section('titulo') Turismo @endsection
@section('content')

<div class="pb-5">

    <a href="{{ route("turismo.index") }}" type="button" class="btn btn-danger mt-5"><i class="fa fa-arrow-left"></i> Regresar  </a>
            
    <form  class="mt-3 mb-5 pb-2" action="{{ route("turismo.update",$turismo->id) }}" method="POST" enctype='multipart/form-data'>
        @csrf
        @method('PUT')
        @include('panel.turismo._form')
        <input type="submit" value="Guardar Datos" class="btn btn-success mt-3 float-right">
    </form>

</div>
@endsection
