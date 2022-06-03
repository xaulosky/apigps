<?php

require_once("../config/configHeader.php");

/* header json */
header('Content-Type: application/json');

require_once '../config/conexion.php';
require_once '../models/Usuario.php';

$usuario = new Usuario();

$body = json_decode(file_get_contents("php://input"), true);

/* method*/
$method = $_SERVER['REQUEST_METHOD'];

switch($method){
    case 'GET':
        if(isset($_GET['id'])){
            echo json_encode($usuario->get_usuario($_GET['id']));
        } else {
            echo json_encode($usuario->get_usuarios());
        }
        break;
    case 'POST':
        if (isset($body['email'])&&isset($body['clave'])&&isset($body['cRolU'])&&isset($body['cTaller'])&&isset($body['nombreU'])){
            $usuario->add_usuario ($body['email'],$body['clave'],$body['cRolU'],$body['cTaller'],$body['nombreU']);
            echo json_encode(array('msg' => 'Usuario agregado'));
        } else{
            echo json_encode(array('msg' => 'Datos insuficientes'));
        }
        break;
    case 'PUT':
        if(isset($body['cUsuario'])&&isset($body['email'])&&isset($body['clave'])&&isset($body['cRolU'])&&isset($body['cTaller'])&&isset($body['nombreU'])){
            $usuario->update_usuario($body['cUsuario'],$body['email'],$body['clave'],$body['cRolU'],$body['cTaller'],$body['nombreU']);
            echo json_encode(array('msg' => 'Usuario actualizado'));
        } else{
            echo json_encode(array('msg' => 'Datos insufucientes'));
        }
        break;
    case 'DELETE':
        if(isset($_GET['id'])){
            $usuario->delete_usuario($_GET['id']);
            echo json_encode(array('msg' => 'Usuario eliminado'));
        }else {
            echo json_encode(array('msg' => 'Datos insuficientes'));
        }
        
}



?>