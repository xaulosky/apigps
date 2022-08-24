<?php
/* configuracion de los CORS */
require_once("../config/configHeader.php");

/* header json */
header('Content-Type: application/json');

require_once '../config/conexion.php';
require_once '../models/Empleado.php';

$empleado = new Empleado();

$body = json_decode(file_get_contents("php://input"), true);

/* method */
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        if (isset($_GET['cEmpleado'])) {
            echo json_encode($empleado->get_empleado($_GET['cEmpleado']));
        } 
     else {
        echo json_encode($empleado->get_empleados());
    }
        break;
    case 'POST':
        if (isset($body['rutEmpleado']) && ($body['nombreEmpleado']) && ($body['apellidoEmpleado']) && ($body['emailEmpleado']) && ($body['numeroTelefonoEmpleado']) && ($body['cRolE']) && ($body['cTaller'])) {
        $empleado->crear_empleado($body['rutEmpleado'], $body['nombreEmpleado'], $body['apellidoEmpleado'], $body['emailEmpleado'], $body['numeroTelefonoEmpleado'], $body['cRolE'], $body['cTaller']);
        echo json_encode(array('msg' => 'Agregado Correctamente'));
    } else {
        echo json_encode(array('msg' => 'Faltan datos'));
    }
        break;
    case 'PUT':
        if (isset($body['rutEmpleado']) && ($body['nombreEmpleado']) && ($body['apellidoEmpleado']) && ($body['emailEmpleado']) && ($body['numeroTelefonoEmpleado']) && ($body['cRolE']) && ($body['cTaller']) && ($body['cEmpleado'])) {
        $empleado->update_empleado($body['rutEmpleado'], $body['nombreEmpleado'], $body['apellidoEmpleado'], $body['emailEmpleado'], $body['numeroTelefonoEmpleado'], $body['cRolE'], $body['cTaller'], $body['cEmpleado']);
        echo json_encode(array('msg' => 'Actualizado Correctamente'));
    } else {
        echo json_encode(array('msg' => 'Faltan datos o no existe el empleado'));
    }
        break;
    case 'DELETE':
        if (isset($_GET['cEmpleado'])) {
        $empleado->delete_empleado($_GET['cEmpleado']);
        echo json_encode(array('msg' => 'Eliminado Correctamente'));
    } else {
        echo json_encode(array('msg' => 'Error, no se pudo eliminar el empleado'));
    }
        break;
}