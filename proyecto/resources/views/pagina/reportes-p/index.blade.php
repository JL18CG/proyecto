@extends('pagina.main-sec')
@section('link_a_a','activo-l')


@section('content') 
<h3 class="h2 d-block pt-2">Reportes Ciudadanos</h3>
<div class="container">

<div class="row">
    <div class="col-12">
    <div class="dropdown">
        <button class="btn btn-primary dropdown-toggle col-12" style="margin-top:28px" type="button" id="tipo" data-toggle="dropdown">
          Seleccione el tipo de Reporte que desea hacer
        </button>
        <div class="dropdown-menu" aria-labelledby="tipo">
          <a class="dropdown-item" onclick="ShowFun();">Funcionario Publico</a>
          <a class="dropdown-item" onclick="ShowVia();">Vialidad</a>
          <a class="dropdown-item" onclick="ShowSer();">Servicios Publicos</a>
          <a class="dropdown-item" onclick="ShowPag();">Funcionalidad de la pagina</a>
        </div>
      </div>
    </div>
</div>
<div class="row">

</div class="col-12">
<form class="mt-3 mb-5 pb-2" method="POST" enctype='multipart/form-data' action="{{route('consu.store')}}" id="formFuncionario" style="display:none">
    @csrf
    @method('PUT')
    <div class="form-group col-12">
        <h4 class="h2 d-block pt-2">Reportes a funcionarios</h4>
        <label for="tiporeporte">Selecciona el tipo de reporte</label>
        <input style="display:none" name="categoria" id="categoria" value="1">
        <select class="form-control  @error('tiporeporte') is-invalid @enderror" name="tiporeporte" id="tiporeporte">
            @foreach ($tipof as $item)
            <option value="{{$item->id}}">{{$item->tipo}}</option>
        @endforeach
        </select>
        @error('tiporeporte')  <div class="invalid-feedback">Selecciona un tipo</div>  @enderror
    </div> 
    <div class="form-group col-12">
        <label for="descripcion">Describe el problema, nombre del funcionario y demas informacion que desees agregar</label>
        <textarea class="form-control  @error('descripcion') is-invalid @enderror" type="text" name="descripcion" id="descripcion"></textarea>
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
        <input style="display:none" name="categoria" id="categoria" value="2">
        <select class="form-control  @error('tiporeporte') is-invalid @enderror" name="tiporeporte" id="tiporeporte">
            @foreach ($tipov as $item)
                <option value="{{$item->id}}">{{$item->tipo}}</option>
            @endforeach
        </select>
        @error('tiporeporte')  <div class="invalid-feedback">Selecciona un tipo</div>  @enderror
    </div> 
    <div class="form-group col-12">
        <label for="descripcion">Describe el problema, direccion, contacto y/o demas informacion que desees agregar</label>
        <textarea class="form-control  @error('descripcion') is-invalid @enderror" type="text" name="descripcion" id="descripcion"></textarea>
        @error('descripcion')  <div class="invalid-feedback">Introduce un Descipción</div>  @enderror
        </div>


    <input type="submit" value="Enviar Reporte" class="btn btn-success mt-3 float-right">

</form>
<form class="mt-3 mb-5 pb-2" method="POST" enctype='multipart/form-data' action="{{route('consu.store')}}" id="formServicios" style="display:none">
    @csrf
   @method('PUT')
    
    <div class="form-group col-12">
        <h4 class="h2 d-block pt-2">Reportes de Servicios Publicos</h4>
        <label for="tiporeporte">Selecciona el tipo de reporte</label>
        <input style="display:none" name="categoria" id="categoria" value="3">
        <select class="form-control  @error('tiporeporte') is-invalid @enderror" name="tiporeporte" id="tiporeporte">
            @foreach ($tipos as $item)
            <option value="{{$item->id}}">{{$item->tipo}}</option>
            @endforeach
        </select>
        @error('tiporeporte')  <div class="invalid-feedback">Selecciona un tipo</div>  @enderror
    </div> 
    <div class="form-group col-12">
        <label for="descripcion">Describe el problema, direccion, contacto y/o demas informacion que desees agregar</label>
        <textarea class="form-control  @error('descripcion') is-invalid @enderror" type="text" name="descripcion" id="descripcion"></textarea>
        @error('descripcion')  <div class="invalid-feedback">Introduce un Descipción</div>  @enderror
        </div>



    <input type="submit" value="Enviar Reporte" class="btn btn-success mt-3 float-right">

</form>
<form class="mt-3 mb-5 pb-2" method="POST" enctype='multipart/form-data' action="{{route('consu.store')}}" id="formPagina" style="display:none">
    @csrf
    @method('PUT')
    
    <div class="form-group col-12">
        <h4 class="h2 d-block pt-2">Reportes de Funcionalidad de la Pagina</h4>
        <label for="tiporeporte">Selecciona el tipo de reporte</label>
        <input style="display:none" name="categoria" id="categoria" value="4">
        <select class="form-control  @error('tiporeporte') is-invalid @enderror" name="tiporeporte" id="tiporeporte">
            @foreach ($tipop as $item)
                <option value="{{$item->id}}">{{$item->tipo}}</option>
            @endforeach
            
        </select>
        @error('tiporeporte')  <div class="invalid-feedback">Selecciona un tipo</div>  @enderror
    </div> 
    <div class="form-group col-12">
        <label for="descripcion">Describe el problema o error, El procedimiento que hiciste para que pasara el error y/o demas informacion que desees agregar</label>
        <textarea class="form-control  @error('descripcion') is-invalid @enderror" type="text" name="descripcion" id="descripcion"></textarea>
        @error('descripcion')  <div class="invalid-feedback">Introduce un Descipción</div>  @enderror
        </div>


    <input type="submit" value="Enviar Reporte" class="btn btn-success mt-3 float-right">

</form>
  </div>

<script type="text/javascript">
    function ShowFun(){
    document.getElementById('formFuncionario').style.display="block";
    document.getElementById('formVialidad').style.display="none";
    document.getElementById('formServicios').style.display="none";
    document.getElementById('formPagina').style.display="none";
    }
    function ShowVia(){
    document.getElementById('formFuncionario').style.display="none";
    document.getElementById('formVialidad').style.display="block";
    document.getElementById('formServicios').style.display="none";
    document.getElementById('formPagina').style.display="none";
    }
    function ShowSer(){
    document.getElementById('formFuncionario').style.display="none";
    document.getElementById('formVialidad').style.display="none";
    document.getElementById('formServicios').style.display="block";
    document.getElementById('formPagina').style.display="none";
    }
    function ShowPag(){
    document.getElementById('formFuncionario').style.display="none";
    document.getElementById('formVialidad').style.display="none";
    document.getElementById('formServicios').style.display="none";
    document.getElementById('formPagina').style.display="block";
    }
</script>
@endsection