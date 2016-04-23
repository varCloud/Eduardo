var urlImagenslider;

$("document").ready(function() {




$("#btnAddSlider").click(function() {
    $('#modalAddSlider').modal('show');

});

 $('#tableSlider').DataTable( {
        "paging":   false,
        "ordering": false,
        "info":     false
        });


 ObtenerSliders();
 $('#fileuploadSlider').fileupload({
        url: 'php/uploadImages.php',
        dataType: 'json',
        formData: {directorio: '/../../images/sliders/'},
        done: function (e, data) {
            $.each(data.result.files, function (index, file) {
                $('<p/>').text(file.name).appendTo('#files');
                 $('#VistaPrevia').attr('src',file.thumbnailUrl);
                 urlImagenslider ='images/sliders/'+file.name;
                 $("#eliminarImagenSlide").css('display','inline');
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
    
    $("#GuardarSlider").click(function() {
        GuardarSlider();
        ObtenerSliders();
        });

    $("#eliminarImagenSlide").click(function() {
            EliminarImgSlider();
        });

});

function ObtenerSliders()
{
    $.ajax({
            type: "POST",
            url: "../AccesoDatos/sliderDAO.php",
            data: "accion=obtenerSlider",
            async: false,
            dataType: "json",
            success: function(datos) {
                var cuerpo ="";
                   $.each(datos, function(i, item) {
                    cuerpo += "<tr><td>"+item.titulo+"</td>";
                    cuerpo += "<td>"+item.subTitulo+"</td>";
                    cuerpo += "<td>"+item.descCirAzul+"</td>";
                    cuerpo += "<td>"+item.descCirBlanco+"</td>";
                    cuerpo += "<td>"+item.descripcion+"</td>";
                    cuerpo += "<td><img src='../"+item.Urlimg+"' style='height:120px;width:120px;' /></td>";
                    cuerpo += "<td><button type='button' onclick='ObtenerItemSlide("+item.id+")' id='ObtenerItemSlide' class='btn btn-success'><i class='fa fa-plus-square-o'></i> Actualizar ";
                    cuerpo +="</button>";
                    cuerpo += " <br><br><button type='button' onclick='EliminarItemSlide("+item.id+")' id='ObtenerItemSlide' class='btn btn-danger'><i class='fa fa-plus-square-o'></i> Eliminar ";
                    cuerpo +="</button></td></tr>";
                });
                $("#cuerpoSlider").html(cuerpo);
            }
        });
                                   
}

function ObtenerItemSlide(idSlide)
{
   $( "#resetSlider" ).trigger( "click" );
    $.ajax({
            type: "POST",
            url: "../AccesoDatos/sliderDAO.php",
            data: "accion=ObtenerItemSlider&idSlide="+idSlide,
            async: false,
            dataType: "json",
            success: function(datos) {
                 $("#titulo").val(datos.titulo);
                 $("#subTitulo").val(datos.subTitulo);
                 $("#descSlider").val(datos.descripcion);
                 $("#descCirAzul").val(datos.descCirAzul);
                 $("#descCirBlanco").val(datos.descCirBlanco);
                 $('#VistaPrevia').attr('src','../'+datos.Urlimg);
                 $('#modalAddSlider').modal('show');
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


function EliminarImgSlider()
{
    $.ajax({
            type: "POST",
            url: "../AccesoDatos/sliderDAO.php",
            data: "accion=EliminarImgSlider&url="+ $('#VistaPrevia').attr('src'),
            async: false,
            dataType: "json",
            success: function(datos) {
               if(datos == 1)
                {
                    $('#modalAddSlider').modal('hide');
                    $("#eliminarImagenSlide").css('display','none');
                    ObtenerSliders();
                }
            }
        });
}


