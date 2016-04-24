$("document").ready(function() {


        $.ajax({
            type: "POST",
            url: "AccesoDatos/infoDAO.php",
            data: "accion=InformacionEmpresa&campo="+$("#campo").val(),
            async: false,
            dataType: "json",
            success: function(datos) {
                //datos=JSON.parse(datos);
            	//alert(datos.info)
            	$("#"+$("#campo").val()).html(datos.info);
            }
        });
        return false;
    });
