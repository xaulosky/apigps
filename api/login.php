
<?php

/* header json */
header('Content-Type: application/json');
require_once '../config/conexion.php';
require_once '../models/Login.php';
/* configuracion de los CORS */
require_once("../config/configHeader.php");
$login = new Login();

$body = json_decode(file_get_contents("php://input"), true);

/* method*/
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        break;
    case 'POST':
        $login->iniciarSesion($body['email'], $body['clave']);
        echo json_encode($login->iniciarSesion($body['email'], $body['clave']));
        break;
    case 'PUT':
        break;
    case 'DELETE':
        break;
}
