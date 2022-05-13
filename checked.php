<?php

//Vistas incluidas
include("Includes/header.php");		//Para la confirmacion de usuarios


require 'conexion.php';						//Php para conectar con la base de datos

if(isset($_REQUEST['eliminar'])){
    $elim=$_REQUEST["eliminar"];
//          Para eliminar Producto
    if($elim=="elimProducto"){                 //Si la variable get $elim es igual a elimProductos 
    
        $id = $_GET['ids'];							//Variable en donde se guarda el valor de producto_id. Enviado desde la pagina de lista_productos.php por medio del metodo GET
            
        $consulta="DELETE FROM productos WHERE producto_id= $id";		//Codigo SQL para borrar un registro que posea el producto_id mencionado anteriormente
        
        $resultado= $conexion->query($consulta);						//Codigo para enlazar el sql con la BD
        if($conexion->errno) die($conexion->error);						
        
        if($resultado){								//Si la condicion $resultado se cumple
                                                    //Imprime un alert avisando que el producto se elimino correctamente y redirecciona a lista_productos.php
            echo'<script type="text/javascript">				
            alert("Producto Eliminado Correctamente");
            window.location.href="Productos/lista_productos.php";
            </script>';
        }else{										//Si la condicion no se cumple
            echo'<script type="text/javascript">				
            alert("ERROR. vuelva a intentarlo");
            window.location.href="Productos/lista_productos.php";
            </script>';
        }

    //En caso de que el producto eliminado sea seleccionado desde los checkboxs
    }else if(isset($_REQUEST['elimProductoCheck'])){

        for($i=0; $i<=$_REQUEST["elimProductoCheck"];$i++){           //La "accion" representa la cantidad de veces que debe repetir el bucle, recibido de la variable $contador
            
            if(isset($_POST["check_$i"])){
                $actual=$_POST["check_$i"];
                //echo $actual, " actual recibido";
                //echo "<br>";
    
                $consulta="DELETE FROM productos WHERE producto_id = $actual";		//Sql para eliminar registros de la base de datos basandose en el id del proveedor
    
                $resultado= $conexion->query($consulta);							//Codigo que enlaza la consulta sql con el archivo conexion.php, en el cual se encuentra la informacion de la BD. Permitiendo su ejecucion
                if($conexion->errno) die($conexion->error);
    
            }
        }
        if($resultado){			//Si la condicion $resultado se cumple correctamente
            echo'<script type="text/javascript">				
            alert("Productos Eliminados Correctamente de la Base de Datos");
            window.location.href="Productos/lista_productos.php";
            </script>';
        }else{					//Si no se cumple la condicion de $resultado
            ?>
        <script type="text/javascript">
            alert("ERROR. No selecciono ningun elemento para eliminar");
            window.location.href="Productos/lista_productos.php";
        </script>
    <?php
        }

    }





//          Para eliminar proveedor    
    if($elim=="elimProveedor"){               
        $id = $_GET['ids'];				//Variable que guarda el id del proveedor enviado desde la pagina de lista_prov.php
        
        $consulta="DELETE FROM proveedores WHERE proveedor_id= $id";		//Sql para eliminar registros de la base de datos basandose en el id del proveedor
    
        $resultado= $conexion->query($consulta);							//Codigo que enlaza la consulta sql con el archivo conexion.php, en el cual se encuentra la informacion de la BD. Permitiendo su ejecucion
        if($conexion->errno) die($conexion->error);
	
	    if($resultado){			//Si la condicion $resultado se cumple correctamente
            echo'<script type="text/javascript">				
            alert("Proveedor Eliminado Correctamente");
            window.location.href="Proveedores/lista_prov.php";
            </script>';
        }else{					//Si no se cumple la condicion de $resultado
            echo'<script type="text/javascript">				
            alert("ERROR. vuelva a intentarlo");
            window.location.href="Productos/lista_productos.php";
            </script>';
        }
     //En caso de que el proveedor eliminado sea seleccionado desde los checkboxs
    }else if(isset($_REQUEST['elimProveedorCheck'])){

        for($i=0; $i<=$_REQUEST["elimProveedorCheck"];$i++){           //La "accion" representa la cantidad de veces que debe repetir el bucle, recibido de la variable $contador
            
            if(isset($_POST["check_$i"])){
                $actual=$_POST["check_$i"];
                //echo $actual, " actual recibido";
                //echo "<br>";
    
                $consulta="DELETE FROM proveedores WHERE proveedor_id= $actual";		//Sql para eliminar registros de la base de datos basandose en el id del proveedor
    
                $resultado= $conexion->query($consulta);							//Codigo que enlaza la consulta sql con el archivo conexion.php, en el cual se encuentra la informacion de la BD. Permitiendo su ejecucion
                if($conexion->errno) die($conexion->error);
    
            }
        }
        if($resultado){			//Si la condicion $resultado se cumple correctamente
            echo'<script type="text/javascript">				
            alert("Proveedores Eliminados Correctamente de la Base de Datos");
            window.location.href="Proveedores/lista_prov.php";
            </script>';
        }else{					//Si no se cumple la condicion de $resultado
            ?>
        <script type="text/javascript">
            alert("ERROR. No selecciono ningun elemento para eliminar");
            window.location.href="Proveedores/lista_prov.php";
        </script>
    <?php
        }

    }





//Para eliminar un rubro
    if($elim=="elimRubro"){
        $id = $_GET['ids'];				//Variable en donde se guarda el rubro_id enviado desde el archivo lista_tipop.php por medio del metodo GET
        
        $consulta="DELETE FROM rubros WHERE rubro_id= $id";			//Sql para borrar un registro de la tabla rubros basandose en su rubro_id
    
        $resultado= $conexion->query($consulta);					//Codigo para enlazar el sql $consulta con la BD por medio del archivo conexion.php
        if($conexion->errno) die($conexion->error);
	
        if($resultado){				//Si la condicion $resultado se cumple correctamente
            echo'<script type="text/javascript">				
            alert("Rubro Eliminado Correctamente");
            window.location.href="Tipos_productos/lista_tipop.php";
            </script>';
        }else{						//Si la condicion no se cumple
            echo'<script type="text/javascript">				
            alert("ERROR. vuelva a intentarlo");
            window.location.href="Tipos_productos/lista_tipop.php";
            </script>';										//Y un mensaje de que lo vuelva a intentar
        }
    }else if(isset($_REQUEST['elimRubroCheck'])){

        for($i=0; $i<=$_REQUEST["elimRubroCheck"];$i++){           //La "accion" representa la cantidad de veces que debe repetir el bucle, recibido de la variable $contador
            
            if(isset($_POST["check_$i"])){
                $actual=$_POST["check_$i"];
                //echo $actual, " actual recibido";
                //echo "<br>";
    
                $consulta="DELETE FROM rubros WHERE rubro_id= $actual";		//Sql para eliminar registros de la base de datos basandose en el id del proveedor
    
                $resultado= $conexion->query($consulta);							//Codigo que enlaza la consulta sql con el archivo conexion.php, en el cual se encuentra la informacion de la BD. Permitiendo su ejecucion
                if($conexion->errno) die($conexion->error);
    
            }
        }
        if($resultado){			//Si la condicion $resultado se cumple correctamente
            echo'<script type="text/javascript">				
            alert("Rubros Eliminados Correctamente de la Base de Datos");
            window.location.href="Tipos_productos/lista_tipop.php";
            </script>';
        }else{					//Si no se cumple la condicion de $resultado
            ?>
        <script type="text/javascript">
            alert("ERROR. No selecciono ningun elemento para eliminar");
            window.location.href="Tipos_productos/lista_tipop.php";
        </script>
    <?php
        }

    }





//Para eliminar ventas
    if($elim=="elimVenta"){
        $idGet=$_GET['ids'];										//Define una variable que almacena el valor que tenga el nombre ids recibido del formulario

        $guardar="DELETE FROM ventas WHERE venta_id=$idGet";		//Elimina el registro de la tabla ventas que tenga el valor $idGet como venta_id
        $resultado=$conexion->query($guardar);
        
        $borrar="DELETE FROM detalle_ventas WHERE rela_venta_id=$idGet";			//Elimina todos los registros de la tabla detalle_ventas que tengan el valor almacenado en $idGet como rela_venta_id
        $resultado2=$conexion->query($borrar);

        if(empty($resultado)){											//Si $resultado esta vacio
            echo'<script type="text/javascript">				
            alert("ERROR. vuelva a intentarlo");
            window.location.href="Ventas/lista_venta.php";
            </script>';	
        }else{									//En caso contrario
            echo'<script type="text/javascript">				
            alert("Se ha Eliminado Correctamente el Registro de Esta Venta");
            window.location.href="Ventas/lista_venta.php";
            </script>';													//Alert que avisa al usuario que se elimino la venta
        }
    }else if(isset($_REQUEST['elimVentaCheck'])){

        for($i=0; $i<=$_REQUEST["elimVentaCheck"];$i++){           //La "accion" representa la cantidad de veces que debe repetir el bucle, recibido de la variable $contador
            
            if(isset($_POST["check_$i"])){
                $actual=$_POST["check_$i"];
                //echo $actual, " actual recibido";
                //echo "<br>";
    
                $guardar="DELETE FROM ventas WHERE venta_id=$actual";		//Elimina el registro de la tabla ventas que tenga el valor $idGet como venta_id
                $resultado=$conexion->query($guardar);
                
                $borrar="DELETE FROM detalle_ventas WHERE rela_venta_id=$actual";			//Elimina todos los registros de la tabla detalle_ventas que tengan el valor almacenado en $idGet como rela_venta_id
                $resultado2=$conexion->query($borrar);
            }
        }
        if($resultado){			//Si la condicion $resultado se cumple correctamente
            echo'<script type="text/javascript">				
            alert("Se han Eliminado Correctamente los Registro de Esta Venta");
            window.location.href="Ventas/lista_venta.php";
            </script>';
        }else{					//Si no se cumple la condicion de $resultado
            ?>
        <script type="text/javascript">
            alert("ERROR. No selecciono ningun elemento para eliminar");
            window.location.href="Ventas/lista_venta.php";
        </script>
    <?php
        }

    }





//Para eliminar la venta intermedia
    if($elim=="elimVentaIntermedia"){
        $idGet=$_GET['ids'];						//Define una variable en donde se almacena ids recibido del formulario
	
        $guardar="delete from venta_intermedio where venta_inter_id=$idGet";			//Sql que borra el registro de la tabla venta_intermedio que tenga como valor $idGet en su campo venta_intermedio_id
        $resultado=$conexion->query($guardar);
        if(empty($resultado)){							//Si $resultado esta vacio
            echo "<h1 class='text-danger text-center'>ERROR</h1>";			//Imprime mensaje de Error
        }else{						//En caso contrario
            echo'<script type="text/javascript">				
            alert("Se ha eliminado correctamente el Registro");
            window.location.href="Ventas/nueva_venta.php";
            </script>';													//Alert que avisa al usuario que se elimino el registro
        
        }
    }



}
?>