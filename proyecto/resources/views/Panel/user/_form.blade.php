<div class="row">
    <div class="form-group col-4">
            <label for="titulo">Nombre(s)*</label>
            <input class="form-control pl-3 pr-3 mr-5  @error('name') is-invalid @enderror" type="text" name="name" id="titulo" value="{{ old('name',$usuario->name) }}">
            <input class="form-control pl-3 pr-3 mr-5 " type="hidden" name="admin" value="no">
            @error('name')  <div class="invalid-feedback">Introduce un Nombre Válido.</div>  @enderror
    </div>

    <div class="form-group col-8">
            <label for="apellidos">Apellido(s)*</label>
            <input class="form-control  @error('apellidos') is-invalid @enderror" type="text" name="apellidos" id="apellidos" value="{{ old('apellidos',$usuario->apellidos) }}">
            @error('apellidos')  <div class="invalid-feedback">Introduce un Apellido Válido.</div>  @enderror
    </div>
</div>
<hr>
<div class="row">
    <div class="form-group col-6">
        <label for="correo">Correo Electrónico del Usuario*</label>
        <input class="form-control  @error('email') is-invalid @enderror" type="email" name="email" id="correo" value="{{ old('email',$usuario->email) }}">
        @error('email')  <div class="invalid-feedback">Introduce un Correo Electrónico Válido.</div>  @enderror
    </div>
    <div class="form-group col-3">
        <label for="pass">Contraseña de Acceso*</label>
        <input class="form-control  @error('password') is-invalid @enderror" type="password" name="password" id="pass" value="{{ old('password') }}">
        @error('password')  <div class="invalid-feedback">Introduce una Contraseña de más de 8 Carácteres.</div>  @enderror
    </div>
    <div class="form-group col-3">
        <label for="tel-contacto">Teléfono de Contacto*</label>
        <input class="form-control  @error('telefono') is-invalid @enderror" type="number" name="telefono" id="tel-contacto" value="{{ old('telefono',$usuario->telefono) }}">
        @error('telefono')  <div class="invalid-feedback">Introduce un Teléfono Válido.</div>  @enderror
    </div>
</div>

<hr>
<div class="row">
    <div class="form-group col-12">
        <label for="autor">Especificar el Rol que Tendrá el Usuario*</label>
        <input type="text"  class="form-control is-invalid" hidden>
        <select multiple class="form-control col-12 mt-1  @error('roles') form-invalid @enderror " name="roles[]" id="cates">
            @foreach ($roles as $nombre => $id)
            <option {{ in_array($id, old('cates') ?: $usuario->roles->pluck("id")->toArray() ) ? "selected": "" }} class="mt-1 d-flex p-3 align-middle" value="{{$id}}">{{$nombre}}</option>
            @endforeach
        </select>
        @error('roles')  <div class="invalid-feedback">Seleccione una(s) Categoría(s) Válida(s) si no Agrege una Categoría en el Panel de Categorías.</div>  @enderror
    </div> 
</div>