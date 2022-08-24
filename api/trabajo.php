<?php
/* configuracion de los CORS */
require_once("../config/configHeader.php");

/* header json */
header('Content-Type: application/json');
require_once("../config/configHeader.php");
require_once '../config/conexion.php';
require_once '../models/Trabajo.php';

$trabajo = new Trabajo();

$body = json_decode(file_get_contents("php://input"), true);

/* method*/
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        echo json_encode($trabajo->get_trabajos());
        break;
    case 'POST':
        if (isset($body['nombreTrabajo']) && ($body['descripcionTrabajo']) && ($body['fechaEstimadaT']) && ($body['fechaRealT']) && ($body['estadoT']) && ($body['costoT']) && ($body['horasT']) && ($body['cOrdenTrabajo']) && ($body['cTipoT']) && ($body['cEmpleado'])) {
            $trabajo->crear_trabajo($body['nombreTrabajo'], $body['descripcionTrabajo'], $body['fechaEstimadaT'], $body['fechaRealT'], $body['estadoT'], $body['costoT'], $body['horasT'], $body['cOrdenTrabajo'], $body['cTipoT'], $body['cEmpleado'] );
        echo json_encode(array('msg' => 'Agregado Correctamente'));
    } else {
        echo json_encode(array('msg' => 'Faltan datos'));
    }
        break;
    case 'PUT':
        if (isset($body['cTrabajo']) && ($body['nombreTrabajo']) && ($body['descripcionTrabajo']) && ($body['fechaEstimadaT']) && ($body['fechaRealT']) && ($body['estadoT']) && ($body['costoT']) && ($body['horasT']) && ($body['cOrdenTrabajo']) && ($body['cTipoT']) && ($body['cEmpleado'])) {
        $trabajo->update_trabajo($body['cTrabajo'],$body['nombreTrabajo'], $body['descripcionTrabajo'], $body['fechaEstimadaT'], $body['fechaRealT'], $body['estadoT'], $body['costoT'], $body['horasT'], $body['cOrdenTrabajo'], $body['cTipoT'], $body['cEmpleado'] );
        echo json_encode(array('msg' => 'Actualizado Correctamente'));
    } else {
        echo json_encode(array('msg' => 'Faltan datos o no existe el trabajo'));
    }
        break;
    case 'DELETE':
        if (isset($_GET['cTrabajo'])) {
        $trabajo->delete_trabajo($_GET['cTrabajo']);
        echo json_encode(array('msg' => 'Eliminado Correctamente'));
    } else {
        echo json_encode(array('msg' => 'Error, no se pudo eliminar el trabajo'));
    }
        break;
}



?>