<?php
//Vistas incluidas
include("../Includes/header.php");		//No permite ver los errores

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Editar Proveedor</title>
<!-- Bootstrap -->
<link rel="stylesheet" href="../css/bootstrap/css/bootstrap.min.css" type="text/css">

<!--datables CSS básico-->
<link rel="stylesheet" type="text/css" href="../assets/datatables/datatables.min.css"/>
    <!--datables estilo bootstrap 5 CSS-->  
<link rel="stylesheet"  type="text/css" href="../assets/datatables/DataTables-1.11.3/css/dataTables.bootstrap5.min.css">   

<!-- Estilos Propios--->
<link rel="stylesheet" href="../css/styles.css" type="text/css">
</head>

<body>
<header>
	<div class="container">
		<div class="row ">
			<div class="col-lg-12">
    		<h1 class="text-center">Modificar <span class="text-danger">Proveedor</span></h1>        <!-- Titulo -->
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
  require '../conexion.php';			//Codigo para conectar con la Base de Datos
  $id = $_GET['ids'];					//Variable en donde se guarda el valor de proveedor_id. Enviado desde la pagina de lista_prov.php por medio del metodo GET
	
  $consulta="SELECT * FROM proveedores WHERE proveedor_id = $id";		//Codigo SQL para seleccionar un registro que posea el proveedor_id mencionado anteriormente

  $resultado= $conexion->query($consulta);								//Codigo para enlazar el sql con la BD
  $fin = $resultado-> fetch_assoc();
	?>
	
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-12 col-sm-12">
				<form action="updateprov.php" method="POST">
		<div class="form-label">
			<label for="in_prov" class="form-label"></label>
			<input type="number" name="id_prov" id="id_prov" class="form-control" value="<?php echo $fin['proveedor_id'] ?>" readonly>
		</div>
		<div class="form-group">
			<label for="nombre" class="form-label">Nombre</label>
			<input type="text" name="nombre" id="nombre" class="form-control" value="<?php echo $fin['cnombre_prov'] ?> " required>
		</div>
		<div class="form-group">
			<label for="" class="form-label">Direccion</label>
			<input type="text" name="direccion" class="form-control" value="<?php echo $fin['cdireccion_prov'] ?>" required>
		</div>
		<div class="form-group">
			<label for="" class="form-label">Numero de Telefono</label>
			<input type="tel" name="phone" id="phone" class="form-control" value="<?php echo $fin['ntelefono_prov'] ?>" required>
		</div>
		<div class="form-group">
			<label for="correo" class="form-label">Correo</label>
			<input type="email" name="correo" id="correo" class="form-control" value="<?php echo $fin['ccorreo_prov'] ?>" required>
		</div>
		<div class="form-group">
		<input class="btn btn-success mb-3 mt-3" type="submit" value="Actualizar">		<!--Boton para enviar los datos del formulario-->
		<button type="reset" class="btn btn-danger">Deshacer Cambios</button>						<!-- Boton para resetear los campos -->
		<a  class="btn btn-primary mb-3 mt-3" href="lista_prov.php">Volver a la Lista</a>		<!-- Boton para volver a la pagina de listado de productos -->

	</div>
		</form>
	</div>
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