<?php
/* configuracion de los CORS */
require_once("../config/configHeader.php");
require_once '../config/conexion.php';
require_once '../models/Ficha.php';

$ficha = new Ficha();

$body = json_decode(file_get_contents("php://input"), true);

/* method*/
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        echo json_encode($ficha->get_fichas());
        break;
}
