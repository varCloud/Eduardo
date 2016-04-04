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


