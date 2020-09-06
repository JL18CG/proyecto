<div class="row m-reset">
    <div class="form-group col-12 m-table">
            <label for="titulo">Título de la Noticia*</label>
            <input class="form-control pl-3 pr-3 mr-5  @error('titulo') is-invalid @enderror" type="text" name="titulo" id="titulo" value="{{ old('titulo',$noticia->titulo) }}">
            @error('titulo')  <div class="invalid-feedback">Introduce un Título Válido.</div>  @enderror
    </div>

    <div class="form-group col-12 m-table">
            <label for="autor">Autor de la Noticia*</label>
            <input class="form-control  @error('imagen') is-invalid @enderror" type="text" name="autor" id="autor" value="{{ old('autor',$noticia->autor) }}">
            @error('autor')  <div class="invalid-feedback">Introduce un Autor Válido.</div>  @enderror
    </div>

</div>
<hr>
<div class="form-group">
    <label for="contenido">Contenido*</label>
    <input type="text"  class="form-control is-invalid" hidden>
    @error('contenido')  <div class="invalid-feedback mt-2">Introduce un Contenido Válido.</div>  @enderror
    <textarea class="form-control  @error('contenido') form-invalid @enderror" type="text" name="contenido" id="contenido"> {{ old('contenido', $noticia->descripcion) }} </textarea>
</div>
<hr>
<div class="form-group col-12 m-table">
    <label for="img">Cargar Imagen*</label>
    <button type="button" class="ml-3 btn btn-info " id="btn-img"><i class="fa fa-upload mr-1"></i> Seleccionar Archivo</button>
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
    <select  multiple class="form-control col-6 mt-1  @error('categorias') form-invalid @enderror pr-5" name="categorias[]" id="cats">
        @foreach ($categorias as $nombre => $id)
            <option {{ in_array($id, old('categorias') ?: $noticia->categorias->pluck("id")->toArray() ) ? "selected": "" }} class="mt-1 d-flex p-3 align-middle" value="{{$id}}">{{$nombre}}</option>
        @endforeach
    </select>
    @error('categorias')  <div class="invalid-feedback">Seleccione una(s) Categoría(s) Válida(s) si no Agrege una Categoría en el Panel de Categorías.</div>  @enderror
</div>





