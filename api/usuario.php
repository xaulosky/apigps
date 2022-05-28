
<?php

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
        $usuario->get_usuarios();
        break;
    case 'POST':
        $usuario->add_usuario($body['nombre'], $body['email']);
        break;
    case 'PUT':
        $usuario->update_usuario($body['id'], $body['nombre'], $body['email']);
        break;
    case 'DELETE':
        $usuario->delete_usuario($body['id']);
        break;
}



?>