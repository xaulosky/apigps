<?php
/* header json */
<<<<<<< HEAD

=======
>>>>>>> 66cee6aeec0fe0b019774aef3bdded5661394eb2
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
<<<<<<< HEAD
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
=======
        echo json_encode($usuario->get_usuarios());
        break;
    case 'POST':
        $usuario->crear_usuario($body['email'], $body['clave']);
        echo json_encode(array('msg' => 'Agregado Correctamente'));
>>>>>>> 66cee6aeec0fe0b019774aef3bdded5661394eb2
        break;
    case 'PUT':
        if(isset($body['nombreU'])&&isset($body['email'])&&isset($body['clave'])&&isset($body['cRolU'])&&isset($body['cUsuario'])){
            $usuario->update_usuario($body['nombreU'],$body['email'],$body['clave'],$body['cRolU'],$body['cUsuario'],);
            echo json_encode(array('msg' => 'Usuario actualizado'));
        } else{
            echo json_encode(array('msg' => 'Datos insuficientes'));
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