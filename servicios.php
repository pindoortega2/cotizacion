<?php

    include 'config/conexion.php';

    class ServicioModel extends Conectar {
        private $conn;

        public function __construct() {
            // Llamar al constructor de la clase padre (Conectar)
            parent::__construct();
            // Obtener la conexión a la base de datos
            $this->conn = $this->conexion();
        }

        public function agregarServicio($nombre) {
                    
            try {
                // Preparar la consulta SQL
                $stmt = $this->conn->prepare("INSERT INTO servicios (ser_nombre) VALUES (?)");                             

                // Vincular el parámetro
                $stmt->bindParam(':nombre', $nombre);

                // Ejecutar la consulta
                $stmt->execute();

                // Retornar true si se insertó correctamente
                return true;
            } catch (PDOException $e) {
                // Manejar errores
                echo "Error al agregar el servicio: " . $e->getMessage();
                return false;
            }
        }
     


    }

?>