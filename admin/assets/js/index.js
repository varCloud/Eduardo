function MiAlerta(msj)
{
    setTimeout(function() {
        toastr.options = {
            closeButton: false,
            progressBar: false,
            showMethod: 'fadeIn',
            hideMethod: 'fadeOut',
            timeOut: 5000
        };
        toastr.error(msj);
    }, 1800); 
}


$("document").ready(function() {

    MiAlerta('datos actualizados exitosamente');
});


