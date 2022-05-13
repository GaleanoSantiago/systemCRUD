<?php       //Codigo para verificar los usuarios. Reemplazo del archivo header.php

			//Usuarios
session_start();
error_reporting(0);     //funcion para que no muestre ningun error en la pagina

$varsesion = $_SESSION['usuario'];

$varsesion_id= $_SESSION['usuario_id'];
$rol_usuario_sesion = $_SESSION['rela_rol_id'];

if($varsesion == null || $varsesion == ''){
	echo'<script type="text/javascript">
    alert("Debe iniciar sesion para ingresar al sistema");
    window.location.href="Login/cerrar_sesion.php";
    </script>';
}

if($rol_usuario_sesion == 2){
   $acceso=0;
}else{
	$acceso=1;
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
   <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css" type="text/css">
    <!-- Estilos propios -->
    <link rel="stylesheet" href="css/styles.css" type="text/css">
    

</head>
<body class="fondo_gradiante">
    <div id="sidemenu" class="menu-collapsed">
<!--Header-->
    <div id="header">
        <div id="title">
        <span>Menu</span>  </div>
        <div id="menu-btn">
            <div class="btn-hamburguer"></div>
            <div class="btn-hamburguer"></div>
            <div class="btn-hamburguer"></div>
        </div>
        
    </div>
<!--Perfil-->
    <div id="profile">
        <div id="name">Usuario <span><?php echo $_SESSION['usuario'] ?> <a href="Login/cerrar_sesion.php"><button class="btn btn-danger">Cerrar Sesion</button></a></span></div>
    </div>
<!--Items-->
    <div id="menu-items">
    <div class="item">
            <a href="inicio.php">
                <div class="icon"> <img src="imagenes/iconos/inicio.png" width="40px"> </div>
                <div class="title">Inicio</div>
            </a>
        </div>
        <div class="item separator">
        </div>
        <div class="item">
            <a href="Productos/lista_productos.php">
                <div class="icon"> <img src="imagenes/iconos/caja.png" width="40px"> </div>
                <div class="title">Productos</div>
            </a>
        </div>
        <div class="item separator">
        </div>
        <div class="item">
            <a href="Proveedores/lista_prov.php">
                <div class="icon"> <img src="imagenes/iconos/proveedor.png" width="40px"> </div>
                <div class="title">Proveedores</div>
            </a>
        </div>
        <div class="item separator">
        </div>
        <div class="item">
            <a href="Tipos_productos/lista_tipop.php">
                <div class="icon"> <img src="imagenes/iconos/rubros.png" width="40px"> </div>
                <div class="title">Rubros</div>
            </a>
        </div>
        <div class="item separator">
        </div>
        <div class="item">
            <a href="Ventas/lista_venta.php">
                <div class="icon"> <img src="imagenes/iconos/bienes.png" width="40px"> </div>
                <div class="title">Ventas</div>
            </a>
        </div>
        <div class="item separator">
        </div>
        <div class="item">
            <a href="Ventas/nueva_venta.php">
                <div class="icon"> <img src="imagenes/iconos/vender.png" width="40px"> </div>
                <div class="title">Realizar Venta</div>
            </a>
        </div>
        <div class="item separator">
        </div>
    </div>

    </div>
    <div class="">
        <div class="" >
    <div class="container pt-5" >
    
        <div class="row  mb-3 justify-content-evenly"> 
        <div class="col-lg-3 col-md-3">
        <div class="text-center bloques"><a href="Productos/lista_productos.php"><img src="imagenes/iconos/caja.png" width="200px"> <br> <span class="text-light">Lista de Productos</span></a></div>
        </div>
        <div class="col-lg-3 col-md-3">
        <div class="text-center bloques"><a href="Proveedores/lista_prov.php"> <img src="imagenes/iconos/proveedor.png" width="200px"> <br> <span class="text-light"> Lista de Proveedores</span></a></div>
        </div>
        </div>
        <div class="row justify-content-evenly">
            <div class="col-lg-3 col-md-3">
        <div class="text-center bloques"><a href="Ventas/lista_venta.php"> <img src="imagenes/iconos/bienes.png" width="200px"> <br> <span class="text-light">Lista de Ventas </span> </a></div>
        </div>
        <div class="col-lg-3 col-md-3">
        <div class="text-center bloques"><a href="Tipos_productos/lista_tipop.php"> <img src="imagenes/iconos/rubros.png" width="200px"> <br> <span class="text-light">Lista de Rubros</span></a></div>
        </div>    
        </div>
    </div>
    </div>
    
<!--Jquery bootstrap y popper-->
<script src="jquery/jquery-3.3.1.min.js"></script>
<script src="css/bootstrap/js/bootstrap.min.js"></script>
<script src="popper/popper.min.js"></script>

<script src="js/menu_lateral.js"> </script>
</body>
</html>