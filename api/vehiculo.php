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
        if (isset($_GET['cVehiculo'])) {
            echo json_encode($vehiculo->get_vehiculo($_GET['cVehiculo']));
        } else {
            echo json_encode($vehiculo->get_vehiculos());
        }
        break;

    case 'POST':
        /* validar que existan */
        if (isset($body['patenteV'])) {
            $vehiculo->añadir_vehiculo($body['patenteV'], $body['modeloV'], $body['colorV'], $body['estadoV'], $body['estadoRevisionTecnicaV'], $body['montoAseguradora'], $body['cCliente'], $body['cAseguradora'], $body['cTipoCarroceria']);
            echo json_encode(array('msg' => 'Agregado correctamente'));
        } else {
            echo json_encode(array('msg' => 'Faltan datos'));
        }
        break;

    case 'PUT':

        break;
    case 'DELETE':
        break;
}
