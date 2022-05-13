<?php
//Vistas incluidas
include("../Includes/header.php");

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Lista de Ventas</title>
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
    		<h1 class="text-center">Lista de <span class="text-danger">Ventas</span></h1>        <!-- Titulo -->
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
<div class="container" style="">
        <div class="row">
            <div class="col-lg-12">    
            <a class="btn btn-success" href="nueva_venta.php">Realizar una venta</a>        <!-- Boton para realizar una venta -->
            </div>
    </div>
</div>
<?php
    require "../conexion.php";                  //Php para conectar con la base de datos por medio del archivo.php
//Tabla de ventas
    $consulta = "SELECT * from ventas order by venta_id asc";               //consulta sql, trae todos los registros de la tabla ventas, ordenando los datos en base a productos_id de manera ascendente
    $resultado = $conexion->query($consulta);                               //enlazando la consulta con la base de datos
    if($conexion->errno) die($conexion->error);
//detalle_ventas
    $consulta2 = "SELECT * from detalle_ventas order by det_venta_id asc";  //Segunda consulta sql, trae todos los registros de la tabla detalle_ventas, ordenando los datos en base a det_venta_id de manera ascendente
    $resultado2 = $conexion->query($consulta2);                             //Enlazando la consulta con la base de datos
    if($conexion->errno) die($conexion->error);

    ?>

<div class="container">
    <form action="../checked.php" method="POST">
    <div class="row">
        
        <div class="col-lg-12 col-md-12 col-sm-12 ">
        
        <h2>Tabla de <span class="text-danger">Ventas</span></h2>            <!-- Tabla de las ventas realizadas -->
        <div class="table-responsive">
        <table id="tablaVentas" class="shadow table table-striped table-hover">          <!-- Inicio de la Tabla -->
            <thead>
            <tr>                    <!-- Inicio de la primera fila -->
            <?php if($acceso==1){	?>
			<th class="border border-dark">#</th>
			<?php }	?>
			<th class="border border-dark">Id Venta</th>
            <th class="border border-dark">Cantidad de Producto</th>
			<th class="border border-dark">Fecha de Venta</th>
			<th class="border border-dark">Total Obtenido</th>
			<th class="border border-dark">id Medio de Pago</th>
            <th class="border border-dark text-center text-danger">Eliminar</th>
            </tr>                   <!-- Final de la primera fila -->
            </thead>

            <?php	
			$contador=0;                            //Inicializo el contador para los checkboxs como 0

            while($fin = $resultado->fetch_assoc()){                    //Mientras se cumpla la condicion de $resultado se imprimira el contenido de la tabla. En caso contrario no mostrará nada
                
                $contador=$contador+1;                  //Contador para los checkboxs
                $med_pago_id=$fin["rela_med_pago_id"];   
                //Seccion para traer el nombre del medio de pago
                $consulta_nombres= "SELECT * FROM medios_pago WHERE med_pago_id = $med_pago_id";          //Busco en la tabla medios_pago y traigo el nombre de los medios de pago
                $resultado_nombres = $conexion->query($consulta_nombres);                               //enlazando la consulta con la base de datos
                while($endN= $resultado_nombres->fetch_assoc()){
                    $med_pago_nombre= $endN["cdescripcion_med_pago"];                   //Defino una variable que almacena el nombre del medio de pago
                }
                //Fin seccion para el nombre de medio de pago

                echo  "<tr>";                         //Inicio de la segunda fila. Aca se imprimen los registros obtenidos de la primera consulta
                if($acceso==1){
                echo "<td class='border '> <input class='form-check-input case' type='checkbox' value='".$fin['venta_id']."' id='flexCheckDefault' name='check_".$contador."'></td>";
                }
                echo "<th>  ",$fin['venta_id'],"  </th>";
				echo "<td>  ",$fin['ncant_prod'],"  </td>";
                echo "<td >  ",$fin['dfecha_venta'],"  </td>";
				echo "<td> ", "$", $fin['nprecio_total'],"  </td>";
				echo "<td>  ",$med_pago_nombre,"  </td>";
				 
             // echo "<td align='center'>  <a href='?ids=".$fin['id_venta']."'><input type='submit' value='Editar'></a></td>";
				
              echo " <td class='text-center border'> <a class='btn btn-danger' Onclick='return ConfirmDelete();' href='../checked.php?eliminar=elimVenta&ids=".$fin['venta_id']."'>Eliminar</a> </td>";
              echo "</tr>";                         //Final de la segunda fila
              
          }
          ?>
      </table>                                       <!-- Final de la Tabla -->
      </div>  
    </div>

    <input type="hidden" name="elimVentaCheck" value="<?php echo $contador ?>">     <!-- input hidden para enviar la cantidad de veces que debe realizarse la iteracion en checked.php -->
		<?php if($acceso==1){	?>		<!-- Codigo para verificar los usuarios -->
		<div class="d-flex bd-highlight mb-3 mt-2">
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
    </form>                         <!--Fin Formulario para los checkboxs-->

<!-- Tabla Detalle de Ventas -->
      <div class="col-lg-12 col-md-12 col-sm-12 mb-3">
      <h2>Tabla de <span class="text-danger">Detalle</span> de Ventas</h2>            <!-- Tabla de las ventas realizadas -->
      <table id="tablaProductos" class=" shadow table table-striped table-hover">                              <!-- Inicio de la Tabla -->
            <thead>
            <tr>                                <!-- Inicio de la primera fila -->
            
            <th class="border border-dark">Id Detalle Venta</th>
			<th class="border border-dark">Id Venta</th>
            <th class="border border-dark">Producto</th>
			<th class="border border-dark">Precio</th>
			<th class="border border-dark">Cantidad del Producto</th>
            </tr>                               <!-- Final de la primera fila -->
        	</thead>
           

            <?php	

            while($fin2 = $resultado2->fetch_assoc()){                      //Mientras se cumpla la condicion de $resultado2 se imprimira el contenido de la tabla detalle de ventas, en caso contrario aparecera la tabla vacia
	        	
                
                $producto_id=$fin2["rela_producto_id"];   
                //Seccion para traer el nombre del producto
                $consulta_nombres= "SELECT * FROM productos WHERE producto_id = $producto_id";          //Busco en la tabla productos y traigo el nombre de los productos
                $resultado_nombres = $conexion->query($consulta_nombres);                               //enlazando la consulta con la base de datos
                while($endP= $resultado_nombres->fetch_assoc()){
                    $producto_nombre= $endP["cnombre_producto"];                   //Defino una variable que almacena el nombre del producto

                }
                //Fin seccion para el nombre del producto
                echo  "<tr>";                             //Inicio de la segunda fila. Aca se imprimen los registros obtenidos de la segunda consulta
                echo "<th>  ",$fin2['det_venta_id'],"  </th>";
                echo "<td >  ",$fin2['rela_venta_id'],"  </td>";
				echo "<td>  ",$producto_nombre,"  </td>";
                echo "<td >  ", "$", $fin2['nprecio'],"  </td>";
				echo "<td>  ",$fin2['ncant_x_prod'],"  </td>";
				
             // echo "<td align='center'>  <a href='?ids=".$fin2['id_det_venta']."'><input type='submit' value='Editar'></a></td>";	
              //echo " <td align='center'> <a href='elimdetventa.php?ids=".$fin2['id_det_venta']."'><span class='red'>Eliminar</span> </td>";
                echo "</tr>";             //Final de la segunda fila
              /* Mover a linea 94: <th width="68"><span class="red">Eliminar</span></th>*/
          }
          ?>
      </table>
    
      </div>
      </div>
      </div>
      
      <div>
                                                 <!-- Final de la tabla -->
</div>



<!--Jquery bootstrap y popper-->	
<script src="../jquery/jquery-3.3.1.min.js"></script>
<script src="../css/bootstrap/js/bootstrap.min.js"></script>
<script src="../popper/popper.min.js"></script> 


 <!-- datatables JS -->
 <script type="text/javascript" src="../assets/datatables/datatables.min.js"></script>   

<!--JS-->
<script src="../main.js" charset="utf-8"></script>
<script src="../main2.js" charset="utf-8"></script>

<script src="../js/menu_lateral.js"> </script>
</body>
					<!-- JS para el boton eliminar -->
<script>
//Codigo js para el boton de eliminar
    function ConfirmDelete()
    {
      var x = confirm("¿Esta seguro que quiere eliminar el registro de esta venta?");
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