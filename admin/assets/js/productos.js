var imagen;
var idCat;
var ImagenTemporal;
var idProd;
var urlImagen;
var esActualizacion = false;
$("document").ready(function() {


 listarTodosSubProductos();   

 $( "#resetProd" ).css( "display",'none' );
 $("#eliminarImagenProd").css('display','none');
 $("#ActualizaProd").css('display','none');


 $('#fileupload').fileupload({
        url: 'php/uploadImages.php',
        dataType: 'json',
        formData: {directorio: '/../../images/Productos/'},
        done: function (e, data) {
            $.each(data.result.files, function (index, file) {
                $('<p/>').text(file.name).appendTo('#files');
                 $('#VistaPrevia').attr('src',file.thumbnailUrl);
                 urlImagen ='images/Productos/'+file.name;
                 ImagenTemporal = 'images/Productos/thumbnail/'+file.name;
                 $("#eliminarImagenProd").css('display','inline');
            });
        },
        progressall: function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('#progress .progress-bar').css(
                'width',
                progress + '%'
            );
        }
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');


    ObtenerCategoria();

    $( "#cbCate" ).change(function() {
        idCat=$(this).val();
        obtenerSubCategorias($(this).val());
    });

    $("#Guardar").click(function() {
        GuardaProducto(false);
    });


    $("#btnModalProd").click(function() {
       $("#resetProd").trigger( "click" );
       $('#VistaPrevia').attr('src','');
       $('#files').html('');
       $('#progress .progress-bar').css('width',0);
       $( "#cbCate" ).val(0)
       $('#cbCate').selectpicker('refresh');
       $('#cbCate').change();
       $('#modalProd').modal('show');
    });


    $("#eliminarImagenProd").click(function() {
        EliminarImagen(esActualizacion);
    });

    $("#ActualizaProd").click(function() {
         GuardaProducto(true);
    });

});


function EliminarImagen(esActualizacion)
{
        $.ajax({
            type: "POST",
            url: "../AccesoDatos/productoDAO.php",
            data: "accion=EliminarImagen&urlImagen="+urlImagen+"&ImagenTemporal="+ImagenTemporal+"&esActualizacion="+esActualizacion,
            async: false,
            dataType: "json",
            success: function(datos) {

                if(datos.status >= 2)
                {
                      MiAlerta("Imagen Eliminada exitosamente",1);
                      $('#VistaPrevia').attr('src','');
                      $("#eliminarImagenProd").css('display','none');
                      $('#files').html('');
                      $('#progress .progress-bar').css('width',0);
                      $("#divInput").css('display','block');
                }
                else
                     MiAlerta("Ocurrio un error al eliminar la imagen",1);
            
            }
        });
}


function ObtenerCategoria()
{
    $.ajax({
            type: "POST",
            url: "../AccesoDatos/menuDAO.php",
            data: "accion=ObtenerCategorias",
            async: false,
            dataType: "json",
            success: function(datos) {
                //alert(datos[0].id)
                var cb='';
                 $.each(datos, function(i, item) {
                  cb+='<option value='+item.Categoria.idCategoria+'>'+item.Categoria.descripcion+'</option>';
              });
                $("#cbCate").html(cb);
                $('#cbCate').selectpicker('refresh');

            }
        });
                                   
}

function obtenerSubCategorias(idCat)
{
    $.ajax({
            type: "POST",
            url: "../AccesoDatos/productoDAO.php",
            data: "accion=obtenerSubCategorias&idCat="+idCat,
            async: false,
            dataType: "json",
            success: function(datos) {
                var cb='';
                 $.each(datos, function(i, item) {
                  cb+='<option value='+item.idSubCategoria+'>'+item.descripcion+'</option>';
              });
                $("#cbSubCate").html(cb);
                $('#cbSubCate').selectpicker('refresh');
            }
        });                                 
}


function ObtenerUnProducto(idProdAux)
{
   $( "#resetMenu" ).trigger( "click" );
    $.ajax({
            type: "POST",
            url: "../AccesoDatos/productoDAO.php",
            data: "accion=ObtenerUnProducto&idProd="+idProdAux,
            async: false,
            dataType: "json",
            success: function(datos) {
                 idProd=idProdAux;
                 $("#ActualizaProd").css('display','inline');
                 $("#Guardar").css('display','none');
                 $("#eliminarImagenProd").css('display','inline');
                 $("#divInput").css('display','none');

                 $("#desc").val(datos.SubCategoria.Articulo.descripcion);
                 $("#costo").val(datos.SubCategoria.Articulo.costo);

                 $('#VistaPrevia').attr('src','../'+datos.SubCategoria.Articulo.img);
                 urlImagen=datos.SubCategoria.Articulo.img;
                 $("#cbCate").val(datos.idCategoria);
                 $('#cbCate').selectpicker('refresh');
                 $('#cbCate').change();

                 $("#cbSubCate").val(datos.SubCategoria.idSubCategoria);
                 $('#cbSubCate').selectpicker('refresh');
                 esActualizacion = true;
                 $('#modalProd').modal('show');
            }
        });                                 
}


function GuardaProducto(esActualizacionAux)
{

    $.ajax({
            type: "POST",
            url: "../AccesoDatos/productoDAO.php",
            data: "accion="+(esActualizacionAux ? 'ActualizaProd' :'GuardaProducto')+"&"+$('#formAltaItem').serialize()+"&urlImagen="+urlImagen+"&idProd="+idProd,
            async: false,
            dataType: "json",
            success: function(datos) {
                if(datos.status == 1)
                {
                    $('#modalProd').modal('hide');
                    $( "#resetProd" ).trigger( "click" );
                    MiAlerta("Producto agregado exitosamente",1);
                    listarTodosSubProductos();
                }else
                      MiAlerta("Ocurrio un error al guardar el producto",-1);
            }
        });
}


function listarTodosSubProductos()
{
    $.ajax({
            type: "POST",
            url: "../AccesoDatos/productoDAO.php",
            data: "accion=listarTodosSubProductos",
            async: false,
            dataType: "json",
            success: function(datos) {
               var cuerpo ="";
               LimpiaTabla();
                   $.each(datos, function(i, item) {
                    cuerpo += "<tr><td>"+item.descripcion+"</td>";
                    cuerpo += "<td>"+item.SubCategoria.descripcion+"</td>";
                    cuerpo += "<td>"+item.SubCategoria.Articulo.descripcion+"</td>";
                    cuerpo += "<td>"+item.SubCategoria.Articulo.costo+"</td>";
                    cuerpo += "<td><img src='../"+item.SubCategoria.Articulo.img+"' style='height:80px;width:80px;' /></td>";
                    cuerpo += "<td><button type='button' onclick='ObtenerUnProducto("+item.SubCategoria.Articulo.id+")' id='ObtenerItemSlide' class='btn btn-success'><i class='fa fa-plus-square-o'></i> Actualizar ";
                    cuerpo +="</button>";
                    cuerpo += " &nbsp;&nbsp;&nbsp;<button type='button' onclick='EliminarItemSlide("+item.SubCategoria.Articulo.id+")' id='ObtenerItemSlide' class='btn btn-danger'><i class='fa fa-plus-square-o'></i> Eliminar ";
                    cuerpo +="</button></td></tr>";
                });
                $("#cuerpoProductos").html(cuerpo);
                InicializaTabla();

            }
        });    
}


function LimpiaTabla()
{
   $('#tblProductos').DataTable().clear().destroy();
}

function InicializaTabla()
{
    
     $('#tblProductos').DataTable({
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



