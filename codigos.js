//      Para mostrar la contraseña en el index.php
function mostrarPassword(){
    const cambio = document.getElementById("txtPassword");
    const cambio2 = document.getElementById("txtPassWord2");
    let cambio3 = document.getElementById("txtPassword3");
    
//Seccion de inicio de sesion

    if(cambio.type == "password"){
        cambio.type = "text";
        $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
    }else{
        cambio.type = "password";
        $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
    }
//Seccion de registro. Todavia experimental
    if(cambio2.type=="password"){
        cambio2.type="text";
        $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
    }else{
        cambio2.type = "password";
        $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
    }    
} 

//  Para mostrar las contraseñas en nuevo_usuario.php
function mostrarPasswordConfirmacion(){

    const cambio3 = document.querySelector("#txtPassword3");

    //Seccion de registro
    if(cambio3.type=="password"){
        cambio3.type="text";
        $('.pw2').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
    }else{
        cambio3.type = "password";
        $('.pw2').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
    }
} 


//      Verificar passwords

function verificarPasswords() {
 
    // Ontenemos los valores de los campos de contraseñas 
    pass1 = document.getElementById('pass1');
    pass2 = document.getElementById('pass2');
 
    // Verificamos si las constraseñas no coinciden 
    if (pass1.value != pass2.value) {
 
        // Si las constraseñas no coinciden mostramos un mensaje 
        document.getElementById("error").classList.add("mostrar");
 
        return false;
    } else {
 
        // Si las contraseñas coinciden ocultamos el mensaje de error
        document.getElementById("error").classList.remove("mostrar");
 
        // Mostramos un mensaje mencionando que las Contraseñas coinciden 
        document.getElementById("ok").classList.remove("ocultar");
 
        // Desabilitamos el botón de login 
        document.getElementById("login").disabled = true;
 
        // Refrescamos la página (Simulación de envío del formulario) 
        setTimeout(function() {
            location.reload();
        }, 3000);
 
        return true;
    }
 
}


//          Para cambiar la apariencia de la tabla. Todavia experimental
const tabla = document.querySelector("#tablaProductos");
const boton = document.querySelector("#cambiarTabla");
console.log(boton.value);

// boton.addEventListener("click", e=>{        
// 	//e.preventDefault();
// 	prueba();

// });

function prueba(){
    console.log("Prueba")
}

function cambiarTabla(){

    
    //console.log(tabla);
    tabla.classList.toggle("table-dark");
    // titulo.classList.replace("table-dark", "table-hover");
    
}