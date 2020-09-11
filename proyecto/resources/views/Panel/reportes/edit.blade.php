@extends('panel.main')
@section('titulo') Reportes @endsection
@section('content')

<div class="pb-5">

    <a href="{{ route("reportes.index") }}" type="button" class="btn btn-danger mt-5"><i class="fa fa-arrow-left"></i> Regresar  </a>
            
    <form  class="mt-3 mb-5 pb-2" action="{{ route("reportes.update",$reporte->id) }}" method="POST" enctype='multipart/form-data'>
        @csrf
        @method('PUT')
        @include('panel.reportes._form')
        <input type="submit" value="Guardar Datos" class="btn btn-success mt-3 float-right">
    </form>

</div>
@endsection




@section('scripts')


<script>

window.onload = function (){
     
    $('#btn-pdf').click(function(){
        $("#pdf").click();
    });
        

    function readURL() {
        pdffile=document.getElementById("pdf").files[0];
        pdffile_url=URL.createObjectURL(pdffile);
        $('#pdf-view').attr('src',pdffile_url);
    }


    $("#pdf").change(function() {
        var contenedor =$('.pdf-v-p ');
        readURL(this);
    });
}

</script>

@endsection