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
        public function delete_cliente($id_cliente){

            // TODO: Se establece la conexión a la base de datos.
            $conectar= parent::conexion();

            // TODO: Se configura la codificación de caracteres.
            parent::set_names();

            // Se define la consulta SQL para eliminar un servicio.
            $sql = "DELETE FROM " .$this->table. " WHERE id_cliente = ?";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $id_cliente);

            // Ejecuta la consulta y devuelve el número de filas afectadas.
            $sql->execute();
            return $sql->rowCount(); // Devuelve el número de filas eliminadas.
            
        }

        //TODO: Función para obtener un cliente por su ID
        public function get_cliente_por_id($id_cliente) {
            $conectar = parent::conexion();
            parent::set_names();

            $sql = "SELECT cli_contacto, cli_correo, cli_empresa FROM " . $this->table . " WHERE id_cliente = ?";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $id_cliente);
            $sql->execute();

            return $sql->fetchAll(PDO::FETCH_ASSOC); // Devolver los datos del cliente
        }


        
        public function buscar_cliente($search) {
            $conectar = parent::conexion();
            parent::set_names();

            $sql = "SELECT id_cliente, cli_nombre, cli_apellido 
                    FROM " . $this->table . " 
                    WHERE cli_nombre LIKE ? OR cli_apellido LIKE ? 
                    LIMIT 50"; // Limitar los resultados a 50 para evitar sobrecarga
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, "%$search%");
            $sql->bindValue(2, "%$search%");
            $sql->execute();

            return $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        
        public function listar_clientes($start, $length, $search, $orderColumn, $orderDir) {
            $conectar = parent::conexion(); // Establecer la conexión
            parent::set_names();

            // Columnas disponibles para ordenar
            $columns = ['id_cliente', 'cli_nombre', 'cli_apellido', 'cli_correo', 'cli_contacto', 'cli_direccion', 'cli_empresa', 'created_at'];

            // Consulta base
            $sql = "SELECT id_cliente, cli_nombre, cli_apellido, cli_correo, cli_contacto, cli_direccion, cli_empresa, created_at 
                    FROM cli_clientes";

            // Filtro de búsqueda
            if (!empty($search)) {
                $sql .= " WHERE cli_nombre LIKE ? OR cli_apellido LIKE ? OR cli_correo LIKE ?";
            }

            // Ordenamiento
            $sql .= " ORDER BY " . $columns[$orderColumn] . " " . $orderDir;

            // Paginación
            $sql .= " LIMIT ?, ?";

            $stmt = $conectar->prepare($sql);

            // Vincular parámetros
            $bindIndex = 1;
            if (!empty($search)) {
                $stmt->bindValue($bindIndex++, "%$search%");
                $stmt->bindValue($bindIndex++, "%$search%");
                $stmt->bindValue($bindIndex++, "%$search%");
            }
            $stmt->bindValue($bindIndex++, (int)$start, PDO::PARAM_INT);
            $stmt->bindValue($bindIndex++, (int)$length, PDO::PARAM_INT);

            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Obtener el total de registros sin filtro
            $totalRecords = $conectar->query("SELECT COUNT(*) FROM cli_clientes")->fetchColumn();

            // Obtener el total de registros filtrados
            $totalFiltered = $totalRecords;
            if (!empty($search)) {
                $stmtFiltered = $conectar->prepare("SELECT COUNT(*) FROM cli_clientes WHERE cli_nombre LIKE ? OR cli_apellido LIKE ? OR cli_correo LIKE ?");
                $stmtFiltered->bindValue(1, "%$search%");
                $stmtFiltered->bindValue(2, "%$search%");
                $stmtFiltered->bindValue(3, "%$search%");
                $stmtFiltered->execute();
                $totalFiltered = $stmtFiltered->fetchColumn();
            }

            // Formatear la respuesta para DataTables
            return [
                "draw" => intval($_POST['draw']),
                "recordsTotal" => $totalRecords,
                "recordsFiltered" => $totalFiltered,
                "data" => $data
            ];
        }

    }

?>        