<?php

// TODO: Se define la clase "Categoria" que extiende de la clase "Conectar".
    class Empresa extends Conectar {

        // TODO: Función para obtener todos los servicios de la base de datos.
        public function get_empresa(){

            // TODO: Se establece la conexión a la base de datos.
            $conectar= parent::conexion();


            // TODO: Se configura la codificación de caracteres.
            parent::set_names();


            // TODO: Se define la consulta SQL para obtener todas las categorías activas.
            $sql="SELECT * FROM empresa";
            $sql=$conectar->prepare($sql);
            $sql->execute();

            // TODO: Se obtienen los resultados de la consulta en un arreglo.
            return $resultado=$sql->fetchAll();

        }

        // TODO: Función para insertar un nuevo servicio en la base de datos.
        public function insert_empresa($em_nombre){

            // TODO: Se establece la conexión a la base de datos.
            $conectar= parent::conexion();

            // TODO: Se configura la codificación de caracteres.
            parent::set_names();

            // TODO: Se define la consulta SQL para insertar un nuevo servicio.
            $sql="INSERT INTO empresa (id, em_nombre) VALUES (NULL, ?);";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $em_nombre);            
            $sql->execute();

            // TODO: Se obtienen los resultados de la consulta en un arreglo.
            return $resultado=$sql->fetchAll();
        }

        // TODO: Función para obtener una nombre categoría específica de la base de datos.
        public function get_empresa_x_nom($em_nombre){

            // TODO: Se establece la conexión a la base de datos.
            $conectar = parent::conexion();

            // TODO: Se configura la codificación de caracteres.
            parent::set_names();

            // TODO: Se define la consulta SQL obtener un registro segun su ID
            $sql="SELECT * FROM empresa WHERE em_nombre = ?";             
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $em_nombre);
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

    }

?>        