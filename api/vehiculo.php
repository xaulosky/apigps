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
        } else if (isset($_GET["cCliente"])) {
            echo json_encode($vehiculo->get_vehiculo_por_cCliente($_GET["cCliente"]));
        } else {
            echo json_encode($vehiculo->get_vehiculos());
        }
        break;

    case 'POST':
        /* validar que existan */
        if (isset($body['patenteV'], $body['modeloV'], $body['colorV'], $body['estadoV'], $body['estadoRevisionTecnicaV'], $body['montoAseguradora'], $body['cCliente'], $body['cAseguradora'], $body['cTipoCarroceria'])) {
            $vehiculo->añadir_vehiculo($body['patenteV'], $body['modeloV'], $body['colorV'], $body['estadoV'], $body['estadoRevisionTecnicaV'], $body['montoAseguradora'], $body['cCliente'], $body['cAseguradora'], $body['cTipoCarroceria']);
            echo json_encode(array('msg' => 'Agregado correctamente'));
        } else {
            echo json_encode(array('msg' => 'Faltan datos'));
        }
        break;

    case 'PUT':
        /* validar que existan */
        if (isset($body['cVehiculo'], $body['patenteV'], $body['modeloV'], $body['colorV'], $body['estadoV'], $body['estadoRevisionTecnicaV'], $body['montoAseguradora'])) {
            $vehiculo->actualizar_vehiculo($body['cVehiculo'], $body['patenteV'], $body['modeloV'], $body['colorV'], $body['estadoV'], $body['estadoRevisionTecnicaV'], $body['montoAseguradora']);
            echo json_encode(array('msg' => 'Actualizado correctamente'));
        } else {
            echo json_encode(array('msg' => 'Faltan datos o no existe el vehiculo'));
        }
        break;


    case 'DELETE':
        if (isset($_GET['cVehiculo'])) {
            $vehiculo->eliminar_vehiculo($_GET['cVehiculo']);
            echo json_encode(array('msg' => 'Vehiculo eliminado'));
        } else {
            echo json_encode(array('msg' => 'Error, no se pudo eliminar el vehiculo'));
        }
        break;
}
