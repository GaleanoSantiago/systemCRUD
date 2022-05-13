<?php
//Vistas incluidas
include("../Includes/header.php");

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Pagina de Ventas</title>
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
    		<h1 class="text-center">Realizar una <span class="text-danger">Venta</span></h1>        <!-- Titulo -->
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

<div class="container">
	<div class="row mt-4">
		<div class="shadow col-lg-6 col-md-12 col-sm-12 border rounded" >
		<form method="post" action="nueva_venta.php">			<!-- Formulario para buscar el producto por el codigo de barra -->
			<div class="form-group mb-3 pt-3">
				<label for="codb" class="form-label">Ingrese el Código de Barras</label>
				
				<input type="number" class="form-control" name="codb" id="codb" placeholder="ingrese código" required>
			</div>
			<div class="form-group mb-3">
				<label for="cant" class="form-label">Ingrese Cantidad del Producto</label>
				<input type="number" class="form-control" name="cant" id="cant" min="1" required>
			</div>	
			<div class="form-control mb-3 text-center">
			<input class="btn btn-success" type="submit" value="Buscar">		<!-- Boton para enviar -->
			<button type="reset" class="btn btn-danger ">Cancelar</button>
			</div>
	</form>
	</div>
	<div class="col-lg-12 col-md-12 col-sm-12">
	<form action="cargarventa.php" method="post">					<!-- Formulario para enviar los datos al archivo cargarventa.php -->
	<table class="shadow border table table-striped table-hover">			<!-- Inicio de la Segunda Tabla -->
  <thead >
	<tr>			<!-- Inicio de la primera fila -->
    <th class="border border-dark">Id</th>
    <th class="border border-dark">Codigo de Barras</th>
    <th class="border border-dark">Descripcion</th>
    <th class="border border-dark">Marca</th>
    <th class="border border-dark">Precio</th>
    <th class="border border-dark">Cantidad</th>
    <th class="border border-dark">Precio Total por Articulo</th>
    <th class="border border-dark"><span class="text-primary">Modificar</span></th>
    <th class="border border-dark"><span class="text-danger">Eliminar</span></th>
    </tr>		<!-- Final de la primera fila -->
	</thead>

<?php
		
		if (isset($_POST['codb'])){								//Si el formulario anterior se envia
			$codigo_b=$_POST['codb'];							//Se define una variable en donde se almacena el codigo de barra del producto
			require("../conexion.php");							//Se conecta con la base de datos por medio del archivo conexion.php
			$pre_consulta= "select * from productos where ncodigo_barra= $codigo_b";			//Consulta sql que selecciona el producto que coincida con el codigo de barras ingresado en el primer formulario
			$pre_resultado=$conexion->query($pre_consulta);										//Enlaza el sql con la base de datos por medio del archivo conexion
			

		}
		
	
?>
	
	<?php
		if(empty($pre_resultado)){									//Si la variable $pre_resultado no contiene ningun dato, debido a que el codigo sql no selecciono ningun registro
			echo " ";												//No se imprimira nada por pantalla
		}else{														//Si por el contrario, la variable $pre_resultado si contiene datos
        while($pre_fin = $pre_resultado->fetch_assoc()){			//Se ejecutará un codigo en donde se almacenarán los datos de cada registro en variables para facilitar su utilizacion
			$id_producto=$pre_fin['producto_id'];
			$nombre_producto=$pre_fin['cnombre_producto'];
			$marca_producto=$pre_fin['cmarca_producto'];
			$precio_producto=$pre_fin['nprecio_producto'];
			$stock_actual=$pre_fin['nstock_actual'];
			$stock_min=$pre_fin['nstock_min'];
			
			
			if (isset($_POST['cant'])){								//Si "cant" es definida
		$cantidad=$_POST['cant'];									//$cantidad es igual a "cant", valor recibido del primer formulario
		
				}else{												//En caso contrario, si cant no es definido
				$cantidad=1;										//La variable $cantidad es definido como 1
				
			}
			$precio_total=$cantidad*$precio_producto;				//La variable $precio_total es igual a la variable $cantidad por la variable $precio_producto
			
		             
			$pre_guardar="insert into venta_intermedio (ncodigo_barra, cnombre, cmarca, nprecio, ncantidad, nprecio_total) values ($codigo_b, '$nombre_producto', '$marca_producto', $precio_producto, $cantidad, $precio_total )";				//Codigo sql para guardar un los datos de un producto en la tabla venta_intermedio. 
																																																												//La tabla venta_intermedio es una tabla especial en la que se almacenan los datos que luego serán usados para realizar las ventas finales
			$result=$conexion->query($pre_guardar);					//Codigo para enlazar el sql $pre_guardar con la BD
			
			
	
	$stock_restante=$stock_actual-$cantidad;						//La variable $stock_restante es igual a la resta de $stock_actual menos $cantidad
	
	if($stock_restante<$stock_min){									//Si $stock_restante es menor a $stock_actual
																	//Saltará una ventana de alerta que avisará que se excedio la cantidad de un determinado producto, pues es mas de lo que poseemos en la BD.
		echo "<script> alert('Ha excedido la cantidad minima |Stock actual: $stock_actual| Stock minimo: $stock_min| Cantidad ingresada: $cantidad|');</script>";
		if($stock_restante<=0){										//Si $stock_restante es igual o menor que 0
		$variableAgregar=0;											//$variableAgregar es igual a 0
		}else{														//En caso contrario
			$variableAgregar=1;										//$variableAgregar será igual a 1
		}	
	}
		}
		}
	
	
?>
	
	<?php
		$cont_cant=0;												//Definimos la variable $cont_cant como 0
		$cont_precio=0;												//Definimos la variable $cont_precio como 0
		require ("../conexion.php");								//Conectamos con la base de datos
		$consulta = "select * from venta_intermedio ";				//Consulta sql para seleccionar todos los registros de la tabla venta_intermedio
			
		$resultado = $conexion->query($consulta);					//Enlazamos el codigo sql con la BD
			if($conexion->errno) die($conexion->error);				
		
		
		if(empty($resultado) ){										//Si la variable $resultado esta vacio
			echo " ";												//No se imprimirá nada por pantalla
		}else{ 
																	//En caso contrario
			if($variableAgregar=0){									//Si la variable $variableAgregar es igual a 0
				echo "  ";											//No se imprimirá nada por pantalla
			}else if($variableAgregar=1){							//En caso contrario, si la variable $variableAgregar es igual a 1. Se imprimirá por pantalla la segunda fila de la tabla
				
			
        while($fin = $resultado->fetch_assoc()){					//Mientras $resultado->fetch_assoc()
		                    
			echo "<tr>";		//Inicio de la segunda fila. Acá se exhiben los datos traidos de la tabla "venta_intermedio" 
                            echo "<td class='border text-center'>",$fin['venta_inter_id'],"</td>";
							echo "<td >",$fin['ncodigo_barra'],"</td>";
							echo "<td>",$fin['cnombre'],"</td>";
							echo "<td>",$fin['cmarca'],"</td>";
							echo "<td>", "$", $fin['nprecio'],"</td>";
							echo "<td>",$fin['ncantidad'],"</td>";
							echo "<td>", "$", $fin['nprecio_total'],"</td>";
							echo "<td class='border text-center'><a class='btn btn-primary' href='modif_venta.php?ids=".$fin["venta_inter_id"]."'>Editar</a></td>";			//Envia el dato almacenado en "venta_inter_id" a la pagina "modif_venta.php" por medio del metodo GET
							
							echo "<td class='border text-center'><a class='btn btn-danger' Onclick='return ConfirmDelete();' href='../checked.php?eliminar=elimVentaIntermedia&ids=".$fin["venta_inter_id"]."'>Eliminar</a></td>";		//Envia el dato almacenado en "venta_inter_id" a la pagina "eliminarventa.php" por medio del metodo GET
							echo "</tr>";		//Final de la segunda fila
			
 			$cantidad_TICKET=$fin['ncantidad']; 				//$cantidad_TICKET es igual al valor de ncantidad traido de la tabla venta_intermedio
			$cont_cant=$cont_cant+$cantidad_TICKET;				//$cont_cant es igual a $cont_cant más $cantidad_TICKET
			
			$precio_TICKETtotal=$fin['nprecio_total'];			//$precio_TICKETtotal es igual al valor de nprecio_total traido de la tabla venta_intermedio
			$cont_precio=$cont_precio+$precio_TICKETtotal;		//$cont_precio es igual a $cont_precio más $precio_TICKETtotal
			
			
		}
				}
		}
	
		
		
?>

</table>
	</div>
	</div>
	<div class="row mt-3 mb-3" >
		<div class="col-lg-3 col-md-12 col-sm-12">
		<table  class="shadow border table table-striped">						<!-- Inicio de la tercera tabla. Acá se imprimen los datos de $cont_cant y $cont_precio. Es decir, la cantidad total de productos y la cantidad total de dinero a pagar -->
		<tr>
		<th>
			 Cantidad Total
		</th>
		<th>
			Precio Total $
		</th>
		
		
	</tr>
	
	<tr>
		<th>
		<input type="number" class="form-control" name="cant_total" id="cant_total" value="<?php echo $cont_cant; ?>" required readonly>
			
		</th>
		<th>
		<input type="number" class="form-control" name="precio_completo" id="precio_completo" value="<?php echo $cont_precio; ?>" required readonly>
		</th>
		
	</tr>
	<tr>
		<td colspan="2">
			
			<select class="form-select" name="med_pago" id="med_pago">
				
				<option value="0">Seleccionar Medio de Pago</option>				<!-- Definimos que el texto predeterminado sea MEDIO DE PAGO, con un valor de 0 -->
				<?php
		$consulta_mdp="SELECT * FROM medios_pago ORDER BY cdescripcion_med_pago";			//consulta sql para seleccionar todos los registros de medios_pago ordenandolos por su nombre
		$resul= $conexion->query($consulta_mdp);											//Enlazar el sql con la BD
		while($valores=mysqli_fetch_array($resul)){											//Mientras se cumpla esta condicion
			echo '<option value="'.$valores[med_pago_id].'">'. $valores[cdescripcion_med_pago]. '</option>';			//Se imprime un select con los valores de la tabla de medios_pago
		}
		?>
			</select>
			
		</td>
		
	</tr>
	
	</table>	
	</div>
	</div>
</div>


		<div class="container mb-3">
	<div class="form-group text-center">
	  <input class="btn btn-success" type="submit" value="Realizar Venta">				<!-- Boton de enviar el formulario -->
	  <a class="btn btn-primary" href="lista_venta.php">Volver a la Lista</a>			<!-- Boton de volver al listado de ventas -->
	</div>
	</div>
	</form>									
	


<!--Jquery bootstrap y popper-->
<script src="../jquery/jquery-3.3.1.min.js"></script>
<script src="../css/bootstrap/js/bootstrap.min.js"></script>
<script src="../popper/popper.min.js"></script> 	


 <!-- datatables JS -->
<script type="text/javascript" src="../assets/datatables/datatables.min.js"></script>    

<!-- JS -->
<script src="../main.js" charset="utf-8"></script>
<script src="../js/menu_lateral.js"> </script>
					<!-- JS para el boton eliminar -->
<script>
    function ConfirmDelete()
    {
      var x = confirm("¿Esta seguro que quiere eliminar este producto?");
      if (x)
          return true;
      else
        return false;
    }
</script>  
</body>
</html>