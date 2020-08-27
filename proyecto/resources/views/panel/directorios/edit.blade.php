@extends('panel.main')
@section('titulo') Directorios @endsection

@section('content')
<div>
    <a href="{{ route("directorios.index") }}" type="button" class="btn btn-danger mt-5"><i class="fa fa-arrow-left"></i> Regresar  </a>
    
    <form  class="mt-3 pb-5" action="{{ route("directorios.update",$directorio->id) }}" method="POST" enctype='multipart/form-data'>
        @csrf
        @method('PUT')
        @include('panel.directorios._form')
    
        <input type="submit" value="Guardar Datos" class="btn btn-success mt-3 float-right">
    </form>
    
</div>




@endsection




@section('scripts')
    <script>
        $('#btn-directorio').click(function(){
            $("#dir-img").click();
        });

        function getURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader(); 
                reader.onload = function(e) {
                    $('#prev-img').attr('src', e.target.result);
                }
                
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#dir-img").change(function() {
            getURL(this);           
           
        });



        var input=  document.getElementById('telefono-a');
        input.addEventListener('input',function(){
        if (this.value.length > 10) 
        this.value = this.value.slice(0,10); 
        })


        var input=  document.getElementById('telefono-ext');
        input.addEventListener('input',function(){
        if (this.value.length > 3) 
        this.value = this.value.slice(0,3); 
        })
    </script>
@endsection
