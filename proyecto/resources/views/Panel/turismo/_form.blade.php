<div class="row">
    <div class="form-group col-12">
            <label for="titulo">Título*</label>
            <input class="form-control pl-3 pr-3 mr-5  @error('titulo') is-invalid @enderror" type="text" name="titulo" id="titulo" value="{{ old('titulo',$evento->titulo) }}">
            @error('titulo')  <div class="invalid-feedback">Introduce un Título Válido.</div>  @enderror
    </div>

    <div class="form-group col-12">
            <label for="lugar">Lugar*</label>
            <input class="form-control  @error('lugar') is-invalid @enderror" type="text" name="lugar" id="lugar" value="{{ old('lugar',$evento->lugar) }}">
            @error('lugar')  <div class="invalid-feedback">Introduce un Lugar Válido.</div>  @enderror
    </div>
    <hr>
    <div class="form-group col-12">
        <label for="desc">Descripcion*</label>
        <input type="text"  class="form-control is-invalid" hidden>
        <textarea class="form-control  @error('desc') form-invalid @enderror" type="text" name="desc" id="desc"> {{ old('desc', $evento->desc) }} </textarea>
        @error('desc')  <div class="invalid-feedback mt-2">Introduce un Contenido Válido.</div>  @enderror
    </div>
    <hr>
<div class="form-group col-4">
<label for="fecha">Fecha*</label>
<input class="form-control  @error('fecha') is-invalid @enderror" type="date" name="fecha" id="fecha" value="{{ old('fecha',$evento->fecha) }}">
@error('fecha')  <div class="invalid-feedback">Introduce una Fecha Válida.</div>  @enderror
</div>

<div class="form-group col-4">
<label for="tiempo">Hora*</label>
<input class="form-control  @error('tiempo') is-invalid @enderror" type="time" name="tiempo" id="tiempo" value="{{ old('tiempo',$evento->tiempo) }}">
@error('tiempo')  <div class="invalid-feedback">Introduce un Horario Válido.</div>  @enderror
</div>
</div>

<hr>

<div class="form-group col-12 m-table">
    <label for="img">Cargar Imagen*</label>
    <button type="button" class="ml-3 btn btn-info " id="btn-img-e"><i class="fa fa-upload mr-1"></i> Seleccionar Archivo</button>
    <input class="form-control  @error('imagen') is-invalid @enderror d-none" type="file" accept="image/*" name="imagen" id="img-e">
    @error('imagen')  <div class="invalid-feedback">La Imagen debe ser formato JPG, JPEG o PNG y pesar menos de 1MB.</div>  @enderror
    <div  class="col-12 mt-2">
        <img id="prev-evt"  class="mx-auto d-block img-fluid" src="{{ $evento->img ? asset('web/img/evts/'.$evento->img) : '' }}" alt="" />
    </div>
</div>