function CargarPagina(url)
{
	$("#Contendor").load(url, function(response, status, xhr) {
	  if (status == "error") {
	       alert(msg + xhr.status + " " + xhr.statusText);
	      //console.log(msg + xhr.status + " " + xhr.statusText);
	  }
	});
}

function CargarProductos(producto,sub) {
	window.location.replace("http://localhost/Eduardo/productos.php?prod="+producto+"&subproducto="+sub);
}


function ObtenerImgsSlider()
{

    $.ajax({
            type: "POST",
            url: "../AccesoDatos/sliderDAO.php",
            data: "accion=obtenerSlide",
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


