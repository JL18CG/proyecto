$( document ).ready(function() {
    setTimeout(function(){ 
        $( ".alerta" ).fadeOut( "slow",function() { });
    }, 15000);
    setTimeout(function(){ 

        $( "#preloader-page" ).fadeOut( "slow");
    }, 1200);
    $("#div2").fadeOut("slow");
});
