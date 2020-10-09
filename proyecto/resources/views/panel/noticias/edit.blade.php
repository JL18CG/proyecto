@extends('panel.main')
@section('titulo') Noticias @endsection
@section('content')
<div class="mb-5">
    <a href="{{ route("noticias.index") }}" type="button" class="btn btn-danger mt-5"><i class="fa fa-arrow-left"></i> Regresar  </a>
            
    <form  class="mt-3 pb-5" action="{{ route("noticias.update",$noticia->id) }}" method="POST" enctype='multipart/form-data'>
        @csrf
        @method('PUT')
        @include('panel.noticias._form')
    
        <input type="submit" value="Actualizar Datos" class="btn btn-success mt-3 float-right">
    </form>
    
</div>




@endsection


@section('scripts')
<script src="{{ asset("web/editor/ckeditor.js") }}"></script>
<script>
    window.onload = function (){
        CKEDITOR.replace('contenido');	
    
        $('#btn-img').click(function(){
        $("#img").click();
    });
        
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader(); 
            reader.onload = function(e) {
                $('#blah').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }

    $("#img").change(function() {
        readURL(this);
    });
    
    
    
    
    }
</script>
@endsection