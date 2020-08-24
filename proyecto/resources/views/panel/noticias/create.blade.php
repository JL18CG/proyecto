@extends('panel.main')
@section('titulo') Noticias @endsection
@section('content')
<div>
    <a href="{{ route("noticias.index") }}" type="button" class="btn btn-danger mt-5"><i class="fa fa-arrow-left"></i> Regresar  </a>
            
    <form  class="mt-3 mb-5" action="{{ route("noticias.store") }}" method="POST" enctype='multipart/form-data'>
        @csrf
        @include('panel.noticias._form')
    
        <input type="submit" value="Guardar Datos" class="btn btn-success">
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