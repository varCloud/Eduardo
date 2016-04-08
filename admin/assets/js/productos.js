$("document").ready(function() {

 $('#fileupload').fileupload({
        url: 'php/uploadImages.php',
        dataType: 'json',
        done: function (e, data) {
            $.each(data.result.files, function (index, file) {
                $('<p/>').text(file.name).appendTo('#files');
                 $('#VistaPrevia').attr('src',file.thumbnailUrl);
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


ObtenerProductos();
$( "#cbProducto" ).change(function() {

    ObtenerSubProductos($(this).val());

});

});


function ObtenerProductos()
{

    $.ajax({
            type: "POST",
            url: "../AccesoDatos/productoDAO.php",
            data: "accion=obtenerProductos",
            async: false,
            dataType: "json",
            success: function(datos) {
                //alert(datos[0].id)
                var cb='';
                 $.each(datos, function(i, item) {
                  cb+='<option value='+item.id+'>'+item.descripcion+'</option>';
              });
                $("#cbProducto").html(cb);

            }
        });
                                   
}


function ObtenerSubProductos(idProd)
{

    $.ajax({
            type: "POST",
            url: "../AccesoDatos/productoDAO.php",
            data: "accion=obtenerSubProductos&idProd="+idProd,
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