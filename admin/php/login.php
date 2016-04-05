<?php

//error_reporting(0); 
//include '../../includes/Conexion.php';
//$sql = new MySQL();


$usuario = isset($_POST["usuario"]) ? $_POST["usuario"]  : 'noexiste';
$contrasena=isset($_POST["contrasena"]) ? $_POST["contrasena"]  : 'noexiste';
//$res = $sql->consulta("SELECT * FROM claves WHERE usuario LIKE '%" . $usuario . "%' AND contrasena LIKE '%" . $contrasena . "%'");
//$rows = $sql->num_rows($res);}
echo "usuario es ".$usuario." contrasela ".$contrasena;
if ($usuario == "eduardo" && $contrasena == "admin") {
    session_start();
    $_SESSION["usuario"] = "eduardo";
    header("Location: ../index.php");
} else {
   header("Location: ../login.html");
}
?>