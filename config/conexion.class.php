<?php
    class Conexion{
        private $dbhost;
        private $usuario;
        private $password;
        private $dbname;
        private $conn;

        /* metodo constructor */
        public function __construct($servidor,$usuario,$password,$dbname){
            $this->dbhost = $servidor;
            $this->usuario = $usuario;
            $this->password = $password;
            $this->dbname = $dbname;
        }
        /* obtener conexion */
        public function obtenerConn(){
            $this->conn = mysqli_connect($this->dbhost,$this->usuario,$this->password,$this->dbname);
            //veridicar la conexion
            if(!$this->conn){
                die("<br>Error al establecer la conexion a la base de datos: ".mysqli_connect_error());
            }else{
                echo "<br>La conexion a la base de datos con exito";
            }
        }
        //metodo para consultar o realizar una operacion
        public function ejecutarQuery($sql){
            return mysqli_query($this->conn,$sql);
        }
        //para cerrar la conexion a la base de datos
        public function cerrar(){
            mysqli_close($this->conn);
        }
    }

?>