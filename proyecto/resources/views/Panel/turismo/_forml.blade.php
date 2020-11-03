<div class="row">
    <div class="form-group col-4">
            <label for="nombre_lugar">Nombre*</label>
            <input class="form-control pl-3 pr-3 mr-5  @error('nombre_lugar') is-invalid @enderror" type="text" maxlength="109"  name="nombre_lugar" id="nombre_lugar" value="{{ old('nombre_lugar',$sitio->nombre_lugar) }}">
            @error('nombre_lugar')  <div class="invalid-feedback">Introduce un nombre válido no mayor a 109 carácteres, es posible que el nombre de lugar ya se encuentre registrado.</div>  @enderror
    </div>
    
    <div class="form-group col-8">
            <label for="tipo_lugar">Tipo de Lugar*</label>
            <select class="form-control  @error('tipo_lugar') is-invalid @enderror" name="tipo_lugar" id="tipo_lugar" value="{{ old('tipo_lugar',$sitio->tipo_lugar) }}">
                <option  {{ $sitio->tipo_lugar == "Zona Turística" ? 'selected' :'' }} value="Zona Turística">Zona Turística</option>
                <option  {{ $sitio->tipo_lugar == "Área Recreativa" ? 'selected' :'' }} value="Área Recreativa">Área Recreativa</option>
                <option  {{ $sitio->tipo_lugar == "Área Verde" ? 'selected' :'' }} value="Área Verde">Área Verde</option>
                <option  {{ $sitio->tipo_lugar == "Otro" ? 'selected' :'' }} value="Otro">Otro</option>
              </select>
            @error('tipo_lugar')  <div class="invalid-feedback">Selecciona un Tipo de Lugar Válido.</div>  @enderror
    </div>
    <hr>
    <div class="form-group col-8">
        <label for="ubicacion">Google Maps*</label>
        <input type="text"  class="form-control is-invalid" hidden>
        <input class="form-control  @error('ubicacion') form-invalid @enderror" type="text" name="ubicacion" id="ubicacion" maxlength="249"  value="{{ old('ubicacion', $sitio->ubicacion) }} "> 
        @error('ubicacion')  <div class="invalid-feedback mt-2">Introduce una ubicación de google maps válida no mayor a 249 carácteres.</div>  @enderror
    </div>
    <hr>
<div class="form-group col-4">
<label for="fecha">Ubicación*</label>
<input class="form-control  @error('direccion') is-invalid @enderror" type="text" name="direccion" id="direccion" maxlength="109" value="{{ old('direccion',$sitio->direccion) }}">
@error('direccion')  <div class="invalid-feedback">Introduce una dirección válida no mayor a 109 carácteres.</div>  @enderror
</div>

<div class="form-group col-12">
<label for="descripcion">Breve Descripción*</label>
<textarea class="form-control  @error('descripcion') is-invalid @enderror" type="text" name="descripcion" maxlength="109"  id="descripcion"> {{ old('descripcion',$sitio->descripcion) }} </textarea>
@error('descripcion')  <div class="invalid-feedback">Introduce un descripción válida no mayor a 109 carácteres.</div>  @enderror
</div>
</div>


<hr>

<div class="form-group col-12 m-table">
    <label for="img">Cargar Imagen*</label> <br>
    <a href="https://compressjpeg.com/es/"  target=”_blank” class="ml-3 mr-3 btn btn-info"><i class="fa fa-compress mr-1"></i>Comprimir Imágen</a>
    <button type="button" class="ml-3 btn btn-info " id="btn-img-s"><i class="fa fa-upload mr-1"></i> Seleccionar Archivo</button>
    <input class="form-control  @error('imagen') is-invalid @enderror d-none" type="file" accept="image/*" name="imagen" id="img-s">
    @error('imagen')  <div class="invalid-feedback">La Imagen debe ser formato JPG, JPEG o PNG y pesar menos de 1MB.</div>  @enderror
    <div  class="col-12 mt-2">
        <img id="prev-sitio"  class="mx-auto d-block img-fluid" src="{{ $sitio->img ? asset('web/img/sitios/'.$sitio->img) : '' }}" alt="" />
    </div>
</div>