$("document").ready(function() {


 $("#EnviarCorreo").click(function() {
            EnviarCorreo();
        });

});



function EnviarCorreo()
{

   //$( "#resetMenu" ).trigger( "click" );
    $.ajax({
            type: "POST",
            url: "admin/php/enviaCorreo.php",
            data: $('#smart-form').serialize(),
            async: false,
            dataType: "json",
            success: function(datos) {

            }
        });
                                   
}