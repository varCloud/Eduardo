var urlImagenslider;
var idCate; // este campo es global es para  realizar actualizaciones y se asigna en ObtenerUnaCate

$("document").ready(function() {

MiAlerta('datos actualizados exitosamente',1);

ObtenerMenu();
ObtenerCategorias();
$("#btnAbreModalCate").click(function() {
    $( "#resetCate" ).trigger( "click" );
    $("#ActualizarCate").css('display','none');
    $("#GuardarCate").css('display','inline');
    $('#divAltaCate').modal('show');

});

$("#ActualizarCate").css('display','none');

$("#ActualizarCate").click(function() {
    GuardarCate(true)
});


 $("#GuardarCate").click(function() {
            GuardarCate(false);
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
                var cuerpo ="";
                   $.each(datos, function(i, item) {
                    cuerpo += "<option value="+item.idMenu+" >"+(i+1)+".- "+item.descripcion+"</option>";
                });
                $("#cbMenu").html(cuerpo);
                $('#cbMenu').selectpicker('refresh');     
            }
        });                                 
}


function ObtenerCategorias()
{
    $.ajax({
            type: "POST",
            url: "../AccesoDatos/menuDAO.php",
            data: "accion=ObtenerCategorias",
            async: false,
            dataType: "json",
            success: function(datos) {

                LimpiaTabla();
                var cuerpo ="";
                   $.each(datos, function(i, item) {
                    cuerpo += "<tr><td></td><td>"+i+"</td>";
                    cuerpo += "<td>"+item.descripcion+"</td>";
                    cuerpo += "<td>"+item.Categoria.descripcion+"</td>";
                    cuerpo += "<td><button type='button' onclick='ObtenerUnaCate("+item.Categoria.idCategoria+")' id='ObtenerCate' class='btn btn-success'><i class='fa fa-plus-square-o'></i> Actualizar ";
                    cuerpo +="</button>";
                    cuerpo += " &nbsp;&nbsp;&nbsp;<button type='button' onclick='EliminarCate("+item.Categoria.idCategoria+")' id='eliminarCate' class='btn btn-danger'><i class='fa fa-plus-square-o'></i> Eliminar ";
                    cuerpo +="</button></td></tr>";
                });
                $("#CuerpoAltaCate").html(cuerpo);
                 InicializaTabla();
                
            }
        });                                 
}

function ObtenerUnaCate(idCateAux)
{
   $( "#resetMenu" ).trigger( "click" );
    $.ajax({
            type: "POST",
            url: "../AccesoDatos/menuDAO.php",
            data: "accion=ObtenerUnaCate&idCate="+idCateAux,
            async: false,
            dataType: "json",
            success: function(datos) {
                 idCate=idCateAux;
                 $("#ActualizarCate").css('display','inline');
                 $("#GuardarCate").css('display','none');
                 $("#descripcionCate").val(datos.Categoria.descripcion);
                 $("#cbMenu").val(datos.idMenu);
                 $('#cbMenu').selectpicker('refresh');
                 $('#divAltaCate').modal('show');
            }
        });                                 
}

function GuardarCate(esActualizacion)
{
    $.ajax({
            type: "POST",
            url: "../AccesoDatos/menuDAO.php",
            data: "accion="+(esActualizacion ? 'ActualizaCate' :'GuardarCate')+"&"+$('#formAltaCate').serialize()+
            "&idCate="+idCate,
            async: false,
            dataType: "json",
            success: function(datos) {
                alert(datos.status)
                $('#divAltaCate').modal('hide');
                $("#resetCate").trigger("click");
                ObtenerCategorias();
            }
        });
}


function EliminarCate(idCateAux)
{
    $.ajax({
            type: "POST",
            url: "../AccesoDatos/menuDAO.php",
            data: "accion=EliminarCate&idCate="+idCateAux,
            async: false,
            dataType: "json",
            success: function(datos) {
               if(datos.status == 1)
                {
                    ObtenerCategorias();
                }
            }
        });
}



function LimpiaTabla()
{
     $('#tblAltaCate').DataTable().clear().destroy();
}

function InicializaTabla()
{
    
     $('#tblAltaCate').DataTable({
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







