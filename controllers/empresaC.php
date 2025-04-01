<?php
    //TODO: Se incluyen los archivos necesarios
    require_once("../config/conexion.php");
    require_once("../models/Empresa.php");

     //TODO: Se crea una instancia de la clase Categoria
     $empresa = new Empresa();

     //TODO: Se utiliza un switch para determinar qué acción realizar
    switch($_GET["op"]){

        //TODO: Si la acción es "guardaryeditar"
        case "guardaryeditar":

            //TODO: Si no se envió un id de categoría, se inserta una nueva categoría
            if(empty($_POST["id"])){

                $datos = $empresa->get_empresa_x_nom($_POST["em_nombre"]);

                if(is_array($datos) == true and count($datos) > 0){
                    
                    echo "error";

                }else{

                    $empresa->insert_empresa($_POST["em_nombre"]);
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

            //TODO: Se obtienen todas las categorías y se preparan los datos para enviar como respuesta
            $datos = $empresa->get_empresa();
            $data = Array();

            // Obtén los parámetros de paginación enviados por DataTables
            // Los valores de $_POST['start'] y $_POST['length'] son enviados automáticamente por DataTables cuando configuras la tabla para usar procesamiento del lado del servidor (serverSide: true). Estos parámetros son parte de la solicitud AJAX que DataTables realiza al servidor para manejar la paginación, búsqueda y ordenamiento.
            $start = isset($_POST['start']) ? intval($_POST['start']) : 0; // Inicio de la paginación
            $length = isset($_POST['length']) ? intval($_POST['length']) : 10; // Número de registros por página
            $item = $start + 1; // Número inicial del ítem

            foreach($datos as $row){
                $sub_array = array();
                $sub_array[] = $item; // Número del ítem
                $sub_array[] = $row["em_nombre"];                
                $sub_array[] = '<button type="button" onClick="editar('.$row["id"].')" id="'.$row["id"].'" class="btn btn-warning btn-xs">Editar</button>';
                $sub_array[] = '<button type="button" onClick="eliminar('.$row["id"].')" id="'.$row["id"].'" class="btn btn-danger btn-xs">Eliminar</button>';
                $data[] = $sub_array;
                $item++; // Incrementa el número del ítem para la siguiente fila
            }

            //TODO: Se prepara la respuesta en formato JSON
            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);
            echo json_encode($results);
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
            $servicios->delete_servicio($_POST["id"]);
            break;

        //TODO: Si la acción es "combo"
        case "combo":
            //TODO: Se obtienen todas las categorías y se prepara el HTML para enviar como respuesta
            $datos=$categoria->get_categoria();
            if(is_array($datos)==true and count($datos)>0){
                $html="";
                $html.="<option selected>Seleccionar</option>";
                foreach($datos as $row){
                    $html.= "<option value='".$row["cat_id"]."'>".$row["cat_nom"]."</option>";
                }
                echo $html;
            }
            break;

    }

?>