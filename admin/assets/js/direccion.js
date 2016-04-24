

$("document").ready(function() {

        $('#tblDireccion').DataTable( {
        "paging":   false,
        "ordering": false,
        "info":     false,
        "bFilter": false,
        });

        obternerDireccion();

       
     $("#btnModalDireccion").click(function() {
        $('#modalDireccion').modal('show');

      });

        $("#GuardarDireccion").click(function() {
            actualizarDireccion();
            obternerDireccion();
           });
    
 
});
                            
function obternerDireccion()
{

    $.ajax({
            type: "POST",
            url: "../AccesoDatos/direccionDAO.php",
            data: "accion=obtenerDireccion",
            async: false,
            dataType: "json",
            success: function(datos) {

                $("#calle").val(datos.calle);
                $("#col").val(datos.colonia);
                $("#noInt").val(datos.noInterior);
                $("#noExt").val(datos.noExterior);
                $("#cp").val(datos.codigoPostal);
                $("#estado").val(datos.estado);
                $("#pais").val(datos.Pais);
                $("#tel1").val(datos.Telefono1);
                $("#tel2").val(datos.Telefono2);
                $("#infoExtra").val(datos.informacionExtra);

                var cuerpo = "<td>"+datos.calle+"</td>";
                    cuerpo += "<td>"+datos.colonia+"</td>";
                    cuerpo += "<td>"+datos.noInterior+"</td>";
                    cuerpo += "<td>"+datos.noExterior+"</td>";
                    cuerpo += "<td>"+datos.codigoPostal+"</td>";
                    cuerpo += "<td>"+datos.estado+"</td>";
                    cuerpo += "<td>"+datos.Pais+"</td>";
                    cuerpo += "<td>"+datos.Telefono1+"</td>";
                    cuerpo += "<td>"+datos.Telefono2+"</td>";
                    cuerpo += "<td>"+datos.informacionExtra+"</td>";
                

                $("#CuerpoDireccion").html(cuerpo);
            }
        });
                                   
}


function actualizarDireccion()
{
    $.ajax({
            type: "POST",
            url: "../AccesoDatos/direccionDAO.php",
            data: "accion=actualizarDireccion&"+$('#formDireccion').serialize(),
            async: false,
            dataType: "json",
            success: function(datos) {
                if(datos.status==1)
                {
                     MiAlerta("Informacion Actualizada",1);
                     $('#modalDireccion').modal('hide');
                }else
                 MiAlerta("Ocurrio un error al actualizar",-1);
               
            }
        });
}














