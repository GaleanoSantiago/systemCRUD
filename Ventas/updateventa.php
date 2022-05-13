<?php
//Vistas incluidas
include("../Includes/header.php");

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Actualizacion de los Datos</title>
<link rel="stylesheet" href="../css/styles.css">
</head>

<body>

	
<?php
	
	$id_venta=$_POST['id_venta'];																//Variable que almacena el valor venta_id enviado del formulario modif_venta.php
	$codigo_barra=$_POST["codb"];																//Variable que almacena el valor codb enviado del formulario modif_venta.php
	$cant=$_POST["cant"];																		//Variable que almacena el valor cant enviado del formulario moduf_venta.php
	
	require("../conexion.php");																	//Realiza la conexion con la base de datos por medio del archivo conexion

	$pre_consulta= "select * from productos where ncodigo_barra= $codigo_barra";				//Consulta sql que selecciona aquel producto que coincida con el codigo de barra almacenado en la variable $codigo_barra
	$pre_resultado=$conexion->query($pre_consulta);												//Codigo que enlaza la consulta sql con la base de datos
	
		
	$funciono=0;									//Variable utilizada para saber si se eligio un producto que se encuentra en la BD
		
	 while($pre_fin = $pre_resultado->fetch_assoc()){											//Mintras secumpla la condicion
																								//Se definen las variables con los datos traidos de la bd
		$nombre_producto=$pre_fin['cnombre_producto'];										
		$marca_producto=$pre_fin['cmarca_producto'];			
		$precio_producto=$pre_fin['nprecio_producto'];
 		$precio_total=$cant*$precio_producto;													//Precio total es igual a la operacion matematica "cantidad X precio del producto"
	
		echo "<p>";
		 		 
		
		//Codigo sql para actualizar los registros de la bd
		$guardar="update venta_intermedio set ncodigo_barra=$codigo_barra, cnombre='$nombre_producto', cmarca='$marca_producto', nprecio=$precio_producto, ncantidad=$cant, nprecio_total=$precio_total where venta_inter_id=$id_venta ";
		$resultado=$conexion->query($guardar);													//Codigo que enlaza el sql con la base de datos 
		 
		 
		 $consulta = "select * from venta_intermedio where venta_inter_id=$id_venta";							//Consulta que selecciona todos los registros de venta_intermedio donde su id sea igual al almacenado en la variable id_venta
			$resultado2 = $conexion->query($consulta);															//Consulta que enlaza el sql con la base de datos
			if($conexion->errno) die($conexion->error);
		
		 
		 
			echo'<script type="text/javascript">
			alert("Registro actualizado correctamente");				
			window.location.href="nueva_venta.php";
			</script>';														//Alert que avisa al usuario que el registro se actualizo
		$funciono=1;							//Si el producto existe $funciono es igual a 1
	 }
	 
	if($funciono<1){							//Si $funciono es menor a 1 significa que el producto no se encontro en la BD
		echo'<script type="text/javascript">
			alert("Error al actualizar el producto");				
			window.location.href="modif_venta.php?ids=', $id_venta, '";
			</script>';	
	}
		

	  

	
	?>
		
	
</body>
</html>
