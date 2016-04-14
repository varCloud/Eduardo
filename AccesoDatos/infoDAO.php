<?php
include '../includes/Conexion.php';

switch ($_POST["accion"]) {

  	case 'obterneMision':
  	    $lstSubProductos = array();
        $sql = new MySQL();
        $query = "SELECT  mision FROM Informacion";
        $res = $sql->consulta($query);
        while ($row = $sql->fetch_array($res)) {
        	$data['mision']= $row['mision'];
        }
        echo json_encode($data);
  	break;


  	case 'obterneVision':
  	    $lstSubProductos = array();
        $sql = new MySQL();
        $query = "SELECT  vision FROM Informacion";
        $res = $sql->consulta($query);
        while ($row = $sql->fetch_array($res)) {
        	$data['vision']= $row['vision'];
        }
        echo json_encode($data);

  	break;

  	case 'obterneVisionMision':
  	    $lstSubProductos = array();
        $sql = new MySQL();
        $query = "SELECT  * FROM Informacion";
        $res = $sql->consulta($query);
        while ($row = $sql->fetch_array($res)) {
        	$data['vision']= $row['vision'];
        	$data['mision']= $row['mision'];
        }
        echo json_encode($data);

  	break;


  	 case 'actualizarMisionVision':
  	    $lstSubProductos = array();
        $sql = new MySQL();
        $query = "UPDATE Informacion SET vision='".$_POST['vision']."', mision='".$_POST['mision']."'";
        $res = $sql->consulta($query);
        $data['status']= 1;
        echo json_encode($data);

  	break;

  	default:
    # code...
    break;

   }

  ?>