@extends('pagina.main-sec')
@section('link_a_a','activo-l')


@section('content') 


<div class="row">
    <div class="col-12">
        <h3 class="my-4 d-block text-center">Reportes Ciudadanos</h3>
        <hr class="divider-sm">
      </div>
    <div class="col-12">
        <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle col-12" style="margin-top:28px" type="button" id="tipo" data-toggle="dropdown">
              Seleccione el tipo de Reporte que desea hacer 
            </button>
            <div class="dropdown-menu w-100 mt-1" aria-labelledby="tipo">
              <a class="dropdown-item link-rep" id="f-publico">Funcionario Público</a>
              <a class="dropdown-item link-rep" id="f-vialidad">Vialidad</a>
              <a class="dropdown-item link-rep" id="f-servicios">Servicios Públicos</a>
              <a class="dropdown-item link-rep" id="f-pagina">Funcionalidad de la página</a>
            </div>
          </div>
    </div>

</div>






<div class="container">
    
<div class="row">
    
</div>
<div class="row">

</div class="col-12">
<form class="mt-3 mb-5 pb-2" method="POST" enctype='multipart/form-data' action="{{route('consu.store')}}" id="formFuncionario" style="display:none">
    @csrf
    @method('PUT')
    <div class="form-group col-12">
        <h4 class="h2 d-block pt-2">Reportes a funcionarios</h4>
        <label for="tiporeporte">Selecciona el tipo de reporte</label>
        <input style="display:none" name="categoria" id="categoria" value="Funcionario">
        <select class="form-control  @error('tiporeporte') is-invalid @enderror" name="tiporeporte" id="tiporeporte">
            <option value="Puntualidad">Puntualidad</option>
            <option value="Asistencia">Asistencia</option>
            <option value="Trato">Trato</option>
            <option value="Otro">Otro</option>
        </select>
        @error('tiporeporte')  <div class="invalid-feedback">Selecciona un tipo</div>  @enderror
    </div> 
    <div class="form-group col-12">
        <label for="descripcion">Describe el problema, nombre del funcionario y demas información que desees agregar</label>
        <textarea class="form-control  @error('descripcion') is-invalid @enderror" required type="text" name="descripcion" id="descripcion" maxlength="250" style="height: 150px;"></textarea>
        @error('descripcion')  <div class="invalid-feedback">Introduce un Descipción</div>  @enderror
        </div>


    <input type="submit" value="Enviar Reporte" class="btn btn-success mt-3 float-right">

</form>
<form class="mt-3 mb-5 pb-2" method="POST" enctype='multipart/form-data' action="{{route('consu.store')}}" id="formVialidad" style="display:none">
    @csrf
    @method('PUT')
    
    <div class="form-group col-12">
        <h4 class="h2 d-block pt-2">Reportes de vialidad</h4>
        <label for="tiporeporte">Selecciona el tipo de reporte</label>
        <input style="display:none" name="categoria" id="categoria" value="Vialidad">
        <select class="form-control  @error('tiporeporte') is-invalid @enderror" name="tiporeporte" id="tiporeporte">
            <option value="Alumbrado">Alumbrado</option>
            <option value="Baches">Baches</option>
            <option value="Señalización">Señalización</option>
            <option value="Otro">Otro</option>
        </select>
        @error('tiporeporte')  <div class="invalid-feedback">Selecciona un tipo</div>  @enderror
    </div> 
    <div class="form-group col-12">
        <label for="descripcion">Describe el problema, dirección, contacto y/o demas información que desees agregar</label>
        <textarea class="form-control  @error('descripcion') is-invalid @enderror" required type="text" name="descripcion" id="descripcion" maxlength="250" style="height: 150px;"></textarea>
        @error('descripcion')  <div class="invalid-feedback">Introduce un Descipción</div>  @enderror
        </div>


    <input type="submit" value="Enviar Reporte" class="btn btn-success mt-3 float-right">

</form>
<form class="mt-3 mb-5 pb-2" method="POST" enctype='multipart/form-data' action="{{route('consu.store')}}" id="formServicios" style="display:none">
    @csrf
   @method('PUT')
    
    <div class="form-group col-12">
        <h4 class="h2 d-block pt-2">Reportes de Servicios Públicos</h4>
        <label for="tiporeporte">Selecciona el tipo de reporte</label>
        <input style="display:none" name="categoria" id="categoria" value="Servicios Publicos">
        <select class="form-control  @error('tiporeporte') is-invalid @enderror" name="tiporeporte" id="tiporeporte">           
            <option value="Basura">Basura</option>
            <option value="Limpieza de areas">Limpieza de areas</option>
            <option value="Otro">Otro</option>         
        </select>
        @error('tiporeporte')  <div class="invalid-feedback">Selecciona un tipo</div>  @enderror
    </div> 
    <div class="form-group col-12">
        <label for="descripcion">Describe el problema, dirección, contacto y/o demas información que desees agregar</label>
        <textarea class="form-control  @error('descripcion') is-invalid @enderror" required type="text" name="descripcion" id="descripcion" maxlength="250" style="height: 150px;"></textarea>
        @error('descripcion')  <div class="invalid-feedback">Introduce un Descipción</div>  @enderror
        </div>



    <input type="submit" value="Enviar Reporte" class="btn btn-success mt-3 float-right">

</form>
<form class="mt-3 mb-5 pb-2" method="POST" enctype='multipart/form-data' action="{{route('consu.store')}}" id="formPagina" style="display:none">
    @csrf
    @method('PUT')
    
    <div class="form-group col-12">
        <h4 class="h2 d-block pt-2">Reportes de Funcionalidad de la Página</h4>
        <label for="tiporeporte">Selecciona el tipo de reporte</label>
        <input style="display:none" name="categoria" id="categoria" value="Funcionalidad">
        <select class="form-control  @error('tiporeporte') is-invalid @enderror" name="tiporeporte" id="tiporeporte">
            <option value="Página Principal">Página Principal</option>
            <option value="Página Noticias">Página Noticias</option>
            <option value="Página Directorio">Página Directorio</option>
            <option value="Página Tesorería">Página Tesorería</option>
            <option value="Página Reprotes Ciudadanos">Página Reprotes Ciudadanos</option>
            <option value="Página Transparencia">Página Transparencia</option>
            <option value="Página Turismo">Página Turismo</option>
            <option value="Página Historia">Página Historia</option>
            <option value="Página Eventos">Página Eventos</option>
            <option value="Otro">Otro</option>        
        </select>
        @error('tiporeporte')  <div class="invalid-feedback">Selecciona un tipo</div>  @enderror
    </div> 
    <div class="form-group col-12">
        <label for="descripcion">Describe el problema o error, El procedimiento que hiciste para que pasara el error y/o demas información que desees agregar</label>
        <textarea class="form-control  @error('descripcion') is-invalid @enderror" required type="text" name="descripcion" id="descripcion" maxlength="250" style="height: 150px;"></textarea>
        @error('descripcion')  <div class="invalid-feedback">Introduce un Descipción</div>  @enderror
        </div>


    <input type="submit" value="Enviar Reporte" class="btn btn-success mt-3 float-right">

</form>
  </div>

@endsection