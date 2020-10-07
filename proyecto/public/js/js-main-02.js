$("#mainNav").addClass("navbar-scrolled");
setTimeout(function(){ 

    $( "#preloader-page" ).fadeOut( "slow");
}, 1000);
$("#div2").fadeOut("slow");
    $("#f-publico").click(function(event){
        event.preventDefault();
        $("#formFuncionario").show();
        $("#formVialidad").hide();
        $("#formServicios").hide();
        $("#formPagina").hide();
      });
      $("#f-vialidad").click(function(event){
        event.preventDefault();
        $("#formFuncionario").hide();
        $("#formVialidad").show();
        $("#formServicios").hide();
        $("#formPagina").hide();
      });
      $("#f-servicios").click(function(event){
        event.preventDefault();
        $("#formFuncionario").hide();
        $("#formVialidad").hide();
        $("#formServicios").show();
        $("#formPagina").hide();
      });
      $("#f-pagina").click(function(event){
        event.preventDefault();
        $("#formFuncionario").hide();
        $("#formVialidad").hide();
        $("#formServicios").hide();
        $("#formPagina").show();
      });