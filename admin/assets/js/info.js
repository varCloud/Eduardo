

$("document").ready(function() {

        obterneVisionMision();
        $("#GuardarInfo").click(function() {
            actualizarMisionVision();
        });
});


function obterneVisionMision()
{

    $.ajax({
            type: "POST",
            url: "../AccesoDatos/infoDAO.php",
            data: "accion=obterneVisionMision",
            async: false,
            dataType: "json",
            success: function(datos) {
                $("#vision").val(datos.vision);
                $("#mision").val(datos.mision);
            }
        });
                                   
}


function actualizarMisionVision()
{
    $.ajax({
            type: "POST",
            url: "../AccesoDatos/infoDAO.php",
            data: "accion=actualizarMisionVision&"+$('#formInfoEmpresa').serialize(),
            async: false,
            dataType: "json",
            success: function(datos) {
                alert(datos.status)
                $('#modalInfoEmpresa').modal('hide');
            }
        });
}

