<?php
    if (!class_exists('Database')) {
        class Database {
            private $hostname = 'localhost';
            private $user = 'root';
            private $password = '';
            private $dbname = 'escuela';
            //private $port = '3306';

            public function conectar() {
            $conexion_bd = new mysqli($this->hostname, $this->user, $this->password, $this->dbname/*, $this->port*/);
                $conexion_bd->set_charset("utf8");

                // Verificar la conexión
                if ($conexion_bd->connect_error) {
                    die("Error de conexión a la base de datos: " . $conexion_bd->connect_error);
                }

                return $conexion_bd;
            }
        }
   }
?>