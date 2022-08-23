<?php
/* configuracion de los CORS */
require_once("../config/configHeader.php");

/* header json */
header('Content-Type: application/json');

require_once '../config/conexion.php';
require_once '../models/Comuna.php';

$comuna = new Comuna();

$body = json_decode(file_get_contents("php://input"), true);

/* method */
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        echo json_encode($comuna->get_comunas());
        break;
    
    default:
        echo json_encode(array('msg' => 'Metodo no soportado'));
        break;
}