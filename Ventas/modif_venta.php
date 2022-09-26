<?php
//Vistas incluidas
include("../Includes/header.php");

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Modificar Producto Elegido</title>
<link rel="icon" href="../imagenes/iconos/vender.png">

<!-- Bootstrap -->
<link rel="stylesheet" href="../css/bootstrap/css/bootstrap.min.css" type="text/css">

<!--datables CSS básico-->
<link rel="stylesheet" type="text/css" href="../assets/datatables/datatables.min.css"/>
    <!--datables estilo bootstrap 5 CSS-->  
<link rel="stylesheet"  type="text/css" href="../assets/datatables/DataTables-1.11.3/css/dataTables.bootstrap5.min.css">   

<!-- Estilos Propios--->
<link rel="stylesheet" href="../css/styles.css">

</head>

<body>
<header>
	<div class="container">
		<div class="row ">
			<div class="col-lg-12">
    		<h1 class="text-center"><span class="text-danger">Reelegir</span> Producto</h1>        <!-- Titulo -->
			</div>
		</div>	
	</div>
</header>
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
        <div id="name">Usuario <span><?php echo $_SESSION['usuario'] ?> <a href="../Login/cerrar_sesion.php"><button class="btn btn-danger">Cerrar Sesion</button></a></span></div>
    </div>
<!--Items-->
    <div id="menu-items">
        <div class="item">
            <a href="../inicio.php">
                <div class="icon"> <img src="../imagenes/iconos/inicio.png" width="40px"> </div>
                <div class="title">Inicio</div>
            </a>
        </div>
        <div class="item separator">
        </div>
		<div class="item">
            <a href="../Productos/lista_productos.php">
                <div class="icon"> <img src="../imagenes/iconos/caja.png" width="40px"> </div>
                <div class="title">Productos</div>
            </a>
        </div>
        <div class="item separator">
        </div>
        <div class="item">
            <a href="../Proveedores/lista_prov.php">
                <div class="icon"> <img src="../imagenes/iconos/proveedor.png" width="40px"> </div>
                <div class="title">Proveedores</div>
            </a>
        </div>
        <div class="item separator">
        </div>
        <div class="item">
            <a href="../Tipos_productos/lista_tipop.php">
                <div class="icon"> <img src="../imagenes/iconos/rubros.png" width="40px"> </div>
                <div class="title">Rubros</div>
            </a>
        </div>
        <div class="item separator">
        </div>
        <div class="item">
            <a href="../Ventas/lista_venta.php">
                <div class="icon"> <img src="../imagenes/iconos/bienes.png" width="40px"> </div>
                <div class="title">Ventas</div>
            </a>
        </div>
        <div class="item separator">
        </div>
		<div class="item">
            <a href="../Ventas/nueva_venta.php">
                <div class="icon"> <img src="../imagenes/iconos/vender.png" width="40px"> </div>
                <div class="title">Realizar Venta</div>
            </a>
        </div>
        <div class="item separator">
        </div>
    </div>
</div>
<?php 
	
	$idGet=$_GET['ids'];																//Variable en donde se guarda el valor de venta_inter__id. Enviado desde la pagina de lista_venta.php por medio del metodo GET
	require "../conexion.php";																//Codigo para conectar con la Base de Datos
	$consulta="SELECT * FROM venta_intermedio WHERE venta_inter_id=$idGet";					//Consulta sql que selecciona todos los registros de la tabla venta_intermedio en donde el valor venta_inter_id sea igual al almacenado en la variable $idGet
	$resultado= $conexion->query($consulta);												//Codigo para enlazar el sql con la BD
	$fin = $resultado->fetch_assoc();	
	?>

<div class="container">
	<div class="row justify-content-center">
		<div class="shadow col-lg-4 col-md-4 col-sm-12 border rounded" >
		<form method="post" action="updateventa.php">			<!-- Formulario para buscar el producto por el codigo de barra -->
		
		<input type="hidden" name="id_venta" id="id_venta" value="<?php echo $idGet ?>">	
		
		<div class="form-group mb-3 pt-3">
				<label for="codb" class="form-label">Ingrese el Código de Barras</label>
				
				<input type="number" class="form-control" name="codb" id="codb" placeholder="ingrese código" value="<?php echo $fin['ncodigo_barra'] ?>" required>
			</div>
			<div class="form-group mb-3">
				<label for="cant" class="form-label">Ingrese Cantidad del Producto</label>
				<input type="number" class="form-control" name="cant" id="cant" value="<?php echo $fin['ncantidad'] ?>" min="1" required >
			</div>	
			<div class="form-control mb-3 text-center">
			<input class="btn btn-success" type="submit" value="Buscar">		<!-- Boton para enviar -->
			<button type="reset" class="btn btn-danger ">Deshacer Cambios</button>	<!-- Boton para resetear -->
			<a href="nueva_venta.php" class="btn btn-primary">Volver</a>
			</div>
	</form>
	</div>
</div>

<!--Jquery bootstrap y popper-->
<script src="../jquery/jquery-3.3.1.min.js"></script>
<script src="../css/bootstrap/js/bootstrap.min.js"></script>
<script src="../popper/popper.min.js"></script> 	


 <!-- datatables JS -->
<script type="text/javascript" src="../assets/datatables/datatables.min.js"></script>    

<!-- JS -->
<script src="../main.js" charset="utf-8"></script>
<script src="../js/menu_lateral.js"> </script>
</body>
</html>
