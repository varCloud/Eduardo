var urlImagenslider;
var idMenu;

$("document").ready(function() {


 ObtenerMenu();

$("#btnAbreModalItemMenu").click(function() {
    $( "#resetMenu" ).trigger( "click" );
    $("#ActualizarItemMenu").css('display','none');
    $("#GuardarItemMenu").css('display','inline');
    $('#divAltaItemMenu').modal('show');

});


$("#ActualizarItemMenu").css('display','none');

$("#ActualizarItemMenu").click(function() {
    GuardarItemMenu(true)
});


 $("#GuardarItemMenu").click(function() {
            GuardarItemMenu(false);
            ObtenerMenu();
        });

});

function ObtenerMenu()
{
    $.ajax({
            type: "POST",
            url: "../AccesoDatos/menuDAO.php",
            data: "accion=ObtenerMenu",
            async: false,
            dataType: "json",
            success: function(datos) {

                LimpiaTabla();
                var cuerpo ="";
                   $.each(datos, function(i, item) {
                    cuerpo += "<tr><td>"+i+"</td>";
                    cuerpo += "<td>"+item.descripcion+"</td>";
                    cuerpo += "<td>"+(item.tipoMenu == 1 ? 'Vertical' : 'Horizontal')+"</td>";
                    cuerpo += "<td><button type='button' onclick='ObtenerUnMenu("+item.idMenu+")' id='ObtenerItemSlide' class='btn btn-success'><i class='fa fa-plus-square-o'></i> Actualizar ";
                    cuerpo +="</button>";
                    cuerpo += " &nbsp;&nbsp;&nbsp;<button type='button' onclick='EliminarItemMenu("+item.idMenu+")' id='ObtenerItemSlide' class='btn btn-danger'><i class='fa fa-plus-square-o'></i> Eliminar ";
                    cuerpo +="</button></td></tr>";
                });
                $("#CuerpoAltaMenu").html(cuerpo);
                 InicializaTabla();
                
            }
        });
                                   
}

function ObtenerUnMenu(idMenuAux)
{
   $( "#resetMenu" ).trigger( "click" );
    $.ajax({
            type: "POST",
            url: "../AccesoDatos/menuDAO.php",
            data: "accion=ObtenerUnMenu&idMenu="+idMenuAux,
            async: false,
            dataType: "json",
            success: function(datos) {
                 idMenu=idMenuAux;
                 $("#ActualizarItemMenu").css('display','inline');
                 $("#GuardarItemMenu").css('display','none');
                 $("#descripcionMenu").val(datos.descripcion);
                 $("#cbTipoMenu").val(datos.tipoMenu);
                 $('#cbTipoMenu').selectpicker('refresh')
                 $('#divAltaItemMenu').modal('show');
            }
        });
                                   
}

function GuardarItemMenu(esActualizacion)
{
    $.ajax({
            type: "POST",
            url: "../AccesoDatos/menuDAO.php",
            data: "accion="+(esActualizacion ? 'ActualizaItemMenu' :'GuardarItemMenu')+"&"+$('#formAltaItemMenu').serialize()+
            "&idMenu="+idMenu,
            async: false,
            dataType: "json",
            success: function(datos) {
                alert(datos.status)
                $('#divAltaItemMenu').modal('hide');
                $("#resetMenu").trigger("click");
                ObtenerMenu();
            }
        });
}


function EliminarItemMenu(idMenu)
{
    $.ajax({
            type: "POST",
            url: "../AccesoDatos/menuDAO.php",
            data: "accion=EliminarItemMenu&idMenu="+idMenu,
            async: false,
            dataType: "json",
            success: function(datos) {
               if(datos.status == 1)
                {
                    ObtenerMenu();
                }
            }
        });
}



function LimpiaTabla()
{
     $('#tblAltaMenu').DataTable().clear().destroy();
}

function InicializaTabla()
{
    
     $('#tblAltaMenu').DataTable({
      "language": {
            "lengthMenu": "Muestra _MENU_ registros por pagina",
            "zeroRecords": "No existe registro - sorry",
            "info": "Pagina _PAGE_ de _PAGES_",
            "infoEmpty": "No existe informacion para mostrar",
            "infoFiltered": "(filtered from _MAX_ total records)",
            "search":         "Buscar:",
            "paginate": {
                            "first":      "First",
                            "last":       "Last",
                            "next":       "Siguiente",
                            "previous":   "Anterior"
                        },
        },
        "bDestroy": true, // es necesario para poder ejecutar la funcion LimpiaTabla()
     });
}







