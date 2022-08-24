<?php

/* configuracion de los CORS */
header('Content-Type: application/json');
require_once("../config/configHeader.php");
require_once '../config/conexion.php';
require_once '../models/Vehiculo.php';

$vehiculo = new Vehiculo();

$body = json_decode(file_get_contents("php://input"), true);

/* method*/
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        if (isset($_GET['cTaller'])) {
            echo json_encode($vehiculo->get_cliente($_GET['cTaller']));
        }
        break;
    }