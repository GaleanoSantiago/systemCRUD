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
<title>Lista de Proveedores</title>
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
    		<h1 class="text-center">Lista de <span class="text-danger">Proveedores</span></h1>        <!-- Titulo -->
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
        <div class="item">
            <a href="../inicio.php">
                <div class="icon"> <img src="../imagenes/iconos/inicio.png" width="40px"> </div>
                <div class="title">Inicio</div>
            </a>
        </div>
        <div class="item separator">
        </div>
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
require "../conexion.php";          //Php para conectar con la base de datos por medio del archivo conexion.php

if($acceso==1){                     //Determina si el usuario es admin. Solo si es admin aparecerá el boton
?>
    <div>

<div class="container" style="">
    <div class="row">
        <div class="col-lg-12"> 

    			<!-- Boton para la ventana modal -->
	<button type="button" class="btn btn-success mb-4" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
	Agregar Nuevo Proveedor
	</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Nuevo Proveedor</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
    <form action="lista_prov.php" method="POST" id="formularioProv">
        
        <div class="mb-3">
            <input type="hidden" name="accion" value="confirmacion">
            <label for="nombre" class="form-label" >Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" required >
        </div>
        <div class="mb-3">
            <label for="direccion" class="form-label" >Direccion</label>
            <input type="text" name="direccion" id="direccion"  class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="tel" class="form-label">Numero de Celular</label> 
            <input type="tel" name="phone" id="phone" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="correo" class="form-label">Correo</label>	
            <input type="email" name="correo" id="correo" class="form-control" required >
        </div>
            
	</form>

      </div>
      <div class="modal-footer">
        <div class="pe-2 border-end">
        <button type="submit" class="btn btn-primary" form="formularioProv">Almacenar</button>
        <button type="reset" class="btn btn-danger" form="formularioProv">Cancelar</button>
        </div>
        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
        
      </div>
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
		
    
	if (isset($_POST['accion'])){								//Si el formulario anterior se envia
			//Define las variables
            $nombre=$_POST['nombre'];
            $direccion =$_POST['direccion'];
            $correo = $_POST['correo'];
            $tel = $_POST['phone'];
            
            
            $guardar="INSERT INTO `proveedores` (`cnombre_prov`, `cdireccion_prov`, `ntelefono_prov`, `ccorreo_prov`) VALUES ('$nombre', '$direccion', '$tel', '$correo');";	//Esta linea de codigo almacena el sql que permite insertar registros a la tabla de proveedores
            $resultado2=$conexion->query($guardar);		//Codigo que enlaza el codigo sql con la base de datos
	}
	
	
    $consulta = "SELECT * from proveedores order by proveedor_id asc";      //consulta sql, trae todos los registros de la tabla proveedores, ordenando los datos en base a proveedor_id de manera ascendente
    $resultado = $conexion->query($consulta);                               //enlazando la consulta con la base de datos
    if($conexion->errno) die($conexion->error);

    ?>		
<form action='../checked.php' method='POST'>
<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="table-responsive">
        <table id="tablaProductos" class="shadow-lg table table-striped table-hover">      <!-- INICIO DE LA TABLA --> 
            <thead>
            <tr>                <!-- Inicio de la primera fila de la tabla -->
            <?php if($acceso==1){	?>
			<th class="border border-dark">#</th>
			<?php }	?>
			<th class="border border-dark">Id Proveedor</th>
            <th class="border border-dark">Nombre</th>
			<th class="border border-dark">Direccion</th>
			<th class="border border-dark">Telefono</th>
			<th class="border border-dark">Correo</th>
            <?php if($acceso==1){
            echo "<th class='border border-dark'>Editar</th>";
            echo "<th class='border border-dark'>Eliminar</th>";
            }
            ?>
          	
           
            </tr>               <!-- Final de la primera fila de la tabla -->
            </thead>
            <?php
			$contador=0;                            //Inicializo el contador para los checkboxs como 0

            while($fin = $resultado->fetch_assoc()){ 
        		$contador=$contador+1;                  //Contador para los checkboxs

              echo  "<tr>";     //Inicio de la segunda fila de la tabla. En esta parte del codigo se exhiben los datos traidos de la consulta sql realizada anteriormente
            if($acceso==1){
              echo "<td class='border '> <input class='form-check-input case' type='checkbox' value='".$fin['proveedor_id']."' id='flexCheckDefault' name='check_".$contador."'></td>";
            }
              echo "<th>  ",$fin['proveedor_id'],"  </th>";
			  echo "<td>  ",$fin['cnombre_prov'],"  </td>";
              echo "<td>  ",$fin['cdireccion_prov'],"  </td>";
			  echo "<td>  ",$fin['ntelefono_prov'],"  </td>";
			  echo "<td>  ",$fin['ccorreo_prov'],"  </td>";
				 
                //Codigo para enviar los datos por medio de GET   
            if($acceso==1){
              echo "<td class='border'>  <a class='btn btn-primary' href='modif_prov.php?ids=".$fin['proveedor_id']."'>Editar</td>";      //Envia el dato almacenado en "proveedor_id" a la pagina "modif_prov.php" por medio del metodo GET
              echo " <td class='border'> <a Onclick='return ConfirmDelete();' class='btn btn-danger' href='../checked.php?eliminar=elimProveedor&ids=".$fin['proveedor_id']."'>Eliminar</td>";     //Envia el dato almacenado en "producto_id" a la pagina "elimprov.php" por medio del metodo GET
            }
              echo "</tr>";     //Final de la segunda fila de la tabla
              
          }
          ?>
      </table>              <!-- FINAL DE LA TABLA -->
        </div>
    </div>
</div>
<input type="hidden" name="elimProveedorCheck" value="<?php echo $contador ?>">
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


<!--Jquery bootstrap y popper-->	
<script src="../jquery/jquery-3.3.1.min.js"></script>
<script src="../css/bootstrap/js/bootstrap.min.js"></script>
<script src="../popper/popper.min.js"></script> 


 <!-- datatables JS -->
 <script type="text/javascript" src="../assets/datatables/datatables.min.js"></script>   

<!--JS-->
<script src="../main.js" charset="utf-8"></script>
<script src="../js/menu_lateral.js"> </script>

					<!-- JS para el boton eliminar -->
<script>
//codigo javascript para el boton de eliminar
    function ConfirmDelete()
    {
      var x = confirm("¿Seguro que quiere eliminar el proveedor?");
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
</html>
