<?php

header('Content-Type: application/json');

require_once("../config/configHeader.php"); //Sirve para permitir que se realicen las consultas a la BBDD
require_once '../config/conexion.php';
require_once '../models/PartesVehiculo.php';

$partes = new PartesVehiculo();

$body = json_decode(file_get_contents("php://input"), true);

/* method */
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        echo json_encode($partes->get_partes_vehiculos());
        break;
}
