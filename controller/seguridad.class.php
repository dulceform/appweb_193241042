<?php
    //visualizar la variable sesion
    session_start();
    //comprobar si la variable de sesion se creo al autentificacion
    if( !isset($_SESSION['miSesion'])){
        //lo redireccionamos a la pagina de login
        header("location:../view/formLogin.html");
        //cerrar el archivo
        exit();
    }
?>