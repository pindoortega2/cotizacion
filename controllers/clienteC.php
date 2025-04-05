<?php
    //TODO: Se incluyen los archivos necesarios
    require_once("../config/conexion.php");
    require_once("../models/Cliente.php");

     //TODO: Se crea una instancia de la clase Categoria
     $cliente = new Cliente();

     //TODO: Se utiliza un switch para determinar qué acción realizar
    switch($_GET["op"]){

        //TODO: Si la acción es "guardaryeditar"
        case "guardaryeditar":

            //TODO: Si no se envió un id de cliente, se inserta una nueva categoría
            if(empty($_POST["id"])){

                $datos = $cliente->get_cliente_x_empresa($_POST["cli_empresa"]);

                if(is_array($datos) == true and count($datos) > 0){
                    
                    echo "error";

                }else{

                    $cliente->insert_cliente($_POST["cli_nombre"], $_POST["cli_apellido"], $_POST["cli_correo"], $_POST["cli_contacto"], $_POST["cli_direccion"], $_POST["cli_empresa"]);
                    echo "ok";
                    
                }

            }else{
                //TODO: Si se envió un id de categoría, se actualiza la categoría correspondiente
                $categoria->update_categoria($_POST["cat_id"],$_POST["cat_nom"],$_POST["cat_descrip"]);
                echo "ok";
            }

            break;


        
        //TODO: Si la acción es "listar"
        


        case "listar":
            
            $start = $_POST['start']; // Índice inicial de la página
            $length = $_POST['length']; // Número de registros por página
            $search = isset($_POST['search']['value']) ? $_POST['search']['value'] : ''; // Término de búsqueda
            $orderColumn = $_POST['order'][0]['column']; // Índice de la columna a ordenar
            $orderDir = $_POST['order'][0]['dir']; // Dirección del orden (asc o desc)

            // Llamar al método del modelo para obtener los datos
            $datos = $cliente->listar_clientes($start, $length, $search, $orderColumn, $orderDir);

            echo json_encode($datos); // Devolver los datos como JSON
            break;


        
        //TODO: Si la acción es "mostrar"        
        case "mostrar":
            //TODO: Se obtiene la información de la categoría con el id enviado y se prepara la respuesta en formato JSON
            $datos=$categoria->get_categoria_x_id($_POST["cat_id"]);
            if (is_array($datos)==true and count($datos)>0){
                foreach($datos as $row){
                    $output["cat_id"]=$row["cat_id"];
                    $output["cat_nom"]=$row["cat_nom"];
                    $output["cat_descrip"]=$row["cat_descrip"];
                }
                echo json_encode($output);
            }
            break;

        
            //TODO: Si la acción es "eliminar"
        case "eliminar":

            //TODO: Se elimina la categoría con el id enviado
            $cliente->delete_cliente($_POST["id_cliente"]);
            break;

        //TODO: Si la acción es "combo"
        case "combo":

            //TODO: Se obtienen todas las categorías y se prepara el HTML para enviar como respuesta
            $datos=$cliente->get_cliente();
            if(is_array($datos)==true and count($datos)>0){
                $html="";
                $html.="<option selected>Seleccionar</option>";
                foreach($datos as $row){
                    $html.= "<option value='".$row["id_cliente"]."'>".$row["cli_nombre"]. " " .$row["cli_apellido"]."</option>";
                }
                echo $html;
            }
            break;

        
        
        // TODO: Si la acción de obtener un cliente segun su id
        

        case "obtener_cliente":
            $id_cliente = $_POST["id_cliente"]; // Recibir el ID del cliente desde la solicitud AJAX
            $datos = $cliente->get_cliente_por_id($id_cliente); // Llamar al método del modelo para obtener los datos del cliente

            if (is_array($datos) && count($datos) > 0) {
                echo json_encode($datos[0]); // Devolver los datos del cliente como JSON
            } else {
                echo json_encode([]); // Devolver un array vacío si no se encuentran datos
            }
            break;

       
            
        case "buscar_cliente":
            $search = isset($_POST["search"]) ? $_POST["search"] : ""; // Término de búsqueda
            $datos = $cliente->buscar_cliente($search); // Llamar al método del modelo para buscar clientes
        
            $resultados = array();
            if (is_array($datos) && count($datos) > 0) {
                foreach ($datos as $row) {
                    $resultados[] = array(
                        "id_cliente" => $row["id_cliente"],
                        "cli_nombre" => $row["cli_nombre"],
                        "cli_apellido" => $row["cli_apellido"]
                    );
                }
            }
            echo json_encode($resultados); // Devolver los resultados como JSON
            break;

    }

?>