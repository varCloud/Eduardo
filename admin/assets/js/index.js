/*

1.- correcto
2.- info
-1.- Error

*/

function MiAlerta(msj,status)
{
    setTimeout(function() {
        toastr.options = {
            closeButton: false,
            progressBar: false,
            showMethod: 'fadeIn',
            hideMethod: 'fadeOut',
            timeOut: 5000
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
    }, 1800); 
}


$("document").ready(function() {

    MiAlerta('datos actualizados exitosamente',-1);
});



function CargarPagina(url)
{
    $("#contendio").load(url, function(response, status, xhr) {
      if (status == "error") {
           alert(msg + xhr.status + " " + xhr.statusText);
           //console.log(msg + xhr.status + " " + xhr.statusText);
      }
    });
}
