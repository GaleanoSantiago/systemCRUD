<?php
//Usuarios
session_start();
error_reporting(0);     //funcion para que no muestre ningun error en la pagina

$varsesion = $_SESSION['usuario'];

$varsesion_id= $_SESSION['usuario_id'];
$rol_usuario_sesion = $_SESSION['rela_rol_id'];

if($varsesion == null || $varsesion == ''){
	
}else{
	echo'<script type="text/javascript">				
		alert("Para ir al login primero debe cerrar la sesion");
		window.location.href="inicio.php";
		</script>';
	}


?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
	<!-- Bootstrap -->
<link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css" type="text/css">
	<!-- CSS propios -->
<link rel="stylesheet" href="css/styles.css" type="text/css">

</head>
<body class="fondo_gradiante">
<?php

?>
<section>		
<div>
	<div class="centrado_vertical">
		<div class="contenedor_login border px-4">
			<div class="row">
				<div class="col-12 text-light">
					<form action="Login/validar.php" method="post">
						<p class="text-center"><img src="imagenes/iconos/usuario.png" width="250px"></p>
						<p class="text-center fs-2">Login</p>
					<div class="mb-3 form-group">
					<label for="usuario"  class="form-label">Ingrese su Usuario</label>
					<input name="usuario" type="text" class="form-control transparent-input"  placeholder="Usuario" required/>
					</div>
					<div class="mb-3 form-group">
					<label for="contrasena"  class="form-label">Contraseña</label>
					<input name="contrasena" type="password" class="form-control transparent-input" placeholder="Contraseña" required/>
					</div>
					</div>
					<br>
					<div class="row">
					<div class="col-md-12 text-center mt-2">
						<button class=" btn btn-success">Ingresar</button>
						<a href="Login/nuevo_usuario.php" class="btn btn-primary">Crear Usuario</a>
					</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
</section>
  <!--Jquery bootstrap y popper-->
<script src="jquery/jquery-3.3.1.min.js"></script>
<script src="css/bootstrap/js/bootstrap.min.js"></script>
<script src="popper/popper.min.js"></script> 	
</body>
</html>