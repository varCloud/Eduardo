$("document").ready(function() {

        $('#tblInfoEmpresa').DataTable( {
        "paging":   false,
        "ordering": false,
        "info":     false,
        "bFilter": false,
        });

        obterneVisionMision();
        $("#GuardarInfo").click(function() {
            actualizarMisionVision();
        });

        $("#btnAbremodalInfoEmp").click(function() {
             $('#modalInfoEmp').modal('show');
         
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
                var cuerpo = "<td></td><td>"+datos.mision+"</td>"+"<td>"+datos.vision+"</td>"
                $("#CuerpoInfoEmpresa").html(cuerpo);
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
             if(datos.status == 1)
             {
                 MiAlerta("Informacion Actualizada",1);
                $('#modalInfoEmp').modal('hide');
             }else
              MiAlerta("Ocurrio un error al actualizar",1);
                
            }
        });
}

