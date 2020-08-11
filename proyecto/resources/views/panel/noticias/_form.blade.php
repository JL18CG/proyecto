<div class="row m-reset">
    <div class="form-group col-12 m-table">
            <label for="titulo">Título de la Noticia*</label>
            <input class="form-control pl-3 pr-3 mr-5" type="text" name="título" id="titulo" value="{{ old('título',$noticia->titulo) }}">
    </div>

    <div class="form-group col-12 m-table">
            <label for="autor">Autor de la Noticia*</label>
            <input class="form-control" type="text" name="autor" id="autor" value="{{ old('autor',$noticia->autor) }}">
    </div>

</div>
<hr>
<div class="form-group">
    <label for="contenido">Contenido*</label>
    <textarea class="form-control" type="text" name="contenido" id="contenido"> {{ old('contenido', $noticia->descripcion) }} </textarea>
</div>
<hr>
<div class="form-group col-12 m-table">
    <label for="img">Cargar Imagen*</label>
    <button type="button" class="ml-3 btn btn-info" id="btn-img"><i class="fa fa-upload mr-1"></i> Seleccionar Archivo</button>
    <input class="form-control d-none" type="file" accept="image/*" name="imagen" id="img">
    <div  class="col-12 mt-2">
        
        <img id="blah"  class="mx-auto d-block img-fluid" src="{{ $noticia->imagen ? asset('web/img/noticias/'.$noticia->imagen) : '' }}" alt="" />
    </div>
</div>
<hr>
<div class="form-group col-12 m-table">
    <label for="cats">Seleccionar Categorías*</label>
    <br>
    <small class="mb-1 ml-2">(Para Seleccionar Multiples Categorías Presione "ctrl + click")</small>
    <select  multiple class="form-control col-6 mt-1" name="categorías[]" id="cats">
        @foreach ($categorias as $nombre => $id)
            <option {{ in_array($id, old('categorías') ?: $noticia->categorias->pluck("id")->toArray() ) ? "selected": "" }} class="mt-1 d-flex p-3 align-middle" value="{{$id}}">{{$nombre}}</option>
        @endforeach
    </select>
</div>





