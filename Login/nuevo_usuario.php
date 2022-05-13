<?php
//Para la confirmacion de usuarios
//include("../Includes/header.php");
require "../conexion.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Usuario Nuevo</title>
    <!-- Bootstrap -->
<link rel="stylesheet" href="../css/bootstrap/css/bootstrap.min.css" type="text/css">
	
 <!--Animaciones-->
 <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- CSS propios -->
<link rel="stylesheet" href="../css/styles.css" type="text/css">
</head>
<body class="fondo_gradiante">

<?php
if (isset($_POST['accion'])){								//Si el formulario anterior se envia
    //Define las variables
    $usuario=$_POST['usuario'];
    $password=$_POST['pass'];
    $correo = $_POST['email'];
    $rol = $_POST['rol'];
    
    
    $guardar="INSERT INTO `usuarios` (`cnombre_usuario`, `cemail_usuario`, `cpassword_usuario`, `rela_rol_id`) VALUES ('$usuario', '$correo', '$password', '$rol');";	//Esta linea de codigo almacena el sql que permite insertar registros a la tabla de usuarios
    $resultado2=$conexion->query($guardar);		//Codigo que enlaza el codigo sql con la base de datos

    echo'<script type="text/javascript">
    alert("Usuario Almacenado correctamente");
    window.location.href="../inicio.php";
    </script>';
}

?>

<div class="centrado_vertical">
    <div class="contenedor_login border px-4" >
        
    <div class="row mb-3">
		<div class="col-12 text-light" >
        <form action="nuevo_usuario.php" method="post">
        <p class="text-center"><img src="../imagenes/iconos/usuario.png" width="190px"></p>
		<p class="text-center fs-2">Registrarte</p>
        <input type="hidden" name="accion">
        <div class="form-group">
        <label for="usuario" class="form-label">Ingrese Nombre de Usuario</label>
        <input type="text" name="usuario" class="form-control  transparent-input" placeholder="Nombre de usuario">
        </div>
        <div class="form-group">
            <label for="email" class="form-label">Correo Electronico</label>
            <input type="email" name="email" class="form-control  transparent-input" placeholder="email@gmail.com">
        </div>
        <div class="form-group">
        <label for="pass">Contraseña</label>
        <input type="password" name="pass" class="form-control  transparent-input" placeholder="contraseña">
        </div>
        <div class="form-group">
            <label for="rol">Rol de Usuario</label>
            <select name="rol" id="rol" class="form-select text-light bg-transparent">
                <option class='bg-dark' value="0">Seleccionar Rol de Usuario</option>
            <?php
                    
                    $consulta2="SELECT * FROM roles ORDER BY cdescripcion_rol";		//Consulta sql donde selecciona todos los registros de la tabla proveedores y los ordena por "cnombre_prov"
                    $resultado2= $conexion->query($consulta2);									//Enlaza la consulta sql con la base de datos por medio del archivo conexion.php
                    while($valores2=mysqli_fetch_array($resultado2)){							//Mientras se cumpla la condicion $resultado2
                    echo '<option class="bg-dark" value="'.$valores2[rol_id].'">'. $valores2[cdescripcion_rol]. '</option>';		//Imprimir por pantalla el nombre de los proveedores en el select
                    }
                    ?>
            </select>
        </div>
        <div class="form-group mt-2 text-center">
            <button type="submit" class="btn btn-success">Registrarse</button>
            <a href="../index.php" class="btn btn-primary">Volver al Login</a>
        </div>
        </form>
        </div>
    </div>
    </div>
</div>
 <!--Jquery bootstrap y popper-->
 <script src="../jquery/jquery-3.3.1.min.js"></script>
<script src="../css/bootstrap/js/bootstrap.min.js"></script>
<script src="../popper/popper.min.js"></script> 	
<!--Animaciones-->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <!--Inicializar animaciones-->
    <script>
        AOS.init();
    </script>
</body>
</html>