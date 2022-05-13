<?php
//Vistas incluidas
include("../Includes/header.php");		//No permite ver los errores

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Editar Producto</title>
<link rel="stylesheet" href="../estilo.css">
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
    		<h1 class="text-center">Modificar <span class="text-danger">Productos</span></h1>        <!-- Titulo -->
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
  $id = $_GET['ids'];					//Variable en donde se guarda el valor de producto_id. Enviado desde la pagina de lista_productos.php por medio del metodo GET
	
  $consulta="SELECT * FROM productos WHERE producto_id = $id";			//Codigo SQL para seleccionar un registro que posea el producto_id mencionado anteriormente

  $resultado= $conexion->query($consulta);								//Codigo para enlazar el sql con la BD
  $fin = $resultado-> fetch_assoc();
  ?>
  <div class="container">
	  <div class="row">
		  <div class="col-lg-6 col-md-12 col-sm-12">
  <form action="updateprod.php" method="POST">				<!-- Formulario para actualizar -->
	<div class="form-group">
		<label for="id_producto" class="form-label">Id Producto</label>
		<input type="number" name="id_producto" class="form-control" id="id_producto" value="<?php echo $fin['producto_id'] ?>" readonly>
	</div> 
	<div class="form-group">		
		<label for="codigo_b" class="form-label">Codigo de Barra</label>
		<input type="number" class="form-control" name="codigo_b" id="codigo_b" value="<?php echo $fin['ncodigo_barra'] ?>" required>		  
	</div>	
	<div class="form-group">	  
		<label for="nombre" class="form-label">Nombre</label>  
		<input type="text" name="nombre" class="form-control" id= "nombre" value="<?php echo $fin['cnombre_producto'] ?>" required>
	</div>
	<div class="form-group">
		<label for="marca" class="form-label">Marca</label>
		<input type="text" class="form-control" name="marca" id= 'marca'  value="<?php echo $fin['cmarca_producto'] ?>" required>

	</div>
	<div class="form-group">
	<label for="id_rubro" class="form-label">Rubro</label>
	<select name="id_rubro" id="id_rubro" class="form-select">
			<option value="0"> Seleccionar Rubro</option>	  						<!-- Que lo primero que mueste el select sea SELECCIONAR y tenga un valor 0 -->
				 <?php
			$consulta1="SELECT * FROM rubros ORDER BY cnombre_rubro";		//Consulta sql donde selecciona todos los registros de la tabla rubros y los ordena por "cnombre_rubro"
		$resultado2= $conexion->query($consulta1);							//Enlaza la consulta sql con la base de datos por medio del archivo conexion.php
		while($valores=mysqli_fetch_array($resultado2)){	?> 				<!--Mientras se cumpla la condicion $resultado-->
			<option value = <?php echo $valores['rubro_id']; ?> <?php if($valores['rubro_id'] == $fin['rela_rubro_id'] ){ echo "SELECTED";} ?> >
    		<?php echo $valores['cnombre_rubro']; ?></option>				<!--Imprimir por pantalla el nombre de los rubros en el select-->
			
		<?php
		}
			?>
			</select>
	</div>
	<div class="form-group">
		<label for="stock_actual" class="form-label">Stock Actual</label>
		<input type="number" class="form-control" name="stock_actual" id= "stock_actual" value="<?php echo $fin['nstock_actual'] ?>" min="1" required>
		
	</div>
	<div class="form-group">
		<label for="stock_minim" class="form-label">Stock Minimo		</label>
		<input type="number" name="stock_minim" class="form-control" id= 'stock_minim' value="<?php echo $fin['nstock_min'] ?>" min="1" required>
		
	<div class="form-group">
		<label for="precio" class="form-label">Precio</label>
		<input type="number" name="precio" class="form-control" id='precio' value="<?php echo $fin['nprecio_producto'] ?>" min="1" required>
	</div>	
	<div class="form-group">
		<label for="fecha_alta" class="form-label">Fecha de Alta</label>
		<input type="date" class="form-control" name="fecha_alta" id= 'fecha_alta' value="<?php echo $fin['dfecha_alta_producto'] ?>" required>
	</div>
	<div class="form-group mb-3">
		<label for="id_prov" class="form-label">Provedor</label>
		<select name="id_prov" id="id_prov" class="form-select">
				  <option value="0">Seleccionar Proveedor</option>					<!-- Que lo primero que mueste el select sea SELECCIONAR y tenga un valor 0 -->
				  <?php
				
				$consulta2="SELECT * FROM proveedores ORDER BY cnombre_prov";		//Consulta sql donde selecciona todos los registros de la tabla proveedores y los ordena por "cnombre_prov"	
		$resultado2= $conexion->query($consulta2);									//Enlaza la consulta sql con la base de datos por medio del archivo conexion.php
		while($valores2=mysqli_fetch_array($resultado2)){	?>						<!-- Mientras se cumpla la condicion $resultado2 -->
			<option value = <?php echo $valores2['proveedor_id']; ?> <?php if($valores2['proveedor_id'] == $fin['rela_proveedor_id'] ){ echo "SELECTED";} ?> >
    		<?php echo $valores2['cnombre_prov']; ?></option>						<!--Imprimir por pantalla el nombre de los proveedores en el select-->
		<?php
		}
				?>
				  </select>
	</div>
			  
      <input class="btn btn-success mb-3 " type="submit" value="Actualizar">		<!--Boton para enviar los datos del formulario-->
	  <button type="reset" class="btn btn-danger mb-3">Deshacer Cambios</button>						<!-- Boton para resetear los campos --> 
	  <a  class="btn btn-primary mb-3 " href="lista_productos.php">Volver a la Lista</a>		<!-- Boton para volver a la pagina de listado de productos -->
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