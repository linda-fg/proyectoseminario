<?php 

    class Conexion {
        public function Conectar(){
            $servidor = "localhost:3306";
            $usuario = "root";
            $password = "";
            $db = "prueba1";
            $conexion = mysqli_connect($servidor, $usuario, $password, $db);
            return $conexion;
        }
    }