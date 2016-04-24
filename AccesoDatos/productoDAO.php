<?php
 //echo"producto".$_GET["pro"]." sub".$_GET["sub"];
  include '../includes/Conexion.php';
  include '../Entidades/SubProducto.php';
  include_once '../Entidades/producto.php';
  include_once '../Entidades/articulo.php';
  include_once '../Entidades/categoria.php';
  include_once '../Entidades/subcategoria.php';

switch ($_POST["accion"]) {

    case 'listarSubProductos':

        $lstSubProductos = array();
        $sql = new MySQL();
        $query = "SELECT relsub.*,s.descripcion AS descSub,c.descripcion AS descProd
                  FROM relSubCategoria relsub 
                  INNER JOIN SubCategoria s ON s.idSubCategoria = relsub.idSubCategoria
                  INNER JOIN Categoria c ON c.idCategoria = relsub.idCategoria 
                  WHERE relsub.idSubCategoria =".$_POST["subproducto"]." AND relsub.idCategoria =".$_POST["producto"]."";
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

    case 'obtenerSubCategorias':
        $sql = new MySQL();
        $query ="SELECT * FROM SubCategoria where idCategoria=".$_POST['idCat'];
        $res = $sql->consulta($query);
        $lstSubProd = array();
        $indice =0;
        while ($row = $sql->fetch_array($res)) {
            $sub=new SubCategoria;
            $sub->idSubCategoria=$row['idSubCategoria'];
            $sub->descripcion=utf8_encode($row['descripcion']);
          $lstSubProd[$indice]=$sub;
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
     $query="INSERT INTO relSubCategoria VALUES('',".$_POST['cbSubCate'].",".$_POST['cbCate'].",'".$_POST['desc']."','".$_POST['costo']."','".$_POST['urlImagen']."')";
  //echo "query".$query;
        $res = $sql->consulta($query);
          $data['status']=1;
        
         echo json_encode($data);
    break;



  case 'ObtenerUnProducto':

        $lstSubProductos = array();
        $sql = new MySQL();
        $query = "SELECT relsub.*,s.descripcion AS descSubCat,c.descripcion AS descCat,c.idCategoria,s.idSubCategoria
                  FROM relSubCategoria relsub 
                  INNER JOIN SubCategoria s ON s.idSubCategoria = relsub.idSubCategoria
                  INNER JOIN Categoria c ON c.idCategoria = relsub.idCategoria
                  WHERE relsub.id=".$_POST['idProd'];
        $res = $sql->consulta($query);
        $contador = 0;
        $indice=0;
        while ($row = $sql->fetch_array($res)) {

           $catego = new Categoria;
           $catego->idCategoria=$row['idCategoria'];
           $catego->descripcion=$row['descCat'];
           $catego->SubCategoria =  new Subcategoria;
           $catego->SubCategoria->idSubCategoria=$row['idSubCategoria'];
           $catego->SubCategoria->descripcion=$row['descSubCat'];
           $catego->SubCategoria->Articulo = new Articulo;
           $catego->SubCategoria->Articulo->id=$row['id'];
           $catego->SubCategoria->Articulo->descripcion=$row['descripcion'];
           $catego->SubCategoria->Articulo->img=$row['img'];
           $catego->SubCategoria->Articulo->costo=$row['costo'];
           $catego;
          }
          echo json_encode($catego);
    break;


  case 'listarTodosSubProductos':

        $lstSubProductos = array();
        $sql = new MySQL();
        $query = "SELECT relsub.*,s.descripcion AS descSubCat,c.descripcion AS descCat,c.idCategoria,s.idSubCategoria
                  FROM relSubCategoria relsub 
                  INNER JOIN SubCategoria s ON s.idSubCategoria = relsub.idSubCategoria
                  INNER JOIN Categoria c ON c.idCategoria = relsub.idCategoria";
        $res = $sql->consulta($query);
        $contador = 0;
        $indice=0;
        while ($row = $sql->fetch_array($res)) {

           $catego = new Categoria;
           $catego->idCategoria=$row['idCategoria'];
           $catego->descripcion=$row['descCat'];
           $catego->SubCategoria =  new Subcategoria;
           $catego->SubCategoria->idSubCategoria=$row['idSubCategoria'];
           $catego->SubCategoria->descripcion=$row['descSubCat'];
           $catego->SubCategoria->Articulo = new Articulo;
           $catego->SubCategoria->Articulo->id=$row['id'];
           $catego->SubCategoria->Articulo->descripcion=$row['descripcion'];
           $catego->SubCategoria->Articulo->img=$row['img'];
           $catego->SubCategoria->Articulo->costo=$row['costo'];
           $data[$indice]= $catego;
           $indice ++;
          }
          echo json_encode($data);
    break;
  


    case 'ActualizaProd':
      $sql = new MySQL();
      $query = "UPDATE  relSubCategoria  SET descripcion = '".utf8_decode($_POST['desc'])."' , idCategoria =".$_POST['cbCate'].",idSubCategoria =".$_POST['cbSubCate'].", costo='".$_POST['costo']."',img='".$_POST['urlImagen']."'   where id = ".$_POST['idProd'];

      $sql->consulta($query);
      $data['status']=1;
      echo json_encode($data);
    break;




  case 'EliminarImagen':

   $ruta="../".$_POST['urlImagen'];
   $rutaTemp="../".$_POST['ImagenTemporal'];
   $status = 0;
   
      if(file_exists($rutaTemp))
      {
         $status++;
         unlink($rutaTemp);
      }

      if(file_exists($ruta))
      {
         $status++;
         unlink($ruta);
      }

//PREGUNTO SI ES ACTUALIZACION SI ES, NO VA A AUMENTAR ESTATUS
//CUANDO TRATE DE ELIMINAR EL ARCHIVO TEMPORAL
//POR ESA RAZON LO ELIMINO LO CORRECTO SERIA ELIMINAR TAMBIEN EL ARCHIVO TEMPORAL


      if($_POST['esActualizacion'])
      {
         $status++;
          if(!file_exists($ruta))
             $status++;
      }

      
   $data['status']=$status;
        echo json_encode($data);


  break;
  
  default:
    # code...
    break;
}

?>