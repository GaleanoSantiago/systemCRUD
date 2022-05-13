<?php
//Vistas incluidas
include("../Includes/header.php");		//No permite ver los errores

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Editar Rubro</title>
<link rel="stylesheet" href="../estilo.css">

</head>

<body>
	

<?php
        require '../conexion.php';				//Php para conectar con la base de datos por medio del archivo conexion.php
					//Variables donde se guardan los valores enviados del formulario modif_tipop.php
		$id = $_POST['id'];						
        $nombre = $_POST['nombre'];
        $guardar="UPDATE rubros SET cnombre_rubro = '$nombre' WHERE rubro_id = '$id'";			//Codigo sql para actualizar un registro especifico de la tabla rubros, aquel que coincidia con $id
	
		$resultado= $conexion->query($guardar);						//Codigo para enlazar el sql $guardar con la BD
        if($conexion->errno) die($conexion->error);
	
	if($resultado){				//Si la condicion $resultado se cumple

		echo'<script type="text/javascript">
		alert("Rubro Actualizado Correctamente");
		window.location.href="lista_tipop.php";
		</script>';

	}else{						//Si la condicion $resultado no se cumple
		
		echo "<h2><span class='red'>Error</span> al Actualizar los Datos</h2>";			//Imprime un mensaje de error
		echo "<h3>Vuelva a Intentar</h3>";												//Y un mensaje de "Vuelva a intentarlo"
		
	}
       
        ?>
</body>
</html>