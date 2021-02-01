<?php
    require "../config/configdb.class.php";
    require "../config/conexion.class.php";
    require "intUsuariosService.class.php";
    require "../model/usuarios.class.php";

    class UsuariosServiceImp implements IntUsuariosService{
        //sobreescribir los metodos
        public function guardar($usuario){
           //imprimir de forma individual llos datos del objeto
           echo "<br>Nombre : ".$usuario->getNombre();
           echo "<br>Correo : ".$usuario->getEmail();
           echo "<br>";
           //imprimir todo el objeto
           var_dump($usuario);
           //asignacion a variables locales
           $nom = $usuario->getNombre();
           $user = $usuario->getUsername();
           $correo = $usuario->getEmail();
           $pass = $usuario->getPassword();
           $estatus = $usuario->getEstatus();
           $fecha = $usuario->getFechaRegistro();
           //formamos la setencia sql
           echo "<br>";
           $sql = "insert into usuarios values(null,'$nom',
           '$correo','$user',
           '$pass',$estatus,'$fecha')";
           
           //imprimir la setencia 
           echo $sql;
           //crear una setencia y objeto 
           $objeto = new Conexion("localhost","root","","appsweb");
           //establecer la conexion
           $objeto->obtenerConn();
           //ejecutar la setencia sql
           $objeto->ejecutarQuery($sql);
           //cerrar la conexion
           $objeto->cerrar();
        }
        /***************** */
        public function buscarPorUsernamePassword($username,$password){
            //formar la setencia sql
            $sql = "select * from usuarios 
            where username like 
            '$username' and password like 
            '$password'";
            //imprimir la setencia sql
            echo "<br>".$sql;
            //una instancia de la clase conexion 
            $objeto = new Conexion("localhost","root","","appsweb");
            //establecer la conexion
            $objeto->obtenerConn();
            //ejecutar la setencia en la actual conexion
            $resultado = $objeto->ejecutarQuery($sql);
            if ( mysqli_num_rows($resultado) > 0){
               //definimos un arreglo
                $arreglo = array();
                //obtengo el registro con todos sus campos
                $arreglo = mysqli_fetch_array($resultado);
                //creamos un objeto de tipo Usuario
                $usuario = new Usuarios();
                //formar el objeto 
                $usuario->setId($arreglo[0]);
                $usuario->setNombre($arreglo[1]);
                $usuario->setEmail($arreglo[2]);
                $usuario->setUsername($arreglo[3]);
                $usuario->setPassword($arreglo[4]);
                $usuario->setEstatus($arreglo[5]);
                $usuario->setFechaRegistro($arreglo[6]);
                //cerrar la conexion 
                $objeto->cerrar();
                //regreso el objeto
                return $usuario;

            }else{
                //cerrar la conexion
                return null;
            }
        }
    }
?>