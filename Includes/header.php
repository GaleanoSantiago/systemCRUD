<?php

//Usuarios
session_start();
//error_reporting(0);     //funcion para que no muestre ningun error en la pagina

$varsesion = $_SESSION['usuario'];

$varsesion_id= $_SESSION['usuario_id'];
$rol_usuario_sesion = $_SESSION['rela_rol_id'];

if($varsesion == null || $varsesion == ''){
	echo'<script type="text/javascript">
    alert("Debe iniciar sesion para ingresar al sistema");
    window.location.href="../Login/cerrar_sesion.php";
    </script>';
}

if($rol_usuario_sesion == 2){
   $acceso=0;
}else{
	$acceso=1;
}

?>

