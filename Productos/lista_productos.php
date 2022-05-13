<?php
//Vistas incluidas
include("../Includes/header.php");

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Lista de Productos</title>
<!-- Bootstrap -->
<link rel="stylesheet" href="../css/bootstrap/css/bootstrap.min.css" type="text/css">

<!--Enlaces para la datatable-->    
<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">    
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">-->
<!--<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">-->

<!--datables CSS básico-->
<link rel="stylesheet" type="text/css" href="../assets/datatables/datatables.min.css"/>
    <!--datables estilo bootstrap 5 CSS-->  
<link rel="stylesheet"  type="text/css" href="../assets/datatables/DataTables-1.11.3/css/dataTables.bootstrap5.min.css">   

<!-- Estilos Propios--->
<link rel="stylesheet" href="../css/styles.css" type="text/css">

</head>

<body >
<header>
	<div class="container">
		<div class="row ">
			<div class="col-lg-12">
    		<h1 class="text-center">Lista de <span class="text-danger">Productos</span></h1>        <!-- Titulo -->
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

require "../conexion.php";		//Php para conectar con la base de datos
$fecha_actual=date("Y-m-d");	//Variable que guarda la fecha del dia en la que se carga el producto



if($acceso==1){									//Determina si el usuario es admin. Solo si es admin aparecerá el boton
	?>  

<div>
<div class="container" style="">
    <div class="row">
        <div class="col-lg-12">  
  <a class="btn btn-success" data-bs-toggle="collapse" href="#collapseForm" role="button" aria-expanded="false" aria-controls="collapseForm">
    Agregar Nuevo Producto
  </a>
  
</p>
<div class="collapse" id="collapseForm">
  <div class="card card-body">
	<form action="lista_productos.php" method="POST">										<!-- Formulario que envia al mismo archivo -->
    <div class="container">
	<div class="row">
  	<div class="col-lg-6 col-md-6 col-sm-12" >
	<div class="mb-3">
		<input type="hidden" name="accion" value="confirmacion">							<!-- Input oculto para confirmar que el formulario se envio -->
	<label for="codigo_barra" class="form-label" >Codigo de Barra</label>
	<input type="number" class="form-control" name="codigo_barra" id="codigo_barra" min="0" required >
	</div>
	<div class="mb-3">
	<label for="name" class="form-label" >Nombre</label>
	<input type="text" class="form-control" name="name" id="name" required>
	</div>
	<div class="mb-3">
	<label for="marca" class="form-label">Marca</label> 
	<input type="text" class="form-control" name="marca" id="marca" required>
	</div>
	<div class="mb-3">
		<label for="rubro" class="form-label">Rubro</label>	
		<select name="rubro" id="rubro" class="form-select">
			<option value="0">Seleccionar un Rubro</option>							<!-- Que lo primero que mueste el select sea SELECCIONAR y tenga un valor 0 -->
			<?php
			
			$consulta="SELECT * FROM rubros ORDER BY cnombre_rubro";		//Consulta sql donde selecciona todos los registros de la tabla rubros y los ordena por "cnombre_rubro"
		$resultado= $conexion->query($consulta);							//Enlaza la consulta sql con la base de datos por medio del archivo conexion.php
		while($valores=mysqli_fetch_array($resultado)){						//Mientras se cumpla la condicion $resultado
			echo '<option value="'.$valores[rubro_id].'">'. $valores[cnombre_rubro]. '</option>';		//Imprimir por pantalla el nombre de los rubros en el select
		}
			?>
			
		</select>
		</div>
		<div class="mb-3">
		<label for="stock_act" class="form-label">Stock Actual</label>	
		<input type="number" class="form-control" name="stock_act" id="stock_act" min="1" required >
		</div>
		</div> <!--Cierre de la primera columna-->
		<div class="col-lg-6 col-md-6 col-sm-12">
		<div class="mb-3">
		<label for="stock_act" class="form-label">Stock Minimo</label>	
		<input type="number" class="form-control" name="stock_min" id="stock_min" min="1" required>
		</div>
	  <div class="mb-3">
		<label for="precio" class="form-label">Precio</label>	
		<input type="number" class="form-control" name="precio" id="precio" min="1" required></td>
		</div>
		<div class="mb-3">
		<label for="fecha_alta" class="form-label">Fecha de Alta</label>	
		<input type="date" name="fecha_alta" id="fecha_alta" class="form-control" value="<?php echo $fecha_actual; ?>"
        min="<?php echo $fecha_actual; ?>" max="<?php echo $fecha_actual; ?>" >
		</div>
		<div class="mb-3">
		<label for="proved" class="form-label">Proveedores</label>	
			<select name="proved" id="proved" class="form-select">
				<option value="0">Seleccionar un Proveedor</option>						<!-- Que lo primero que mueste el select sea SELECCIONAR y tenga un valor 0 -->
				<?php
				
				$consulta2="SELECT * FROM proveedores ORDER BY cnombre_prov";		//Consulta sql donde selecciona todos los registros de la tabla proveedores y los ordena por "cnombre_prov"
		$resultado2= $conexion->query($consulta2);									//Enlaza la consulta sql con la base de datos por medio del archivo conexion.php
		while($valores2=mysqli_fetch_array($resultado2)){							//Mientras se cumpla la condicion $resultado2
			echo '<option value="'.$valores2[proveedor_id].'">'. $valores2[cnombre_prov]. '</option>';		//Imprimir por pantalla el nombre de los proveedores en el select
		}
				?>
				
			</select>
		</div>
		<br>
  		<button type="submit" class="btn btn-primary">Almacenar</button>					<!-- Boton para almacenar productos -->
		<button type="reset" class="btn btn-danger">Cancelar</button>						<!-- Boton para resetear los campos -->
	</form></div>
			
	</div>
  </div>
</div>
<br><!--Para dejar un espacio entre el formulario y la tabla-->
 
</div>
</div>    
        </div>    
    </div>   
<?php
}
	?>
<?php
		
    
	if (isset($_POST['accion'])){								//Si el formulario anterior se envia. Utilizando el input oculto de accion
			//Define las variables
		$codigo_bar=$_POST['codigo_barra'];			
		$nombre =$_POST['name'];
		$marca = $_POST['marca'];
		$stock_actual = $_POST['stock_act'];
		$stock_min= $_POST['stock_min'];
		$precio = $_POST['precio'];
		$fecha_alta= $_POST['fecha_alta'];
		$id_prov=$_POST['proved'];
		$rubro=$_POST['rubro'];
		/*echo "Codigo de Barra: ", $codigo_bar;
		echo "<br>";
		echo "Nombre del producto: ", $nombre;
		echo "<br>";
		echo "Marca: ", $marca;
		echo "<br>";
		echo "Stock Actual: ", $stock_actual;
		echo "<br>";
		echo "Stock Minimo: ", $stock_min;
		echo "<br>";
		echo "Precio", $precio;
		echo "<br>";
		echo "Fecha de Alta: ", $fecha_alta;
		echo "<br>";
		echo "Id Proveedor", $id_prov;
		echo "<br>";
		echo "ID Rubro", $rubro;*/
		//echo "<script>window.alert('Producto Almacenado Correctamente');</script>";

		$guardar="INSERT INTO `productos` (`ncodigo_barra`, `cnombre_producto`, `cmarca_producto`, `rela_rubro_id`, `nstock_actual`, `nstock_min`, `nprecio_producto`, `dfecha_alta_producto`, `rela_proveedor_id`) 
		VALUES ('$codigo_bar', '$nombre', '$marca', '$rubro', '$stock_actual', '$stock_min', '$precio', '$fecha_alta', '$id_prov');"; //Codigo sql para insertar un registro a la tabla productos
		$resultado2=$conexion->query($guardar);			//Codigo para conectar el sql a la base de datos
	}
	
	
	$consulta = "SELECT * from productos order by producto_id asc";		//consulta sql, trae todos los registros de la tabla productos, ordenando los datos en base a productos_id de manera ascendente
    $resultado = $conexion->query($consulta);							//enlazando la consulta con la base de datos
    if($conexion->errno) die($conexion->error);


    ?>		
<div>
<!--<script>
var resultado = window.confirm('Estas seguro?');
if (resultado === true) {
    window.alert('Okay, si estas seguro.');
} else { 
    window.alert('Pareces indeciso');
}
</script>-->
</div>	
<form action='../checked.php' method='POST'>
	<div class="container">							<!-- Tabla de Productos -->
		<div class="row">
			<div class="col-lg-12">
				<div class="table-responsive">
        			<table id="tablaProductos" class=" shadow-lg border border-bottom table table-striped table-hover">	<!-- INICIO DE LA TABLA --> 
        
					<thead class=""> 
					<tr>			<!-- Primera fila de la tabla -->
					<?php if($acceso==1){	?>
					<th class="border border-dark">#</th>
					<?php }	?>
					<th class="border border-dark">Id</th>
					<th class="border border-dark">Codigo Barra</th>
					<th class="border border-dark">Nombre</th>
					<th class="border border-dark">Marca</th>
					<th class="border border-dark">Rubro</th>
					<th class="border border-dark">Stock Actual</th>
					<th class="border border-dark">Stock Minimo</th>
					<th class="border border-dark">Precio</th>
					<th class="border border-dark">Fecha de Alta</th>
					<th class="border border-dark">Proveedor</th>  
					<?php 
						if($acceso==1){
						echo "<th class='border border-dark'>Editar</th>";
						echo "<th class='border border-dark'>Eliminar</th>";	   
					}
						?>
						
					
						</tr>
						</thead>
						<?php	
				
			$nom_rb="-";			//Creo una variable para almacenar el nombre de los rubros. Y lo defino como texto 
			$nom_prov="-";			//Creo una variable para almacenar el nombre de los proveedores. Y lo defino como texto
			$contador=0;                            //Inicializo el contador para los checkboxs como 0
			
				
				
	while($fin = $resultado->fetch_assoc()){ 		//Mientras se cumpla la condicion $resultado
	$id_rb=$fin['rela_rubro_id'];							//$id_prov será igual al dato almacenado en el campo "rela_rubro_id" de la tabla productos
	$id_pv=$fin['rela_proveedor_id'];						//$id_pv será igual al dato almacenado en el campo "rela_proveedor_id" de la tabla productos
	
	$consulta2 = "SELECT * FROM `rubros` where rubro_id='$id_rb'";		//Segunda consulta sql, selecciona todos los registros de la tabla rubros en donde rubro_id sea igual al valor almacenado en la variable $id_rb
	$resultado2 = $conexion->query($consulta2);							//Enlaza la consulta con la bd
	if($conexion->errno) die($conexion->error);
	while($fin2 = $resultado2->fetch_assoc()){ 							//Mientras se cumpla la condicion "resultado2"  
              $nom_rb= $fin2['cnombre_rubro']; 							//La variable $nom_rb será igual al dato almacenado en el campo "cnombre_rubro" de la tabla rubros
          }

	$consulta3="SELECT * FROM `proveedores` where proveedor_id='$id_pv'";	//Tercera consulta sql, selecciona todos los registros de la tabla proveedores en donde proveedor_id sea igual al valor almacenado en la variable $id_pv
	$resultado3 = $conexion->query($consulta3);							//Enlaza la consulta sql con la BD
	if($conexion->errno) die($conexion->error);
	
	while($fin3 = $resultado3->fetch_assoc()){ 							//Mientras se cumpla la condicion $resultado3
              $nom_prov= $fin3['cnombre_prov'];							//La variable $nom_prov será igual al dato almacenado en el campo "cnombre_prov" de la tabla proveedores
        }

		$contador=$contador+1;                  //Contador para los checkboxs
	 						
		echo  "<tr>";		//Segunda fila de la tabla. En esta parte del codigo se exhiben los datos traidos de las consultas sql realizadas anteriormente
		if($acceso==1){
			echo "<td class='border '> <input class='form-check-input case' type='checkbox' value='".$fin['producto_id']."' id='flexCheckDefault' name='check_".$contador."'></td>";
		}
			echo "<th>  ",$fin['producto_id'],"  </th>";
			echo "<td>  ",$fin['ncodigo_barra'],"  </td>";
			echo "<td>  ",$fin['cnombre_producto'],"  </td>";
			echo "<td>  ",$fin['cmarca_producto'],"  </td>";
			echo "<td>  ",$nom_rb,"  </td>";
			echo "<td>  ",$fin['nstock_actual'],"  </td> ";
			echo "<td>  ",$fin['nstock_min'],"  </td>";
			echo "<td>  $",$fin['nprecio_producto'],"  </td>";
			echo "<td>  ",$fin['dfecha_alta_producto'],"  </td>";
			echo "<td>  ",$nom_prov,"  </td>";
						//Codigo para enviar los datos por medio de GET
				if($acceso==1){								//Solo si el usuario es admin podrá acceder a estos botones
					echo "<td class='border'>  <a class='btn btn-primary' href='modif_prod.php?ids=".$fin['producto_id']."'>Editar</a></td>";		//Envia el dato almacenado en "producto_id" a la pagina "modif_prod.php" por medio del metodo GET
					echo " <td class='border'> <a Onclick='return ConfirmDelete();' class='btn btn-danger' href='../checked.php?eliminar=elimProducto&ids=".$fin['producto_id']."'>Eliminar</a></td>";	//Envia el dato almacenado en "producto_id" a la pagina "elimproducto.php" por medio del metodo GET
				}
		echo "</tr>";		//Fin de la segunda fila
					
	}
				
          ?>

      				</table>		<!-- FIN DE LA TABLA -->
				</div>
			</div>
		</div>
        <input type="hidden" name="elimProductoCheck" value="<?php echo $contador ?>">
		<?php if($acceso==1){	?>		<!-- Codigo para verificar los usuarios -->
		<div class="d-flex bd-highlight">
            <div class="p-2 flex-grow-1 bd-highlight">
            <input type="checkbox" id="selectall"> Seleccionar todo
			</div>
            <div class="p-2 bd-highlight">
            <span class="text-secondary">Opcion para los elementos seleccionados   </span>
            <input type="submit" class="btn btn-dark" name="eliminar" id="eliminar" value="Eliminar" Onclick="return ConfirmDelete();">
            </div>
            <div class="p-2 bd-highlight"></div> <!-- Para otro boton al lado del de eliminar -->
            <div class="p-2 bd-highlight"></div> <!-- Para otro boton al lado del de eliminar -->
        </div>
        <?php }	?>
	
	</div>			
	</form>                         <!--Fin Formulario para los checkboxs-->

<br>
<br>

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
//Funcion para el boton de eliminar
    function ConfirmDelete()
    {
      var x = confirm("¿Seguro que quiere eliminar el producto?");
      if (x)
          return true;
      else
        return false;
    }

//Script para el check de selectall
    // añade multiples funcionalidades de select/unselect
	$("#selectall").on("click", function() {
  $(".case").prop("checked", this.checked);
});

//  si todos los checkboxs son seleccionados, el "checkbox selectall" se checkea. Y viceversa
$(".case").on("click", function() {
  if ($(".case").length == $(".case:checked").length) {
    $("#selectall").prop("checked", true);
  } else {
    $("#selectall").prop("checked", false);
  }
});
</script>  
</body>
</html>
