$( "#menu-d" ).click(function(event) {
    $("#lateral").toggleClass("ocultar");
    event.preventDefault();
});



$(document).on("click",function(e) {
                    
    var container = $("#lateral");
    var menu = $( "#menu-d" );
       if (!container.is(e.target) && container.has(e.target).length === 0) { 

        if (!menu.is(e.target) && menu.has(e.target).length === 0) { 

            $("#lateral").addClass("ocultar");
      
        }
      
       }
});





setTimeout(function(){ 
    $( ".alerta" ).fadeOut( "slow",function() { });
}, 15000);