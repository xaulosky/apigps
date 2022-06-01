<?php
/* configuracion de los CORS */
 require_once("../config/configHeader.php");


/* header json */
header('Content-Type: application/json');

require_once '../config/conexion.php';
require_once '../models/Trabajo.php';


$trabajo = new Trabajo();

$body = json_decode(file_get_contents("php://input"), true);

/* method*/
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        if (isset($_GET['cTrabajo'])) {
            echo json_encode($trabajo->get_trabajo($_GET['cTrabajo']));
        } else {
            echo json_encode($trabajo->get_trabajos());
        }
        break;

    case 'POST':
       
        break;

    case 'PUT':
        /* valida que todos los datos sean enviados de lo contrario envia un mensaje de que faltan datos */
        if (isset($body['cTrabajo']) && isset($body['nombreTrabajo']) && isset($body['descripcionTrabajo']) && isset($body['fechaEstimadaT']) && isset($body['fechaRealT']) && isset($body['estadoT'])  && isset($body['horasT']) && isset($body['cOrdenTrabajo']) && isset($body['cTipoT']) && isset($body['cEmpleado'])) {
            $trabajo->update_trabajo($body['cTrabajo'], $body['nombreTrabajo'], $body['descripcionTrabajo'], $body['fechaEstimadaT'], $body['fechaRealT'], $body['estadoT'], $body['horasT'], $body['cOrdenTrabajo'], $body['cTipoT'], $body['cEmpleado']);
            echo json_encode(array('msg' => 'Trabajo actualizado'));
        } else {
            echo json_encode(array('msg' => 'Faltan datos'));
        }
        break;
        case 'DELETE':
        /* valida que todos los datos sean enviados de lo contrario envia un mensaje de que faltan datos */
        if (isset($body['cTrabajo'])) {
            $trabajo->delete_trabajo($body['cTrabajo']);
            echo json_encode(array('msg' => 'Trabajo eliminado'));
        } else {
            echo json_encode(array('msg' => 'Faltan datos'));
        }
}
