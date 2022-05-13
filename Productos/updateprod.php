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

</head>

<body>
	
<?php
        require '../conexion.php';						//Php para conectar con la base de datos
							//Variables en donde se guardan los datos enviados del archivo modif_prod.php
        $id=$_POST['id_producto'];
		$codigo_barra=$_POST['codigo_b'];
		$nombre = $_POST['nombre'];
		$marca=$_POST['marca'];
		$id_rubro=$_POST['id_rubro'];
		$stock_actual=$_POST['stock_actual'];
		$stock_min=$_POST['stock_minim'];
		$precio=$_POST['precio'];
		$fecha_alta=$_POST['fecha_alta'];
		$id_prov=$_POST['id_prov'];
	
					//Codigo para actualizar un registro de la tabla productos
	$guardar="update productos set cnombre_producto='$nombre',
	cmarca_producto='$marca', rela_rubro_id=$id_rubro,
	nstock_actual=$stock_actual, nstock_min=$stock_min,
	nprecio_producto = $precio, 
	dfecha_alta_producto='$fecha_alta',
	rela_proveedor_id = $id_prov where producto_id=$id ";					
	
        $resultado= $conexion->query($guardar);			//Enlaza el sql con la base de datos
        if($conexion->errno) die($conexion->error);
	
	if($resultado){							//Si la variable $resultado se lleva a cabo correctamente
		echo'<script type="text/javascript">
		alert("Producto Actualizado Correctamente");
		window.location.href="lista_productos.php";
		</script>';
	
	}else{					//Si la condicion de $resultado no se cumple

		echo "<h2><span class='red'>Error</span> al Actualizar los Datos</h2>";		//Imprime por pantalla un mensaje de error
		echo "<h3>Vuelva a Intentar</h3>";
		
	}
       
	
    ?>
</div>
<center>
<a href="lista_productos.php"><input type="submit" value="Volver"></a>			<!-- Boton para volver a la lista de productos -->
</center>

</body>
</html>