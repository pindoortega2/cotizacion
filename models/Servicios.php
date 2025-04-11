<?php

// TODO: Se define la clase "Categoria" que extiende de la clase "Conectar".
    class Servicios extends Conectar {

        private $table = "servicios"; // TODO: Se define la tabla de la base de datos a utilizar.

        // TODO: Función para obtener todos los servicios de la base de datos.
        public function get_servicios(){

            // TODO: Se establece la conexión a la base de datos.
            $conectar= parent::conexion();


            // TODO: Se configura la codificación de caracteres.
            parent::set_names();


            // TODO: Se define la consulta SQL para obtener todas las categorías activas.
            $sql="SELECT * FROM servicios";
            $sql=$conectar->prepare($sql);
            $sql->execute();

            // TODO: Se obtienen los resultados de la consulta en un arreglo.
            return $resultado=$sql->fetchAll();

        }

        // TODO: Función para insertar un nuevo servicio en la base de datos.
        public function insert_servicio($cat_nom){

            // TODO: Se establece la conexión a la base de datos.
            $conectar= parent::conexion();

            // TODO: Se configura la codificación de caracteres.
            parent::set_names();

            // TODO: Se define la consulta SQL para insertar un nuevo servicio.
            $sql="INSERT INTO servicios (id, ser_nombre) VALUES (NULL, ?);";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $cat_nom);            
            $sql->execute();

            // TODO: Se obtienen los resultados de la consulta en un arreglo.
            return $resultado=$sql->fetchAll();
        }

        // TODO: Función para obtener una nombre categoría específica de la base de datos.
        public function get_servicio_x_nom($ser_nombre){

            // TODO: Se establece la conexión a la base de datos.
            $conectar = parent::conexion();

            // TODO: Se configura la codificación de caracteres.
            parent::set_names();

            // TODO: Se define la consulta SQL obtener un registro segun su ID
            $sql="SELECT * FROM servicios WHERE ser_nombre = ?";             
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $ser_nombre);
            $sql->execute();
            // TODO: Se obtienen los resultados de la consulta en un arreglo.
            return $resultado=$sql->fetchAll();
        }

        // TODO: Función para eliminar una categoría de la base de datos.
        public function delete_servicio($id){

            // TODO: Se establece la conexión a la base de datos.
            $conectar= parent::conexion();

            // TODO: Se configura la codificación de caracteres.
            parent::set_names();

            // Se define la consulta SQL para eliminar un servicio.
            $sql = "DELETE FROM servicios WHERE id = ?";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $id);

            // Ejecuta la consulta y devuelve el número de filas afectadas.
            $sql->execute();
            return $sql->rowCount(); // Devuelve el número de filas eliminadas.
            
        }

        // public function buscar_servicios($search) {
        //     $conectar = parent::conexion();
        //     parent::set_names();

        //     $sql = "SELECT id, ser_nombre 
        //             FROM " . $this->table . " 
        //             WHERE ser_nombre LIKE ?
        //             LIMIT 50"; // Limitar los resultados a 50 para evitar sobrecarga en caso de que haya nombres casi iguales
        //     $sql = $conectar->prepare($sql);
        //     $sql->bindValue(1, "%$search%");
        //     $sql->execute();

        //     return $sql->fetchAll(PDO::FETCH_ASSOC);
        // }

        public function buscar_servicios($search) {
            $conectar = parent::conexion();
            parent::set_names();

            $sql = "SELECT id, ser_nombre FROM servicios";
            if (!empty($search)) {
                $sql .= " WHERE ser_nombre LIKE ?";
            }

            $stmt = $conectar->prepare($sql);

            if (!empty($search)) {
                $stmt->bindValue(1, "%$search%");
            }

            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function get_precios_dpo() {
            $conectar = parent::conexion();
            parent::set_names();
        
            // Consulta para obtener los precios relacionados con el servicio "DPO" (id = 2)
            $sql = "SELECT sp.id, sp.opcion_nombre, sp.precio 
                    FROM servicio_precios sp
                    WHERE sp.servicio_id = 2";
        
            $stmt = $conectar->prepare($sql);
            $stmt->execute();//ejecuta 
        
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function get_precio_por_servicio($servicio_id) {
            $conectar = parent::conexion();
            parent::set_names();
        
            // Consulta para obtener el precio del servicio específico
            $sql = "SELECT id, opcion_nombre, precio 
                    FROM servicio_precios 
                    WHERE servicio_id = ?";
            $stmt = $conectar->prepare($sql);
            $stmt->bindValue(1, $servicio_id); // Vincular el ID del servicio
            $stmt->execute();
        
            return $stmt->fetchAll(PDO::FETCH_ASSOC); // Devolver los resultados como un array asociativo
        }

    }

?>        