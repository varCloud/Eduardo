<?php
include '../includes/Conexion.php';
include '../Entidades/menu.php';
include_once '../Entidades/categoria.php';
include_once '../Entidades/subcategoria.php';

switch ($_POST["accion"]) {

  	case 'cargarMenu':
        $sqlMenu = new MySQL();

        $query = "SELECT   M.idMenu, M.descripcion descMenu,M.tipoMenu  FROM Menu M  ";
        $res = $sqlMenu->consulta($query);
        $indiceMenu=0;
        $indiceCat=0;
        $indiceSub=0;
          while ($row = $sqlMenu->fetch_array($res)) {

                $menu = new Menu;
                $menu->idMenu=$row['idMenu'];
                $menu->descripcion=utf8_encode($row['descMenu']);
                $menu->tipoMenu=$row['tipoMenu'];
                $menu->Categoria= array();
                $query = "SELECT   c.idCategoria,c.descripcion descMenuCat FROM Categoria c  WHERE c.idMenu =".$row['idMenu'];
                $sqlCat = new MySQL();
                $filasCategoria = $sqlCat->consulta($query);
                while ($rowCat = $sqlCat->fetch_array($filasCategoria)) { 

                      $catego = new Categoria;
                      $catego->idCategoria=$rowCat['idCategoria'];
                      $catego->descripcion=$rowCat['descMenuCat'];
                      $catego->SubCategoria =  array();
                

              $query = "SELECT S.idSubCategoria,S.descripcion descMenuSubCat FROM SubCategoria S WHERE  S.idCategoria =".$rowCat['idCategoria'];

                $sqlSub = new MySQL();
                $filasSubCategoria = $sqlSub->consulta($query);
                if(mysql_num_rows($filasSubCategoria)>0){
                    while ($rowSub = $sqlSub->fetch_array($filasSubCategoria)) {
                        $subCate = new SubCategoria;
                        $subCate->idSubCategoria=$rowSub['idSubCategoria'];
                        $subCate->descripcion=$rowSub['descMenuSubCat'];
                        $catego->SubCategoria[$indiceSub]=$subCate;
                        $indiceSub++;
                    }
                }
                $menu->Categoria[$indiceCat]=$catego;
                $indiceCat++;
              }
                $data[$indiceMenu]=$menu;
                $indiceMenu++;
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

    case 'ObtenerMenu':
        $sql = new MySQL();
        $query = "SELECT * FROM Menu";
        $res = $sql->consulta($query);
        $indice=0;
         while ($row = $sql->fetch_array($res)) { 
            $m = new Menu;
            $m->idMenu=$row['idMenu'];
            $m->descripcion=utf8_encode($row['descripcion']);
            $m->tipoMenu=$row['tipoMenu'];
            $data[$indice]= $m;
            $indice++;
         }
        echo json_encode($data);
    break;

    case 'ObtenerUnMenu':
        $sql = new MySQL();
        $query = "SELECT * FROM Menu where idMenu=".$_POST['idMenu'];
        $res = $sql->consulta($query);
         while ($row = $sql->fetch_array($res)) { 
            $m = new Menu;
            $m->idMenu=$row['idMenu'];
            $m->descripcion=utf8_encode($row['descripcion']);
            $m->tipoMenu=$row['tipoMenu'];
         }
        echo json_encode($m);
    break;

    case 'GuardarItemMenu':
        $sql = new MySQL();
        $query = "INSERT INTO  Menu values('','".utf8_decode($_POST['descripcionMenu'])."',".$_POST['cbTipoMenu'].")";
        $sql->consulta($query);
        $data['status']=1;
        echo json_encode($data);
    break;

    case 'EliminarItemMenu':
        $sql = new MySQL();
        $query = "DELETE FROM Menu where idMenu = ".$_POST['idMenu'];
        $sql->consulta($query);
        $data['status']=1;
        echo json_encode($data);
    break;

    case 'ActualizaItemMenu':
      $sql = new MySQL();
      $query = "UPDATE  Menu  SET descripcion = '".utf8_decode($_POST['descripcionMenu'])."',tipoMenu =".$_POST['cbTipoMenu']." where idMenu = ".$_POST['idMenu'];
      $sql->consulta($query);
      $data['status']=1;
      echo json_encode($data);
    break;


//////////////////////////////////FUNCIONES CATEGORIAS//////////////////////////////////////
    case 'ObtenerCategorias':
        $sql = new MySQL();
        $query = "SELECT m.descripcion descMenu, c.descripcion descCate, m.idMenu,c.idCategoria FROM Categoria c INNER JOIN Menu  m on c.idMenu = m.idMenu order by m.idMenu ";
        $res = $sql->consulta($query);
        $indice=0;
         while ($row = $sql->fetch_array($res)) { 
             $menu = new Menu;
             $menu->idMenu=$row['idMenu'];
             $menu->descripcion=utf8_encode($row['descMenu']);
             $catego = new Categoria;
             $catego->idCategoria=$row['idCategoria'];
             $catego->descripcion=utf8_encode($row['descCate']);
             $menu->Categoria =$catego;
             $data[$indice]=$menu;
             $indice ++;
         }
        echo json_encode($data);
    break;

    case 'GuardarCate':
        $sql = new MySQL();
        $query = "INSERT INTO  Categoria values('',".$_POST['cbMenu'].",'".utf8_decode($_POST['descripcionCate'])."')";
        $sql->consulta($query);
        $data['status']=1;
        echo json_encode($data);
    break;

    case 'ObtenerUnaCate':
        $sql = new MySQL();
        $query = "SELECT * FROM Categoria where idCategoria=".$_POST['idCate'];
        $res = $sql->consulta($query);
         while ($row = $sql->fetch_array($res)) { 
            $menu = new Menu;
            $menu->idMenu=$row['idMenu'];
            $menu->Categoria=new Categoria;
            $menu->Categoria->idCategoria=$row['idCategoria'];
            $menu->Categoria->descripcion=utf8_encode($row['descripcion']);
         }
        echo json_encode($menu);
    break;

    case 'ActualizaCate':
      $sql = new MySQL();
      $query = "UPDATE  Categoria  SET descripcion = '".utf8_decode($_POST['descripcionCate'])."',idMenu =".$_POST['cbMenu']." where idCategoria = ".$_POST['idCate'];
      $sql->consulta($query);
      $data['status']=1;
      echo json_encode($data);
    break;

    case 'EliminarCate':

       /* para eliminar las subcategorias que tenga esta categoria al momento de eliminarla 
        $sql = new MySQL();
        $query = "DELETE FROM SubCategoria where idCategoria = ".$_POST['idCate'];
        $sql->consulta($query);
        */

        $sql = new MySQL();
        $query = "DELETE FROM Categoria where idCategoria = ".$_POST['idCate'];
        $sql->consulta($query);
        $data['status']=1;
        echo json_encode($data);
    break;



////////////////////////////////////////////////////////////////////////////////////////////
    case 'ObtenerItemSubCat':
        $sql = new MySQL();
        $query = "SELECT * FROM SubCategoria";
        $res = $sql->consulta($query);
        $indice=0;
         while ($row = $sqlCat->fetch_array($res)) { 
             $subCate = new SubCategoria;
             $subCate->idSubCategoria=$rowSub['idSubCategoria'];
             $subCate->descripcion=$rowSub['descripcion'];
             $data[$indice]= $subCate;
         }
        echo json_encode($data);
    break;






  	default:
    # code...
    break;

   }

  ?>