<?php

// TODO: Se define la clase "Categoria" que extiende de la clase "Conectar".
    class Cliente extends Conectar {

        // Definir una propiedad global para la tabla
        private $table = "cli_clientes";

        // TODO: Función para obtener todos los servicios de la base de datos.
        public function get_cliente(){

            // TODO: Se establece la conexión a la base de datos.
            $conectar= parent::conexion();

            // TODO: Se configura la codificación de caracteres.
            parent::set_names();

            // TODO: Se define la consulta SQL para obtener todas las categorías activas.
            $sql="SELECT * FROM " . $this->table;
            $sql=$conectar->prepare($sql);
            $sql->execute();

            // TODO: Se obtienen los resultados de la consulta en un arreglo.
            return $resultado = $sql->fetchAll();




            // // TODO: Se define la consulta SQL para obtener todas las categorías activas.
            // $sql="SELECT 
            //     c.id_cliente, 
            //     c.cli_nombre, 
            //     c.cli_apellido, 
            //     c.cli_correo, 
            //     c.cli_contacto, 
            //     c.cli_direccion, 
            //     e.em_nombre AS empresa_nombre, -- Obtén el nombre de la empresa
            //     c.created_at
            // FROM cli_clientes c
            // INNER JOIN empresa e ON c.id_empresa = e.id"; // Relación entre cliente y empresa";
            // $sql=$conectar->prepare($sql);
            // $sql->execute();

            // // TODO: Se obtienen los resultados de la consulta en un arreglo.
            // return $resultado = $sql->fetchAll();

        }

        // TODO: Función para insertar un nuevo cliente en la base de datos.
        public function insert_cliente($cli_nombre, $cli_apellido, $cli_correo, $cli_contacto, $cli_direccion, $cli_empresa){

            // TODO: Se establece la conexión a la base de datos.
            $conectar= parent::conexion();

            // TODO: Se configura la codificación de caracteres.
            parent::set_names();

            // TODO: Se define la consulta SQL para insertar un nuevo servicio.
            $sql="INSERT INTO " . $this->table . "(id_cliente, cli_nombre, cli_apellido, cli_correo, cli_contacto, cli_direccion, cli_empresa) VALUES (NULL, ?, ?, ?, ?, ?, ?);";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $cli_nombre);
            $sql->bindValue(2, $cli_apellido);
            $sql->bindValue(3, $cli_correo);
            $sql->bindValue(4, $cli_contacto);
            $sql->bindValue(5, $cli_direccion);
            $sql->bindValue(6, $cli_empresa);
                    
            $sql->execute();

            // Cerrar la conexión
            $conectar = null;   

            
        }

        // TODO: Función para obtener una nombre categoría específica de la base de datos.
        public function get_cliente_x_empresa($cli_empresa){

            // TODO: Se establece la conexión a la base de datos.
            $conectar = parent::conexion();

            // TODO: Se configura la codificación de caracteres.
            parent::set_names();

            // TODO: Se define la consulta SQL obtener un registro segun su ID
            $sql="SELECT * FROM " . $this->table . " WHERE cli_empresa = ?";             
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $cli_empresa);
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