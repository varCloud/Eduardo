<?php
require('UploadHandler.php');

//echo"directorio :".$_POST['directorio'];
$upload_handler = new UploadHandler(null,true,null,$_POST['directorio']);
?>