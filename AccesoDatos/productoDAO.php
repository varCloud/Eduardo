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
        $query ="SELECT * FROM SubProductos where idProducto=".$_POST['idProd'];
        $res = $sql->consulta($query);
        $lstSubProd = array();
        $indice =0;
        while ($row = $sql->fetch_array($res)) {
          $s = new SubProducto;
          $s->idSub = $row["idSubProducto"];  
          $s->descripcion = $row["descripcion"]; 
          $lstSubProd[$indice]=$s;
          $indice ++;
        }
         echo json_encode($lstSubProd);

    break;

      case 'obtenerProductos':
        $sql = new MySQL();
        $query = "SELECT *  FROM Productos";
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

    case 'GuardaProducto':
        $sql = new MySQL();
  $query="INSERT INTO CatSubProductos VALUES('',".$_POST['cbSubProducto'].",".$_POST['cbProducto'].",'".$_POST['desc']."','".$_POST['urlImagen']."',".$_POST['costo'].")";
  //echo "query".$query;
        $res = $sql->consulta($query);
          $data['status']=1;
        
         echo json_encode($data);
    break;

  case 'listarTodosSubProductos':

        $lstSubProductos = array();
        $sql = new MySQL();
        $query = "SELECT relsub.*,s.descripcion AS descSub,p.descripcion AS descProd
                  FROM catsubproductos relsub 
                  INNER JOIN subproductos s ON s.idSubProducto = relsub.idSubProducto
                  INNER JOIN productos p ON p.idProducto=relsub.idProducto";
        $res = $sql->consulta($query);
        $contador = 0;
        $indice=0;

        $Producto =  array();
       // $Producto->SubProd = new SubProducto;
       // $Producto->SubProd->Articulo = array();
        while ($row = $sql->fetch_array($res)) {
              $Articulo = new Articulo;  
              $Articulo ->img= $row["imagen"];
              $Articulo ->descripcion= $row["descripcion"];
              $Articulo ->id= $row["idCatSubProducto"];
              $Articulo ->costo= $row["costo"];
              $s =  new SubProducto;
              $s->idSub = $row["idSubProducto"];  
              $s->descripcion = $row["descSub"]; 
              $s->Articulo =  $Articulo;
              $Producto[$indice]["id"]=$row["idProducto"];
              $Producto[$indice]["descripcion"]=$row["descProd"];
              $Producto[$indice]["SubProd"] = $s;
            $indice ++;
          }
          echo json_encode($Producto);
  
    break;
  
  
  default:
    # code...
    break;
}

?>