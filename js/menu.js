// tipo menu 1  como el del blob
//tipo menu 2 como el del productos
$("document").ready(function() {
    obtenerMenu();
});

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
                        menu+='<li class="dropdown"> <a href="index.php" class="dropdown-toggle">'+item.descripcion+'</a>';
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
                                        menu+='<li><a href="#"  onclick="CargarPaginaProductos('+cat.idCategoria+','+sub.idSubCategoria+')" ><i class="fa fa-angle-right"></i> &nbsp; '+sub.descripcion+'</a></li>';
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


function CargarPaginaProductos(producto,sub) {
    location.href = "http://localhost:8888/Eduardo/productos.php?prod="+producto+"&subproducto="+sub;
}
	//window.location.replace("http://localhost:8888/Eduardo/productos.php?prod="+producto+"&subproducto="+sub);







