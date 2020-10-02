<div class="row  m-reset pt-1">

    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 m-table">
        <div class="form-group col m-table ">
            <label for="cargo-a">Prioridad*</label>
            <select name="prioridad" id="" class="form-control">
                <option value="1" {{  $directorio->prioridad == 1 ? 'selected' : ''  }}>Prioridad Alta</option>
                <option value="2" {{  $directorio->prioridad == null ? 'selected' : ''  }}>Prioridad Normal</option>
            </select>
            <small  class="ml-3 form-text text-muted">Seleccione "Prioridad Alta" únicamente si se trata del Presidente Municipal</small>
        </div>
        <div class="form-group col m-table ">
            <label for="nombre-a">Formación y Nombre Completo*</label>
        <input type="text"  class=" form-control @error('nombre') is-invalid @enderror" id="nombre-a"placeholder="Introduce el Nombre Completo" name="nombre" value="{{ old('nombre',$directorio->nombre_completo) }}">
            @error('nombre')  <div class="invalid-feedback">Por favor Introduce un Nombre Válido.</div>  @enderror
            <small class="ml-3 form-text text-muted">Ejemplo: Ing. José Luis Villalobos Ramírez</small>
        </div>
        <div class="form-group col m-table">
            <label for="cargo-a">Cargo que Desempeña*</label>
            <input type="text" class=" form-control @error('cargo') is-invalid @enderror" id="cargo-a" placeholder="Introduce Cargo que Desempeña" name="cargo" value="{{ old('cargo',$directorio->cargo) }}">
            @error('cargo')  <div class="invalid-feedback">Por favor Introduce un Cargo Válido.</div>  @enderror
            <small  class="ml-3 form-text text-muted">Ejemplo: Secretario del Ayuntamiento</small>
        </div>
        <div class="row m-reset">
            <div class="form-group col-8 m-table">
                <label for="telefono-a">Teléfono de Contacto*</label>
                <input type="number" class=" form-control @error('phone') is-invalid @enderror" id="telefono-a" placeholder="Introduce el Número de Teléfono" name="phone" value="{{ old('phone',$directorio->tel_contacto) }}">
                @error('phone')  <div class="invalid-feedback">Por favor Introduce un Número Telefónico Válido.</div>  @enderror
              
                <small  class="ml-3 form-text text-muted">Ejemplo: 6920000</small>
            </div>
            <div class="form-group col-4 m-table">
                <label for="telefono-ext">Ext</label>
                <input type="number" class=" form-control @error('ext') is-invalid @enderror" id="telefono-ext" placeholder="Extención" maxlength="10" name="ext" value="{{ old('ext',$directorio->ext) }}">
                <small  class="ml-3 form-text text-muted">Ejemplo: 123</small>
            </div>   
        </div>
            
    </div>
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 m-table">
        <div class="form-group m-table">
            <label class="ml-3" for="telefono-a">Cargar Imagen*</label>
            
            <input class="form-control   @error('imagen') is-invalid @enderror d-none" type="file" accept="image/*" name="imagen" id="dir-img">
            
            <div class="col-12 text-center">
                <button type="button" class="d-block btn btn-info w-100" id="btn-directorio"><i class="fa fa-upload mr-1"></i> Seleccionar Archivo</button>
                <img class="img-fluid mt-2 mb-3" id="prev-img"  src="{{($directorio->img) ?? '' ? asset('web/img/directorio/'.$directorio->img) : '' }}" alt="" style="max-width:280px;">
            </div>
            @error('imagen')  <div class="invalid-feedback ml-5">La Imagen debe ser formato JPG, JGEP o PNG y pesar menos de 1MB.</div>  @enderror
        </div> 
    </div>
    
</div>
       
     