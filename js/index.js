// tipo menu 1  como el del blob
//tipo menu 2 como el del productos
$("document").ready(function() {

    obtenerMenu();
    ObtenerImgsSlider();
});
/*
function obtenerMenu()
{
    var contadorRow =0;
    $.ajax({
            type: "POST",
            url: "AccesoDatos/menuDAO.php",
            data: "accion=cargarMenu",
            async: false,
            dataType: "json",
            success: function(datos) {
                 var menu='';              
                  $.each(datos, function(i, item) {

                    if(item.tipoMenu=='2'){
                         menu+='<li class="dropdown yamm-fw"> <a href="index.php" class="dropdown-toggle active">'+item.descripcion+'</a>';
                         menu+='<ul class="dropdown-menu">';
                         menu+='<li>';
                         menu+='<div class="yamm-content">';
                        
                     }else
                     {
                        menu+='<li class="dropdown"> <a href="portfolio-three.html" class="dropdown-toggle">'+item.descripcion+'</a>';
                        menu+='<ul class="dropdown-menu" role="menu">';
                     }
                         $.each(item.Categoria, function(i, cat) {
                            if(item.tipoMenu == 2 )
                            {
                                if(contadorRow == 0)
                                    menu += '<div class="row">';
//              ESTA VALIDACION ES PARA ACOMODAR  UN ITEM DEL MENU CUANDO TIENE MAS DE 17 CARACTERES
                                if(cat.descripcion.length >=18)
                                   menu+='<ul class="col-sm-6 col-md-3 list-unstyled ">';
                               else
                                   menu+='<ul class="col-sm-6 col-md-2 list-unstyled ">';
                                
                                menu+='       <li>';
                                menu+='         <p>'+cat.descripcion+'</p>';
                                menu+=' </li>';
                                if(cat.SubCategoria.length >0)
                                {
                                      $.each(cat.SubCategoria, function(i, sub) {
                                        menu+='<li><a href="#"  onclick="CargarProductos('+cat.idCategoria+','+sub.idSubCategoria+')" ><i class="fa fa-angle-right"></i> &nbsp; '+sub.descripcion+'</a></li>';
                                      });
                                }
                                 menu+=' </ul>';
                                 contadorRow++;
                                 if(contadorRow == 5)
                                 {
                                        menu+='</div><br>';
                                        contadorRow=0;
                                 }

                             }
                             else
                             {
                                //Cuando el menu es vertical o es tipo 1  no cargara ningun producto por lo tanto
                                //el archivo que cargara debera llamarse igual que su descripcion
                                //por ejmplo MISION.php , Vision.php y asi 
                                menu+='<li> <a href="'+cat.descripcion+'.php">'+cat.descripcion+'</a> </li>';
                             }
                         });

                         if(item.tipoMenu == 2)
                         {
                             menu+=' </div>';
                             menu+=' </li>';
                             menu+=' </ul>';

                         }else
                            {
                                menu+='</ul>'
                            }
                    });

               //alert(menu);
               $("#cuerpoMenu").html(menu);
               InicarMenu();

            }


          });

}

 function InicarMenu()
 {
    $('.dropdown-submenu').hover(function () {
        if ($(window).width() >= 479) {
            var p = $(this);
            var offset = p.offset();

            var multiLeft = offset.left;
            var multilevelWidth = $(".multilevel").width();
            var sublevelWidth = $(this).find(".dropdown-menu").width();

            var allWidth = multiLeft + multilevelWidth + sublevelWidth;

            if ($(window).width() <= allWidth) {
                $(this).find(".dropdown-menu").css("marginLeft", "-" + (multilevelWidth + sublevelWidth) + "px");
            } else {
                $(".dropdown-submenu>.dropdown-menu").css("marginLeft", " ");
            }
        } else {
            $(".dropdown-submenu>.dropdown-menu").css("marginLeft", " ");
        }
    });    
    

 }
*/
function CargarPagina(url)
{
	$("#Contendor").load(url, function(response, status, xhr) {
	  if (status == "error") {
	       alert(msg + xhr.status + " " + xhr.statusText);
	       //console.log(msg + xhr.status + " " + xhr.statusText);
	  }
	});
}
/*
function CargarProductos(producto,sub) {
	window.location.replace("http://localhost:8888/Eduardo/productos.php?prod="+producto+"&subproducto="+sub);
}
*/

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





