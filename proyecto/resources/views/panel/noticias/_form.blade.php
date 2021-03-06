<div class="row m-reset">
    <div class="form-group col-12 m-table">
            <label for="titulo">Título de la Noticia*</label>
            <input class="form-control pl-3 pr-3 mr-5  @error('titulo') is-invalid @enderror" type="text" name="titulo" maxlength="250" id="titulo" value="{{ old('titulo',$noticia->titulo) }}">
            @error('titulo')  <div class="invalid-feedback">Introduce un título válido no mayor a 270 carácteres. (Es posible que ese título ya se encuentre registrado)</div>  @enderror
    </div>

    <div class="form-group col-12 m-table">
            <label for="autor">Autor de la Noticia*</label>
            <input class="form-control  @error('autor') is-invalid @enderror" type="text" name="autor" id="autor" maxlength="49" value="Comunicacíon Social">
            @error('autor')  <div class="invalid-feedback">Introduce un autor válido no mayor a 50 carácteres.</div>  @enderror
    </div>

</div>
<hr>
<div class="form-group">
    <label for="contenido">Contenido*</label>
    <input type="text"  class="form-control is-invalid" hidden>
    @error('contenido')  <div class="invalid-feedback mt-2">Introduce un contenido válido, es posible que el contenido que intentas guardar excede el máximo de carácteres aceptados (20000).</div>  @enderror
    <textarea class="form-control @error('contenido') form-invalid @enderror" type="text" name="contenido" id="contenido"> {{ old('contenido', $noticia->descripcion) }} </textarea>
</div>
<hr>
<div class="form-group col-12 m-table">
    <label for="img">Cargar Imagen*</label> <br>
    <button type="button" class="ml-3 mr-3 btn btn-info" id="btn-img"><i class="fa fa-upload mr-1"></i> Seleccionar Archivo</button>
    <a href="https://compressjpeg.com/es/"  target=”_blank” class="ml-3 mr-3 btn btn-info"><i class="fa fa-compress mr-1"></i>Comprimir Imágen</a>
    <input class="form-control  @error('imagen') is-invalid @enderror d-none" type="file" accept="image/*" name="imagen" id="img">
    @error('imagen')  <div class="invalid-feedback">La Imagen debe ser formato JPG, JPEG o PNG y pesar menos de 1MB.</div>  @enderror
    <div  class="col-12 mt-2">
        <img id="blah"  class="mx-auto d-block img-fluid" src="{{ $noticia->imagen ? asset('web/img/noticias/'.$noticia->imagen) : '' }}" alt="" />
    </div>
</div>
<hr>
<div class="form-group col-12 m-table">
    <label for="cats">Seleccionar Categorías*</label>
    <br>
    <small class="mb-1 ml-2">(Para Seleccionar Multiples Categorías Presione "ctrl + click")</small>
    <input type="text"  class="form-control is-invalid" hidden>
    <select  multiple class="form-control col-6 mt-1  @error('categorias') form-invalid @enderror" name="categorias[]" id="cats">
        @foreach ($categorias as $nombre => $id)
            <option {{ in_array($id, old('categorias') ?: $noticia->categorias->pluck("id")->toArray() ) ? "selected": "" }} class="mt-1 d-flex p-3 align-middle" value="{{$id}}">{{$nombre}}</option>
        @endforeach
    </select>
    @error('categorias')  <div class="invalid-feedback">Seleccione una(s) categoría(s) válida(s), puede agregar una categoría en el panel de categorías.</div>  @enderror
</div>





