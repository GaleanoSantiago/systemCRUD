<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>

<body>

<?php
	
	$conexion=mysqli_connect("localhost", "root", "", "polirrubro");
	/*$usuario="root";
	$contra="";
	$base_datos="polirrubro";
	$equipos="localhost";
	
	$conexion= new mysqli ($equipos, $usuario, $contra, $base_datos);
	*/ 
	if($conexion->connect_error){
		die ("Fallo en la conexion: (" . $mysqli->mysqli_connect_errno() . ")" . $mysqli-> mysqli_connect_errno());
	}
	
	
	?>
	
</body>
</html>