$("document").ready(function() {
/*    $("a#agregarProducto").click(function(event) {
        var id = $(this).attr("itemid");
        $.ajax({
            type: "POST",
            url: "panel/operacionesCarrito.php",
            data: "id_producto=" + id + "&operacion=agregarCarrito",
            async: false,
            success: function(datos) {
                alert("Articulo agregado a carrito");
                cargarCarrito();

            }
        });
        return false;
    });
    cargarCarrito();*/ObtenerImgsSlider();
});



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
	window.location.replace("http://localhost:8888/Eduardo/productos.php?prod="+producto+"&subproducto="+sub);
}


function ObtenerImgsSlider()
{
         
    $.ajax({
            type: "POST",
            url: "AccesoDatos/sliderDAO.php",
            data: "accion=obtenerSlider",
            async: false,
            dataType: "json",
            success: function(datos) {
                var slide='';

                $.each(datos, function(i, item) {
                     slide+=' <div class="ms-slide slide-1" data-delay="9"> ';
                     slide+=' <img src="js/masterslider/blank.html" data-src="'+item.Urlimg+'" alt=""/> ';
                     slide+=' <h3 class="ms-layer offerbadge orange-2" id="descCirAzul"';
                     slide+=' style="top: 350px; left:900px;"';
                     slide+=' data-type="text"';
                     slide+=' data-delay="1500"';
                     slide+=' data-ease="easeOutExpo"';
                     slide+=' data-duration="1230"';
                     slide+=' data-effect="scale(1.5,1.6)">Antes<br/>';
                   slide+='   <span class="price">$'+item.descCirAzul+'</span><br/>Descuento </h3>';
              
                     slide+=' <h3 class="ms-layer offerbadge two" id="descCirBlanco"';
                     slide+='style="top: 420px; left:1030px;"';
                     slide+='data-type="text"';
                     slide+='data-delay="2000"';
                     slide+=' data-ease="easeOutExpo"';
                     slide+='data-duration="1230"';
                     slide+='data-effect="scale(1.5,1.6)">Ahora<br/>';
                     slide+='<span class="price two">'+item.descCirBlanco+'</span><br/>Oferta</h3>';
              
                      slide+='<h3 class="ms-layer text1" id="Titulo"';
                      slide+='style="left: 140px;top: 200px;"';
                      slide+='data-type="text"';
                      slide+='data-delay="2500"';
                      slide+='data-ease="easeOutExpo"';
                      slide+='data-duration="1230"';
                      slide+='data-effect="scale(1.5,1.6)"> '+item.titulo+' </h3>';
                
                        slide+='  <h3 class="ms-layer text2 margin-top" id="subTitulo"';
                        slide+='       style="left: 140px;top: 240px;"';
                        slide+='       data-type="text"';
                        slide+='       data-delay="3000"';
                        slide+='       data-ease="easeOutExpo"';
                        slide+='       data-duration="1230"';
                        slide+='       data-effect="scale(1.5,1.6)"> '+item.subTitulo+' </h3>';
                    
                         slide+='<h3 class="ms-layer text3 align-left margin-top" id="descSlider" ';
                         slide+='   style="left: 140px; top: 310px;"';
                         slide+='   data-type="text"';
                         slide+='   data-effect="top(45)"';
                         slide+='   data-duration="2000"';
                         slide+='   data-delay="3500"';
                         slide+='   data-ease="easeOutExpo"> '+item.descripcion+'  </h3>';

                        slide+='</div>';
              });
                //alert(slide);
                $("#masterslider").html(slide);
                InicializarSlider();

            }
        });
                                   
}


function InicializarSlider()
{

    "use strict";
    var slider = new MasterSlider();
    // adds Arrows navigation control to the slider.
    slider.control('arrows');
    slider.control('bullets');
    
    slider.setup('masterslider' , {
         width:1400,    // slider standard width
         height:625,   // slider standard height
         space:0,
         speed:45,
         layout:'fillwidth',
         loop:true,
         preload:0,
         autoplay:true,
         view:"parallaxMask"
    });

}





