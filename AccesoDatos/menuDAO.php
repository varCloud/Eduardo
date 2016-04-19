<?php
include '../includes/Conexion.php';
include '../Entidades/menu.php';
include_once '../Entidades/categoria.php';
include_once '../Entidades/subcategoria.php';

switch ($_POST["accion"]) {

  	case 'obtenerMenu':
        $sqlMenu = new MySQL();

        $query = "SELECT   M.idMenu, M.descripcion,M.tipoMenu descMenu FROM MENU M  ";
        $res = $sqlMenu->consulta($query);
        $indiceMenu=0;
        $indiceCat=0;
        $indiceSub=0;
          while ($row = $sqlMenu->fetch_array($res)) {

                $menu = new Menu;
                $menu->idMenu=$row['idMenu'];
                $menu->descripcion=$row['descMenu'];
                $menu->tipoMenu=$row['tipoMenu'];
                $menu->Categoria= array();
                $query = "SELECT   c.idCategoria,c.descripcion descMenuCat FROM categoria c  WHERE C.idMenu =".$row['idMenu'];
                $sqlCat = new MySQL();
                $filasCategoria = $sqlCat->consulta($query);
                while ($rowCat = $sqlCat->fetch_array($filasCategoria)) { 

                      $catego = new Categoria;
                      $catego->idCategoria=$rowCat['idCategoria'];
                      $catego->descripcion=$rowCat['descMenuCat'];
                      $catego->SubCategoria =  array();
                

              $query = "SELECT s.idSubCategoria,s.descripcion descMenuSubCat FROM subcategoria S WHERE  S.idCategoria =".$rowCat['idCategoria'];

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



     /*   $query = "SELECT M.idMenu, M.descripcion descMenu,c.idCategoria,c.descripcion descMenuCat,
                         s.idSubCategoria,s.descripcion descMenuSubCat
                  FROM MENU M  
                        INNER JOIN categoria C on M.idMenu = C.idMenu
                        LEFT JOIN subcategoria S ON S.idCategoria = C.idCategoria 
                        ORDER BY  M.idMenu ";
        $res = $sql->consulta($query);
       
        $indice=0;
        while ($row = $sql->fetch_array($res)) {
              $menu = new Menu;
              $menu->idMenu=$row['idMenu'];
              $menu->descripcion=$row['descMenu'];
              $menu->Categoria= array();
              $catego = new Categoria;
              $catego->idCategoria=$row['idCategoria'];
              $catego->descripcion=$row['descMenuCat'];
              $catego->SubCategoria =  array();
              $menu->Categoria[$indice]=$catego;
              $subCate = new SubCategoria;
              $subCate->idSubCategoria=$row['idSubCategoria'];
              $subCate->descripcion=$row['descMenuSubCat'];
              $catego->SubCategoria[$indice]=$subCate;
              $data[$indice]=$menu;
              $indice++;
        }*/
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