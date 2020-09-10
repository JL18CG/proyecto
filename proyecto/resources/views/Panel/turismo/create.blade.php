@extends('panel.main')
@section('titulo') Turismo @endsection
@section('content')

<div class="pb-5">

    <a href="{{route('turismo.inicio')}}" type="button" class="btn btn-danger mt-5"><i class="fa fa-arrow-left"></i> Regresar  </a>
            
    <form  class="mt-3 mb-5 pb-2" action=" {{route('eventos.store')}}" method="POST" enctype='multipart/form-data'>
        @csrf
        @include('panel.turismo._form')
        <input type="submit" value="Guardar Datos" class="btn btn-success mt-3 float-right">
    </form>



</div>

@endsection


@section('scripts')
<script>

    window.onload = function (){

        $('#btn-img-e').click(function(){
            $("#img-e").click();
        });
            
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader(); 
                reader.onload = function(e) {
                    $('#prev-evt').attr('src', e.target.result);
                }
                
                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }
    
        $("#img-e").change(function() {
            readURL(this);
        });
    }
    
    
</script>
@endsection