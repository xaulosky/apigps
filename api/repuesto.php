<?php
/* configuracion de los CORS */
require_once("../config/configHeader.php");
require_once '../config/conexion.php';
require_once '../models/Repuesto.php';

$repuesto = new Repuesto();

$body = json_decode(file_get_contents("php://input"), true);

/* method*/
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        echo json_encode($repuesto->get_repuestos());
        break;
    case 'POST':
        if(isset($body['nombreRepuesto']) && isset($body['cantidad']) && isset($body['fechaSolicitud']) && isset($body['estadoRepuesto'])){
            $repuesto->add_repuestos($body['nombreRepuesto'], $body['cantidad'], $body['fechaSolicitud'], $body['estadoRepuesto']);
            echo json_encode(array('msg' => 'Repuesto Agregado'));
        } else{
            echo json_encode(array('msg' => 'Falta rellenar algún campo'));
        }
        break;
    case 'PUT':
        break;
    case 'DELETE':
        break;
}
