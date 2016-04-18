<?php
 //echo"producto".$_GET["pro"]." sub".$_GET["sub"];
  include '../includes/Conexion.php';
  include '../Entidades/SubProducto.php';
  include_once '../Entidades/Slider.php';

switch ($_POST["accion"]) {

  case 'EliminarImgSlider':
    $bandera= 0;
    if(file_exists ($_POST['url']))
    {
      if(unlink($_POST['url']));
        $bandera= 1;
    }
    else
      $bandera=0;

    echo json_encode($bandera);
  break;

  case 'ObtenerItemSlider':
  
              $sql = new MySQL();
              $query = "SELECT *  FROM CatSliders where idCatSliders =".$_POST['idSlide'];
              $res = $sql->consulta($query);
              while ($row = $sql->fetch_array($res)) {

                  $slider = new Slider;
                  $slider->id=$row["idCatSliders"];  
                  $slider->titulo=$row["titulo"];  
                  $slider->subTitulo=$row["subtitulo"];  
                  $slider->descCirAzul=$row["circAzul"];  
                  $slider->descCirBlanco=$row["cirBlanco"];  
                  $slider->descripcion=$row["descripcion"];  
                  $slider->Urlimg=$row["img"];
                } 
        
         echo json_encode($slider);

    break;

      case 'obtenerSlider':
          try{
              $sql = new MySQL();
              $query = "SELECT *  FROM CatSliders";
              $res = $sql->consulta($query);
              $lstCatSlider = array();
              $indice =0;
              while ($row = $sql->fetch_array($res)) {
                  $slider = new Slider;
                  $slider->id=$row["idCatSliders"];  
                  $slider->titulo=$row["titulo"];  
                  $slider->subTitulo=$row["subtitulo"];  
                  $slider->descCirAzul=$row["circAzul"];  
                  $slider->descCirBlanco=$row["cirBlanco"];  
                  $slider->descripcion=$row["descripcion"];  
                  $slider->Urlimg=$row["img"];
                  $lstCatSlider[$indice]= $slider;
                  //echo"titulo".$row["titulo"];
                  $indice++;
                } 
             }
              catch (Exception $e) {
                  echo 'Excepción capturada: ',  $e->getMessage(), "\n";
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


    case 'UpdateSlider':
        $sql = new MySQL();
        $query="INTO CatSliders VALUES('','".$_POST['titulo']."','".$_POST['subTitulo']."','".$_POST['descCirAzul']."','".$_POST['descCirBlanco']."','".$_POST['descSlider']."','".$_POST['urlImagenslider']."')";
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