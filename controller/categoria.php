<?php 
header("Content-Type: application/json");


require_once("../config/conexion.php");
require_once("../models/Categoria.php");

$categoria = new Categoria();
$body = json_decode(file_get_contents("php://input"), true);

switch($_GET["op"]){
   case "GetAll":
      $datos=$categoria-> get_categoria();
      echo json_encode($datos);
   break;

   case "GetId":
    $datos=$categoria-> get_categoria_x_id($body["producto_id"]);
    echo json_encode($datos);

    break;

    case "Insert":
        $datos=$categoria-> insert_categoria($body["nombre"],$body["descripcion"]);
        echo "insert correcto";
    
        break;

        case "Update":
            $datos=$categoria-> update_categoria($body["producto_id"],$body["nombre"],$body["descripcion"]);
            echo "Update correcto";
        
            break;
            case "Delete":
                $datos=$categoria-> delete_categoria($body["producto_id"]);
                echo "Delete correcto";
            
                break;
}
?>