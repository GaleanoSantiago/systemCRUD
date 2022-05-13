<?php
include('../conexion.php');
$usuario=$_POST["usuario"];
$contrasena=$_POST["contrasena"];

session_start();

$_SESSION['usuario']=$usuario;



$consulta="SELECT * FROM usuarios where cnombre_usuario='$usuario' and cpassword_usuario='$contrasena'";

//$resultado=$conexion->query($consulta);	
$resultado=mysqli_query($conexion,$consulta);

//$filas=mysqli_num_rows($resultado);
$filas=mysqli_fetch_array($resultado);

$_SESSION['usuario_id']=$filas['usuario_id'];
$_SESSION['rela_rol_id']=$filas['rela_rol_id'];

if($filas['rela_rol_id']==1){       //Administrador
    //header("location:admin.php");
    header("location:../inicio.php");

}else
if($filas['rela_rol_id']==2){       //Cajero
    //header("location:cajero.php");
    header("location:../inicio.php");
}else{
    //include("../index.php");              //Buscar una alternativa para mostrar un mensaje
    echo'<script type="text/javascript">
    alert("Usuario Invalido");
    window.location.href="cerrar_sesion.php";
    </script>';
    
    
}

mysqli_free_result($resultado);
mysqli_close($conexion);
?>