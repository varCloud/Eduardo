<?php
 //echo"producto".$_GET["pro"]." sub".$_GET["sub"];
include '../includes/Conexion.php';
switch ($_POST["accion"]) {
  case "InformacionEmpresa":

            $sql = new MySQL();
            $query = "SELECT ".$_POST["campo"]." FROM empresa";
            $res = $sql->consulta($query);
               
            while ($row = $sql->fetch_array($res)) {
                     $data["info"]= utf8_encode($row[0]);
              }
        
          //$data["infor"]+="sds";
         // $data["infor1"]="sds";
         // $data["infor2"]="sds";
          $query="";
          echo json_encode($data);
    break;

  case "mision":
   echo"ERROR";
    break;
  
  default:
    echo "ERROR";
    break;
}

	
?>