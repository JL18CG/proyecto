@if (session('status'))
<div class="position-fixed alerta alert alert-success alert-dismissible fade show" role="alert">
            <strong> <i class="fa fa-check mr-2"> &nbsp;</i> </strong>  {{ session('status') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <small> <i class="fa fa-times"></i> </small> 
    </button>
</div>
@endif


@if ($errors->any())
    <div class="position-fixed alerta alert alert-danger alert-dismissible fade show" role="alert">
                <strong> <i class="fa fa-exclamation-circle ml-1"> &nbsp;</i> </strong>  Se Encontraron Errores
               
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <small> <i class="fa fa-times"></i> </small> 
        </button>
    </div>
@endif