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
            var cb ='<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">';
                cb+='Dropdown';
                cb+='<span class="caret"></span>';
                cb+='</button>';
                cb+='<ul class="dropdown-menu" role="menu">';

                 $.each(datos, function(i, item) {
                  cb+='<li><a href="#">'+item.descripcion+'</a></li>';
  
              });
                cb+='</ul>';
                $("#cbProducto").html(cb);
            }
        });
                                   
}