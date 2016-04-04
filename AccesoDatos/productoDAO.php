<?php
 //echo"producto".$_GET["pro"]." sub".$_GET["sub"];
  include '../includes/Conexion.php';
  include '../Entidades/SubProducto.php';
  include_once '../Entidades/producto.php';
  include_once '../Entidades/articulo.php';

    $lstSubProductos = array();

	$sql = new MySQL();
	$query = "SELECT relsub.*,s.descripcion AS descSub,p.descripcion AS descProd
            FROM relsubproductos relsub 
            INNER JOIN subproducto s ON s.idsubproducto = relsub.idSub
            INNER JOIN producto p ON p.idproducto=relsub.idProd 
            WHERE relsub.idSub =".$_POST["subproducto"]." AND relsub.idProd =".$_POST["producto"]."";
	$res = $sql->consulta($query);
	$contador = 0;
	$indice=0;

  $Producto = new Producto;
  $Producto->SubProd = new SubProducto;
  $Producto->SubProd->Articulo = array();
	while ($row = $sql->fetch_array($res)) {
 
        $Producto->SubProd->idSub = $row["idSub"];	
        $Producto->SubProd->descripcion = $row["descSub"];  

        $Articulo = new Articulo;  
        $Articulo ->img= $row["img"];
        $Articulo ->descripcion= $row["descripcion"];
        $Articulo ->id= $row["contador"];
        $Articulo ->costo= $row["costo"];

        $Producto->id=$row["idProd"];
        $Producto->descripcion=$row["descProd"];

       //echo"descripcion :".$row["Descripcion"]; 
        $Producto->SubProd->Articulo[$indice]=$Articulo;
      $indice ++;
    }
    echo json_encode($Producto);
	
?>