<?php
 //echo"producto".$_GET["pro"]." sub".$_GET["sub"];
  include '../includes/Conexion.php';
  include '../Entidades/SubProducto.php';
  include_once '../Entidades/producto.php';
  include_once '../Entidades/Slider.php';

switch ($_POST["accion"]) {
  case 'ObtenerImgsSlider':

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

      case 'obtenerSlide':
        $sql = new MySQL();
        $query = "SELECT *  FROM CatSliders";
        $res = $sql->consulta($query);
        $lstCatSlider = array();
        $indice =0;
        while ($row = $sql->fetch_array($res)) {
          $slider = new Slider;
          $slider->$id=$row["idCatSliders"];  
          $slider->$titulo = $row["titulo"];  
          $slider->$subTitulo= $row["subtitulo"];  
          $slider->$descCirAzul= $row["circAzul"];  
          $slider->$descCirBlanco= $row["cirBlanco"];  
          $slider->$descripcion= $row["descripcion"];  
          $slider->$Urlimg=$row["img"]; 
          $lstCatSlider[$indice]= $slider 
        }
         echo json_encode($lstCatSlider);
    break;

    case 'GuardarSlider':
        $sql = new MySQL();
        $query="INSERT INTO CatSliders VALUES('','".$_POST['titulo']."','".$_POST['subTitulo']."','".$_POST['descCirAzul']."','".$_POST['descCirBlanco']."','".$_POST['descSlider']."','".$_POST['urlImagenslider']."')";
  //echo "query".$query;,'".$_POST['descCirAzul']."
          $res = $sql->consulta($query);
          $data['status']=1;
        
         echo json_encode($data);
    break;
  
  
  default:
    # code...
    break;
}

?>