var urlImagenslider;
var idSubCate; // este campo es global es para  realizar actualizaciones y se asigna en ObtenerUnaCate

$("document").ready(function() {

ObtenerCategorias();
ObtenerSubCategorias();
$("#btnAbreModalSubCate").click(function() {
    $( "#resetSubCate" ).trigger( "click" );
    $("#ActualizarSubCate").css('display','none');
    $("#GuardarSubCate").css('display','inline');
    $('#divAltaSubCate').modal('show');

});

$("#ActualizarSubCate").css('display','none');

$("#ActualizarSubCate").click(function() {
    GuardarCate(true)
});


 $("#GuardarSubCate").click(function() {
            GuardarCate(false);
            ObtenerSubCategorias();
        });

});

function ObtenerCategorias()
{
    $.ajax({
            type: "POST",
            url: "../AccesoDatos/menuDAO.php",
            data: "accion=ObtenerCategorias",
            async: false,
            dataType: "json",
            success: function(datos) {
                var cuerpo ="";
                   $.each(datos, function(i, item) {
                    cuerpo += "<option value="+item.Categoria.idCategoria+" >"+(i+1)+".- "+item.Categoria.descripcion+"</option>";
                });
                $("#cbCate").html(cuerpo);
                $('#cbCate').selectpicker('refresh');     
            }
        });                                 
}


function ObtenerSubCategorias()
{
    $.ajax({
            type: "POST",
            url: "../AccesoDatos/menuDAO.php",
            data: "accion=ObtenerSubCategorias",
            async: false,
            dataType: "json",
            success: function(datos) {

                LimpiaTabla();
                var cuerpo ="";
                   $.each(datos, function(i, item) {
                    cuerpo += "<tr><<td>"+(i+1)+"</td>";
                    cuerpo += "<td>"+item.descripcion+"</td>";
                    cuerpo += "<td>"+item.Categoria.descripcion+"</td>";
                    cuerpo += "<td>"+item.Categoria.SubCategoria.descripcion+"</td>";
                    cuerpo += "<td><button type='button' onclick='ObtenerUnaSubCate("+item.Categoria.SubCategoria.idSubCategoria+")' id='ObtenerCate' class='btn btn-success'><i class='fa fa-plus-square-o'></i> Actualizar ";
                    cuerpo +="</button>";
                    cuerpo += " &nbsp;&nbsp;&nbsp;<button type='button' onclick='EliminarSubCate("+item.Categoria.SubCategoria.idSubCategoria+")' id='eliminarCate' class='btn btn-danger'><i class='fa fa-plus-square-o'></i> Eliminar ";
                    cuerpo +="</button></td></tr>";
                });
                $("#CuerpoAltaSubCate").html(cuerpo);
                 InicializaTabla();
                
            }
        });                                 
}

function ObtenerUnaSubCate(idSubCateAux)
{
   $( "#resetMenu" ).trigger( "click" );
    $.ajax({
            type: "POST",
            url: "../AccesoDatos/menuDAO.php",
            data: "accion=ObtenerUnaSubCate&idSubCate="+idSubCateAux,
            async: false,
            dataType: "json",
            success: function(datos) {
                 idSubCate=idSubCateAux;
                 $("#ActualizarSubCate").css('display','inline');
                 $("#GuardarSubCate").css('display','none');
                 $("#descripcionSubCate").val(datos.SubCategoria.descripcion);
                 $("#cbCate").val(datos.idCategoria);
                 $('#cbCate').selectpicker('refresh');
                 $('#divAltaSubCate').modal('show');
            }
        });                                 
}

function GuardarCate(esActualizacion)
{
    $.ajax({
            type: "POST",
            url: "../AccesoDatos/menuDAO.php",
            data: "accion="+(esActualizacion ? 'ActualizaSubCate' :'GuardarSubCate')+"&"+$('#formAltaSubCate').serialize()+
            "&idSubCate="+idSubCate,
            async: false,
            dataType: "json",
            success: function(datos) {
                alert(datos.status)
                $('#divAltaSubCate').modal('hide');
                $("#resetSubCate").trigger("click");
                ObtenerSubCategorias();
            }
        });
}

function EliminarSubCate(idSubCateAux)
{
    $.ajax({
            type: "POST",
            url: "../AccesoDatos/menuDAO.php",
            data: "accion=EliminarSubCate&idSubCate="+idSubCateAuxi,
            async: false,
            dataType: "json",
            success: function(datos) {
               if(datos.status == 1)
                {
                    ObtenerSubCategorias();
                }
            }
        });
}



function LimpiaTabla()
{
     $('#tblAltaSubCate').DataTable().clear().destroy();
}

function InicializaTabla()
{
    
     $('#tblAltaSubCate').DataTable({
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







