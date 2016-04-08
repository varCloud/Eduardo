<?php
 //echo"producto".$_GET["pro"]." sub".$_GET["sub"];
  include '../includes/Conexion.php';
  include '../Entidades/SubProducto.php';
  include_once '../Entidades/producto.php';
  include_once '../Entidades/articulo.php';

switch ($_POST["accion"]) {
  case 'listarSubProductos':

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
  
    break;

    case 'obtenerSubProductos':
        $sql = new MySQL();
        $query ="SELECT * FROM subproducto where idProducto=".$_POST['idProd'];
        $res = $sql->consulta($query);
        $lstSubProd = array();
        $indice =0;
        while ($row = $sql->fetch_array($res)) {
          $s = new SubProducto;
          $s->idSub = $row["idSubProducto"];  
          $s->descripcion = $row["Descripcion"]; 
          $lstSubProd[$indice]=$s;
          $indice ++;
        }
         echo json_encode($lstSubProd);

    break;

      case 'obtenerProductos':
        $sql = new MySQL();
        $query = "SELECT *  FROM producto";
        $res = $sql->consulta($query);
        $lstProd = array();
        $indice =0;
        while ($row = $sql->fetch_array($res)) {
          $p = new Producto;
          $p->id = $row["idProducto"];  
          $p->descripcion = $row["descripcion"]; 
          $lstProd[$indice]=$p;
          $indice ++;
        }
         echo json_encode($lstProd);
    break;
  
  
  default:
    # code...
    break;
}

?>