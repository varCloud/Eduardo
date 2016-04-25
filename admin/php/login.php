<?php


$usuario = isset($_POST["usuario"]) ? $_POST["usuario"]  : 'noexiste';
$contrasena=isset($_POST["contrasena"]) ? $_POST["contrasena"]  : 'noexiste';
//echo "usuario es ".$usuario." contrasela ".$contrasena;
if ($usuario == "eduardo" && $contrasena == "admin") {
    session_start();
    $_SESSION["usuario"] = "eduardo";
    header("Location: ../index.php");
} else {
   header("Location: ../login.html");
}
?>