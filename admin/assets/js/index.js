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


