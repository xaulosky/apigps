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
    case 'POST':
        /* valida que todos los datos sean enviados de lo contrario envia un mensaje de que faltan datos */
        echo json_encode($ficha->add_ficha($body['fechaIngresoFicha'], $body['fechaEntregaEstimada'], $body['cTaller'], $body['cVehiculo'], $body['cUsuario'], $body['fichaObservacion']));
        break;
}
