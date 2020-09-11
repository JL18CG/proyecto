<div class="row">
    <div class="form-group col-4">
            <label for="tipo-rep">Selecciona el Tipo de Reporte*</label>
            <select class="form-control" id="tipo-rep" name="reporte">
                <option value="general" >Reporte General</option>
                <option value="sevac">Reporte SEVAC</option>
            </select>
    </div>

    <div class="form-group col-4">
            <label for="tipo-rep">Selecciona la Categoría del Reporte*</label>
            <select class="form-control" id="cat-rep" name="clasificacion">
                <option value="mensual" >Reporte Mensual</option>
                <option value="trimestral">Reporte Trimestral</option>
                <option value="anual" >Reporte Anual</option>
            </select>
    </div>

    <div class="form-group col-4">
        <label for="n-archivo">Agrega el Nombre del Documento*</label>
        <input class="form-control pl-3 pr-3 mr-5  @error('nombre') is-invalid @enderror" type="text" name="nombre" id="n-archivo" value="{{ old('nombre',$reporte->titulo) }}">
        @error('nombre')  <div class="invalid-feedback">El Nombre es Obligatorio.</div>  @enderror
        <small  class="ml-3 form-text text-muted">Ejemplo: "Reporte Trimestral Agosto-Noviembre 2020"</small>
    </div>

    <div class="form-group col-12 ">
        
    <hr>
        <label for="img">Cargar Archivo PDF*</label>
        <button type="button" class="ml-3 btn btn-info " id="btn-pdf"><i class="fa fa-upload mr-1"></i> Seleccionar Archivo</button>
        <input class="form-control  @error('pdf') is-invalid @enderror d-none" type="file" accept="application/pdf" name="pdf" id="pdf">
        @error('pdf')  <div class="invalid-feedback">Formato PDF y Peso Menor de 5mb Obligatorio.</div>  @enderror
         <div  class="col-12 mt-2 pdf-v-p {{ $reporte->imagen ? : 'd-none'}}">
            <iframe  id="pdf-view" src ="{{  $reporte->imagen ? asset('web/docs/reps/carta.pdf') : '' }}" class="col-12" height="500px"></iframe>
        </div>
    </div>
</div>


