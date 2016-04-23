var imagen;
var idCat;
$("document").ready(function() {


 $('#tblProductos').DataTable();

 $('#fileupload').fileupload({
        url: 'php/uploadImages.php',
        dataType: 'json',
        formData: {directorio: '/../../images/Productos/'},
        done: function (e, data) {
            $.each(data.result.files, function (index, file) {
                $('<p/>').text(file.name).appendTo('#files');
                 $('#VistaPrevia').attr('src',file.thumbnailUrl);
                 urlImagen ='/images/Productos/'+file.name;
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

    listarTodosSubProductos();   
    ObtenerCategoria();
    $( "#cbProducto" ).change(function() {
        idCat=$(this).val();
        obtenerSubCategorias($(this).val());
    });

    $("#Guardar").click(function() {
        GuardaProducto();
    });


    $("#btnModalProd").click(function() {
       $('#modalProd').modal('show');
    });


});


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
                $("#cbProducto").html(cb);
                $('#cbProducto').selectpicker('refresh');

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
                  cb+='<option value='+item.idSub+'>'+item.descripcion+'</option>';
              });
                $("#cbSubProducto").html(cb);
                $('#cbSubProducto').selectpicker('refresh');
            }
        });
                                   
}

function GuardaProducto()
{

    $.ajax({
            type: "POST",
            url: "../AccesoDatos/productoDAO.php",
            data: "accion=GuardaProducto&"+$('#formAltaItem').serialize()+"&urlImagen="+urlImagen,
            async: false,
            dataType: "json",
            success: function(datos) {
                alert(datos.status)
                $('#modalProd').modal('hide');
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
               //alert(datos.SubProd.idSub);
                   $.each(datos, function(i, item) {

                    cuerpo += "<tr><td>"+item.id+"</td>";
                    cuerpo += "<tr><td>"+item.descripcion+"</td>";
                       $.each(datos.SubProd, function(i, item) {
                           cuerpo += "<td>"+item.id+"</td>";
                    });
                    cuerpo += "<td>"+item.SubProd+"</td>";
                    cuerpo += "<td>"+item.SubProd.Articulo.descripcion+"</td>";
                    cuerpo += "<td>"+item.SubProd.Articulo.costo+"</td>";
                    cuerpo += "<td><img src='../"+item.Producto.SubProd.Articulo.img+"' style='height:120px;width:120px;' /></td>";
                    cuerpo += "<td><button type='button' onclick='ObtenerItemSlide("+item.id+")' id='ObtenerItemSlide' class='btn btn-success'><i class='fa fa-plus-square-o'></i> Actualizar ";
                    cuerpo +="</button>";
                    cuerpo += " <br><br><button type='button' onclick='EliminarItemSlide("+item.id+")' id='ObtenerItemSlide' class='btn btn-danger'><i class='fa fa-plus-square-o'></i> Eliminar ";
                    cuerpo +="</button></td></tr>";
                });
                $("#cuerpoProductos").html(cuerpo);

            }
        });    
}


