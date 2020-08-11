@extends('Panel.master')
@section('content')
<form action="{{route("user.update",$users->id)}}" method="POST">
    @method('PUT')
    
    @include('Panel.user._form')
    <input type="submit" value="enviar" class="btn btn-primary">




</form>
@endsection