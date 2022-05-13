<?php
//Vistas incluidas
include("../Includes/header.php");		//No permite ver los errores

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Editar Proveedor</title>
<link rel="stylesheet" href="../estilo.css">

</head>

<body>

<?php
        require '../conexion.php';				//Codigo para conectar con la base de datos
					//Variables en donde se almacenan los valores enviados desde el formulario modif_prov.php
        $id=$_POST['id_prov'];
		$nombre=$_POST['nombre'];
        $direccion = $_POST['direccion'];
		$tel=$_POST['phone'];
	$correo=$_POST['correo'];
					//Codigo para actualizar un registro de la tabla proveedores
	$guardar="update proveedores set cnombre_prov='$nombre',
	cdireccion_prov='$direccion', ntelefono_prov='$tel',
	ccorreo_prov='$correo' where proveedor_id=$id ";

        $resultado= $conexion->query($guardar);					//Codigo para enlazar el sql $guardar con la base de datos
        if($conexion->errno) die($conexion->error);
	
	if($resultado){				//Si se cumple la condicion $resultado correctamente	
		echo'<script type="text/javascript">
		alert("Datos del Proveedor Actualizados Correctamente");
		window.location.href="lista_prov.php";
		</script>';
	}else{				//Si la condicion $resultado no se cumple
		
		echo "<h1><span class='red'>Error</span> al Actualizar los Datos</h1>";		//Imprime un mensaje de error
		echo "<h2>Vuelva a Intentar</h2>";												//Y un aviso de vuelva a intentar
		
	}
       
	
    ?>



    
</body>
</html>