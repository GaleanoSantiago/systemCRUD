<?php
//Vistas incluidas
include("../Includes/header.php");		//Con este codigo tampoco muestra errores la pagina, cuidado
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Venta Realizada</title>
<link rel="icon" href="../imagenes/iconos/vender.png">
<!-- Bootstrap -->
<link rel="stylesheet" href="../css/bootstrap/css/bootstrap.min.css" type="text/css">

<!--datables CSS básico-->
<link rel="stylesheet" type="text/css" href="../assets/datatables/datatables.min.css"/>
    <!--datables estilo bootstrap 5 CSS-->  
<link rel="stylesheet"  type="text/css" href="../assets/datatables/DataTables-1.11.3/css/dataTables.bootstrap5.min.css">   


<!--Enlaces para la datatable online  
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">    
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">-->

<!-- Estilos Propios--->
<link rel="stylesheet" href="../css/styles.css">
</head>

<body>

<header>
	<div class="container">
		<div class="row ">
			<div class="col-lg-12">
    		<h1 class="text-center"><span class="text-danger">Venta</span> Realizada con Exito</h1>        <!-- Titulo -->
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
	require("../conexion.php");									//Se conecta con la base de datos por medio del archivo conexion.php
	$fecha_actual=date("Y-m-d");								//Variable en donde se almacena la fecha del sistema
				//Variables en donde se almacenan los datos enviados del formulario nueva_venta.php
	$med_pago=$_POST['med_pago'];								

	$cant_TOTAL=$_POST['cant_total'];
	$precio_completo=$_POST['precio_completo'];
?>
				<!-- Tabla donde se muestran los registros almacenados en la tabla Ventas de la bd -->
	
	<div class="container">
	<table  class="table border-top border-right border-left">				<!-- Inicio de la tabla Ventas-->
  <thead>
	<tr>				<!-- Inicio de la primera fila -->
    <th width="40">Id Venta</th>
  
    <th width="72">Cantidad de Productos</th>
    <th width="53">Fecha de Venta</th>
    <th width="62">Id Medio de Pago</th>
    <th width="83">Pago Total</th>
   
    </tr>			<!-- Final de la primera fila -->
	</thead>
		<?php
				//Variable en donde se almacena el codigo sql para insertar un registro en la tabla ventas de la bd
		$guardar="insert into ventas (ncant_prod, dfecha_venta, nprecio_total, rela_med_pago_id) values ($cant_TOTAL, '$fecha_actual',$precio_completo, $med_pago)";
		$resultado_guardar=$conexion->query($guardar);			//Codigo para conectar el sql a la base de datos
		?>
		
		<?php
		
		$ventas_consulta="select * from ventas";				//consulta sql que trae todos los registros de la tabla ventas
		$result_ventas=$conexion->query($ventas_consulta);		//Codigo para conectar el sql a la base de datos
		
		while($ventas_fin=$result_ventas->fetch_assoc()){		//Mientras el codigo sql de $result_ventas se conecte correctamente a la base de datos
																//Se definen las variables con los datos almacenados en los registros de la tabla 

			$id_venta=$ventas_fin['venta_id'];
			$cant_productos=$ventas_fin['ncant_prod'];
			$fecha_venta=$ventas_fin['dfecha_venta'];
			$id_med_pago=$ventas_fin['rela_med_pago_id'];
		}

		echo "<tr>";	//Inicio de la segunda fila, aca se exhiben los datos del ultimo registro almacenado recientementeen la tabla ventas
                            echo "<td align='center'>",$id_venta,"</td>";
							echo "<td align='center'>",$cant_productos,"</td>";
							echo "<td align='center'>",$fecha_venta,"</td>";
							echo "<td align='center'>",$id_med_pago,"</td>";
							echo "<td align='center'>",$precio_completo,"</td>";
			echo "</tr>";	//Final de la segunda fila
		
		?>
		
		
	</table>	
					<!-- Final de la tabla -->
	<p>&nbsp;</p>
	<p>&nbsp;</p>
<p></p>
					<!-- Segunda Tabla. Tabla en donde se muestran los registros recien guardados en la tabla detalle de ventas -->
	<table class="table">		<!-- Inicio de la Tabla Detalle de Ventas -->
		<thead>
		<tr>				<!-- Inicio de la primera fila -->
			<th width="40">
			Id Det Venta
		  </th>
			<th width="40">
			Id Venta
		  </th>
		  <th width="56">Id Producto</th>
		  <th width="39">Precio</th>
				<th width="77">Cantidad por Producto</th>
		</tr>				<!-- Final de la prmera fila -->
		</thead>
		<?php
		
		
		
			$consulta="select * from venta_intermedio";			//Variable donde se almacena el codigo sql para seleccionar todos los registros de la tabla venta_intermedio
		$resultado=$conexion->query($consulta);					//Codigo para enlazar el sql con la base de datos
		if($conexion->errno) die($conexion->error);
		
		
		while($fin = $resultado->fetch_assoc()){ 				//Mientras el codigo sql de $resultado se conecte correctamente a la base de datos
																//Se definen las variables con los datos almacenados en los registros de la tabla venta_intermedio
			$codigo_barra=$fin['ncodigo_barra'];
			$precio=$fin['nprecio'];
			$cantidad=$fin['ncantidad'];

			$post_consulta="select * from productos where ncodigo_barra=$codigo_barra";			//Codigo sql para seleccionar todos los registros de la tabla productos
																								//en donde el atributo ncodigo_barra sea igual al valor almacenado en la variable $codigo_barra	
			$post_resultado=$conexion->query($post_consulta);				//Codigo para enlazar el sql con la base de datos
			
			while($post_fin=$post_resultado->fetch_assoc()){				//Mientras se cumpla la condicion $post_fin
																			//Se definen las variables con los datos almacenados en los registros de la tabla productos
				
				$id_producto=$post_fin['producto_id'];
	
				$nom_prod=$post_fin['cnombre_producto'];
				
				$nprecio_producto=$post_fin['nprecio_producto'];			//Prueba de precio foraneo. Resultado positivo 31/10/21
			}
			

			//Codigo sql para insertar registros a la tabla detalle_ventas
			$guardar_detalleventa="INSERT INTO `detalle_ventas` (`rela_venta_id`, `rela_producto_id`, `nprecio`, `ncant_x_prod`) VALUES ('$id_venta', '$id_producto', '$nprecio_producto', '$cantidad');";
			
			$resultado2=$conexion->query($guardar_detalleventa);		//Codigo para enlazar el sql con la base de datos
			
					// Parte del codigo en donde se resta el stock de algun producto vendido
	$consulta_productos="select * from productos where producto_id=$id_producto";		//Primero selecciono el producto al que le quiero reducir el stock
	$resultado_productos=$conexion->query($consulta_productos);							//Enlazo con la base de datos
	
	while($fin_P=$resultado_productos->fetch_assoc()){						//Mientras se cumpla la condicion de $resultado	
																			//Defino las variables en donde se almacenarán los datos traidos de la tabla
		$stock_actual=$fin_P['nstock_actual'];
		$stock_min=$fin_P['nstock_min'];
	}
	
	
	$stock_restante=$stock_actual-$cantidad;			//Realizo la operacion matematica para obtener el stock restante. O sea, la cantidad de productos que queda despues de realizada una venta
	
	//if($stock_restante<$stock_min){
	//	echo "<script> alert('Ha excedido la cantidad minima |Stock actual: $stock_restante|');</script>";
	//}		
			
	$modificar_producto="update productos set nstock_actual=$stock_restante where producto_id=$id_producto";			//Codigo sql para actualizar el stock actual un producto basandose en su id
	$resultado_productos2=$conexion->query($modificar_producto);					//Enlazar con la base de datos
		
		}
		
		$consult="select * from detalle_ventas where rela_venta_id=$id_venta";		//Codigo sql que seleccina los registros recientemente guardados en la tabla detalle_ventas  
		$result=$conexion->query($consult);				//Codigo para enlazar el sql con la base de datos
		
		
		while($fin_V=$result->fetch_assoc()){			//Mientras se cumpla la condicion $fin_V
														//Se imprime la segunda fila de la tabla
	
			echo "<tr>";					//Inicio de la segunda fila. En donde se imprimen los datos seleccionados de la tabla detalle_ventas
                            echo "<td align='center'>",$fin_V['det_venta_id'],"</td>";
							echo "<td align='center'>",$fin_V['rela_venta_id'],"</td>";
							echo "<td align='center'>",$fin_V['rela_producto_id'],"</td>";
							echo "<td align='center'>", "$", $fin_V['nprecio'],"</td>";
							echo "<td align='center'>",$fin_V['ncant_x_prod'],"</td>";
							
			echo "</tr>";					//Final de la segunda fila de la tabla
			
		}
			?>	
</table>			<!-- Final de la segunda tabla -->
	
		<?php
	$borrar_intermedio="TRUNCATE TABLE venta_intermedio";			//Variable que almacena el codigo sql para borrar (y reiniciar) todos los registros de la tabla venta_intermedio
	$resultado_final=$conexion->query($borrar_intermedio);			//Codigo sql para enlazar el la base de datos
	?>
<a class="btn btn-success" href="nueva_venta.php">Realizar otra Venta</a>			<!-- Boton para volver la pagina de ventas -->
<a class="btn btn-primary" href="lista_venta.php">Volver a la Lista</a>			<!-- Boton para volver al listado de ventas  -->
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
