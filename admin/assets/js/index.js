$("document").ready(function() {

    //MiAlerta('datos actualizados exitosamente',-1);
});



function MiAlerta(msj,status)
{
    setTimeout(function() {
        toastr.options = {
            closeButton: false,
            progressBar: false,
            showMethod: 'fadeIn',
            hideMethod: 'fadeOut',
            timeOut: 2000,
            showDuration: 300,

        };

        switch(status)
        {
            case 1:
                toastr.success(msj);
            break;

            case 2:
                toastr.info(msj);
            break;

            case -1:
                toastr.error(msj);
            break;
        }
    }, 100); 
}






function CargarPagina(url)
{
    $("#contenido").load(url, function(response, status, xhr) {
      if (status == "error") {
           alert(msg + xhr.status + " " + xhr.statusText);
           //console.log(msg + xhr.status + " " + xhr.statusText);
      }
    });
}
