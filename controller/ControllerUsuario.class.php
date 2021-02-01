<?php session_start(); ?>
<?php
    require "../service/UsuariosServiceImp.class.php";
    //require "../model/usuarios.class.php";

    class ControllerUsuario {
        /*
        //mrtodo de desarrollo
        
        public function agregar(){
            //objeto de tipo usuario
            $usuario = new Usuarios();
            $userService = new UsuariosServiceImp();
            //modificar los datos del usuario
            $usuario->setNombre("fernanda");
            $usuario->setEmail("fernandalrodriguez18@gmail.com");
            $usuario->setUsername("F9ernanda9");
            $usuario->setPassword(sha1("0987654321"));
            //llamado al metodo guardar de la clase de servicio
            $userService->guardar($usuario);
            //lo envio a la vista de autentificacion(login)
            //header("location:../view/formLogin.html");

        }*/
        //metodo de produccion
        public function agregar($usuario){
            $userService = new UsuariosServiceImp();
            //llamado al metodo guardar de la clase de servicio
            $userService->guardar($usuario);
            header("location:../view/formLogin.html");
        }
        //metodo para la autenticacion
        //metodo de desarrollo
        public function autentificacion($username,$password){
            $userService = new UsuariosServiceImp();
            //objeto de tipo usuario
            $usuario = new Usuarios();
            //llamdo al metodo definido en la capa de servicio
            $usuario = $userService->buscarPorUsernamePassword($username,$password);
            if ( is_object($usuario)){
                /*
                variable de sesion mediante variables locales
                
                $_SESSION['nombre'] = $usuario->getNombre();
                $_SESSION['correo'] = $usuario->getEmail();
                $_SESSION['id'] = $usuario->getId();
                */
                /* variable de sesion mediante un arreglo asociado
                */
                $_SESSION['miSesion'] = array();
                $_SESSION['miSesion']['nombre'] = $usuario->getNombre();
                $_SESSION['miSesion']['correo'] = $usuario->getEmail();
                $_SESSION['miSesion']['id'] = $usuario->getId();
                
                //echo "<br>El usuario es valido";
                header("location:../view/productos.class.php");
            }else{
                //echo "<br>Este usuario no esta registrado en la base de datos";
                header("location:../view/formLogin.html");
            }
        }
    }

?>