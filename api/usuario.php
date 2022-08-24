<?php
/* header json */
header('Content-Type: application/json');
require_once("../config/configHeader.php");
require_once '../config/conexion.php';
require_once '../models/Usuario.php';

$usuario = new Usuario();
$body = json_decode(file_get_contents("php://input"), true);


/* method*/
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        if(isset($_GET['id'])){
            echo json_encode($usuario->get_usuario($_GET['id']));
        } else if(isset($_GET['cTaller'])){
            echo json_encode($usuario->get_usuarios($_GET['cTaller']));
        }
        break;
    case 'POST':
        if (isset($body['email'])&&isset($body['clave'])&&isset($body['cRolU'])&&isset($body['nombreU'])){
            $usuario->add_usuario ($body['email'],$body['clave'],$body['cRolU'],$body['cTaller'],$body['nombreU']);
            echo json_encode(array('msg' => 'Agregado'));
        } else{
            echo json_encode(array('msg' => 'Datos insuficientes'));
        }
        break;
    case 'PUT':
        if(isset($body['nombreU'])&&isset($body['email'])&&isset($body['cRolU'])&&isset($body['cUsuario'])){
            $usuario->update_usuario($body['nombreU'],$body['email'],$body['cRolU'],$body['cUsuario']);
            echo json_encode(array('msg' => 'Actualizado'));
        } else{
            echo json_encode(array('msg' => 'Datos insuficientes'));
        }
        if(isset($body['clave'])&&isset($body['cUsuario'])){
            $usuario->update_clave($body['clave'],$body['cUsuario']);
            echo json_encode(array('msg' => 'Actualizado'));
        }else{
            echo json_encode(array('msg' => 'Datos insuficientes'));
        }
        break;
    case 'DELETE':
        if(isset($_GET['id'])){
            $usuario->delete_usuario($_GET['id']);
            echo json_encode(array('msg' => 'Eliminado'));
        }else {
            echo json_encode(array('msg' => 'Datos insuficientes'));
        }
        
}



?>