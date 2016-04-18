<?php
include '../includes/Conexion.php';

switch ($_POST["accion"]) {

  	case 'obtenerDireccion':
        $sql = new MySQL();
        $query = "SELECT  * FROM Direccion";
        $res = $sql->consulta($query);
        while ($row = $sql->fetch_array($res)) {
        	$data['informacionExtra']= $row['informacionExtra'];
        	$data['Telefono1']= $row['Telefono1'];
          $data['Telefono2']= $row['telefono2'];
          $data['Pais']= $row['Pais'];
          $data['estado']= $row['estado'];
          $data['codigoPostal']= $row['codigoPostal'];
          $data['noInterior']= $row['noInterior'];
          $data['calle']= $row['calle'];
          $data['colonia']= $row['colonia'];
          $data['noExterior']= $row['noExterior'];
        }
        echo json_encode($data);

  	break;


  	 case 'actualizarDireccion':
        $sql = new MySQL();
        $query = "UPDATE Direccion SET  informacionExtra ='".$_POST['infoExtra']."',
        Telefono1 ='".$_POST['tel1']."',
        telefono2 = '".$_POST['tel2']."',
        Pais = '".$_POST['pais']."',
        estado = '".$_POST['estado']."',
        codigoPostal = '".$_POST['cp']."',
        noInterior = '".$_POST['noInt']."',
        calle = '".$_POST['calle']."',
        colonia = '".$_POST['col']."',
        noExterior ='".$_POST['noExt']."'";
        $res = $sql->consulta($query);
        $data['status']= 1;
        echo json_encode($data);

  	break;

  	default:
    # code...
    break;

   }

  ?>