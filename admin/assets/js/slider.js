var urlImagenslider;

$("document").ready(function() {



        

 $('#fileuploadSlider').fileupload({
        url: 'php/uploadImages.php',
        dataType: 'json',
        formData: {directorio: '/../../images/sliders/'},
        done: function (e, data) {
            $.each(data.result.files, function (index, file) {
                $('<p/>').text(file.name).appendTo('#files');
                 $('#VistaPrevia').attr('src',file.thumbnailUrl);
                 urlImagenslider ='images/sliders/'+file.name;
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


/*ObtenerProductos();
$( "#cbProducto" ).change(function() {

    ObtenerSubProductos($(this).val());
});
*/
    $("#GuardarSlider").click(function() {
        GuardarSlider();

        });

});


function Obtener()
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

function GuardarSlider()
{
    $.ajax({
            type: "POST",
            url: "../AccesoDatos/sliderDAO.php",
            data: "accion=GuardarSlider&"+$('#formImgSlider').serialize()+"&urlImagenslider="+urlImagenslider,
            async: false,
            dataType: "json",
            success: function(datos) {
                alert(datos.status)
                $('#modalAddSlider').modal('hide');
            }
        });
}


