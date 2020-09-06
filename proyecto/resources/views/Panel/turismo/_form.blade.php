<div class="row">
    <div class="form-group col-4">
            <label for="titulo">Título*</label>
            <input class="form-control pl-3 pr-3 mr-5  @error('titulo') is-invalid @enderror" type="text" name="titulo" id="titulo" value="{{ old('titulo',$turismo->titulo) }}">
            @error('titulo')  <div class="invalid-feedback">Introduce un Título Válido.</div>  @enderror
    </div>

    <div class="form-group col-8">
            <label for="lugar">Lugar*</label>
            <input class="form-control  @error('lugar') is-invalid @enderror" type="text" name="lugar" id="lugar" value="{{ old('lugar',$turismo->lugar) }}">
            @error('lugar')  <div class="invalid-feedback">Introduce un Lugar Válido.</div>  @enderror
    </div>
    <hr>
    <div class="form-group col-8">
        <label for="desc">Descripcion*</label>
        <input type="text"  class="form-control is-invalid" hidden>
        <textarea class="form-control  @error('desc') form-invalid @enderror" type="text" name="desc" id="desc"> {{ old('desc', $turismo->desc) }} </textarea>
        @error('desc')  <div class="invalid-feedback mt-2">Introduce un Contenido Válido.</div>  @enderror
    </div>
    <hr>
<div class="form-group col-4">
<label for="fecha">Fecha*</label>
<input class="form-control  @error('fecha') is-invalid @enderror" type="date" name="fecha" id="fecha" value="{{ old('fecha',$turismo->fecha) }}">
@error('fecha')  <div class="invalid-feedback">Introduce un Lugar Válido.</div>  @enderror
</div>

<div class="form-group col-4">
<label for="tiempo">Hora*</label>
<input class="form-control  @error('tiempo') is-invalid @enderror" type="time" name="tiempo" id="tiempo" value="{{ old('tiempo',$turismo->tiempo) }}">
@error('tiempo')  <div class="invalid-feedback">Introduce un Lugar Válido.</div>  @enderror
</div>
</div>
