@extends('layouts.app')

@section('content')

<form class="log-in text-left">
    <div class="form-group">
      <label for="exampleInputEmail1">Correo Electrónico</label>
      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Escribe tu Correo">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Contraseña</label>
      <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Escribe tu Contraseña">
    </div>
    <small id="emailHelp" class="form-text text-muted mb-3">No Compartas tus Credenciales de Acceso con Nadie.</small>
    <div class="form-check">
      <input type="checkbox" class="form-check-input" id="exampleCheck1">
      <label class="form-check-label" for="exampleCheck1">Recordar Credenciales</label>
    </div>

    <button type="submit" class="btn btn-outline-primary float-right pl-3 pt-1 pb-1 pr-3">Entrar</button>
</form>
@endsection
