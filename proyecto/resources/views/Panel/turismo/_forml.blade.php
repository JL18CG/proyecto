<div class="row">
    <div class="form-group col-4">
            <label for="nombre_lugar">Nombre*</label>
            <input class="form-control pl-3 pr-3 mr-5  @error('nombre_lugar') is-invalid @enderror" type="text" name="nombre_lugar" id="nombre_lugar" value="{{ old('nombre_lugar',$sitio->nombre_lugar) }}">
            @error('nombre_lugar')  <div class="invalid-feedback">Introduce un Nombre Válido.</div>  @enderror
    </div>

    <div class="form-group col-8">
            <label for="tipo_lugar">Tipo de Lugar*</label>
            <select class="form-control  @error('tipo_lugar') is-invalid @enderror" name="tipo_lugar" id="tipo_lugar" value="{{ old('tipo_lugar',$sitio->tipo_lugar) }}">
                <option value="v1">Valor 1</option>
                <option value="v2">Valor 2</option>
                <option value="v3">Valor 3</option>
                <option value="v4">Valor 4</option>
              </select>
            @error('tipo_lugar')  <div class="invalid-feedback">Introduce un Tipo de Lugar Válido.</div>  @enderror
    </div>
    <hr>
    <div class="form-group col-8">
        <label for="ubicacion">Ubicacion</label>
        <input type="text"  class="form-control is-invalid" hidden>
        <input class="form-control  @error('ubicacion') form-invalid @enderror" type="text" name="ubicacion" id="ubicacion"> {{ old('ubicacion', $sitio->ubicacion) }} 
        @error('ubicacion')  <div class="invalid-feedback mt-2">Introduce un Contenido Válido.</div>  @enderror
    </div>
    <hr>
<div class="form-group col-4">
<label for="fecha">Direccion*</label>
<input class="form-control  @error('direccion') is-invalid @enderror" type="text" name="direccion" id="direccion" value="{{ old('direccion',$sitio->direccion) }}">
@error('direccion')  <div class="invalid-feedback">Introduce un Lugar Válido.</div>  @enderror
</div>

<div class="form-group col-12">
<label for="descripcion">Descripcion*</label>
<textarea class="form-control  @error('descripcion') is-invalid @enderror" type="text" name="descripcion" id="descripcion" value="{{ old('descripcion',$sitio->descripcion) }}"></textarea>
@error('descripcion')  <div class="invalid-feedback">Introduce un Lugar Válido.</div>  @enderror
</div>
</div>