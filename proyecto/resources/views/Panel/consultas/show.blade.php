@extends('panel.main')
@section('titulo') Consulta {{$consu->id}} @endsection
@section('content')
<div class="pt-1 pb-5">
    <a href="{{route('consultas.index')}}" type="button" class="btn btn-danger mt-5"><i class="fa fa-arrow-left"></i> Regresar  </a>
   
    <h3 class="h2 d-block pt-2">Consulta {{$consu->id}}</h3>

    <hr>
<div>
  
    <div class="form-group">
        <label for="title">Categoria</label>    
        <input readonly class="form-control" type="text" name="title" id="title" value="{{$consu->categoria}}">
    </div>
    <div class="form-group">
        <label for="title">Tipo</label>    
        <input readonly class="form-control" type="text" name="title" id="title" value="{{$consu->tipo}}">
    </div>
    <div class="form-group">
        <label for="title">contenido</label>    
        <textarea readonly class="form-control" type="text" name="title" id="title" >{{$consu->contenido}}</textarea>
    </div>
</div>
</div>
@endsection