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
        echo json_encode($empleado->get_empleados());
        break;
    case 'POST':
            $empleado->crear_empleado($body['rutEmpleado'], $body['nombreEmpleado'], $body['apellidoEmpleado'], $body['emailEmpleado'], $body['numeroTelefonoEmpleado'], $body['cRolE'], $body['cTaller']);
        echo json_encode(array('msg' => 'Agregado Correctamente'));
        break;
    case 'PUT':
        $empleado->crear_empleado($body['rutEmpleado'], $body['nombreEmpleado'], $body['apellidoEmpleado'], $body['emailEmpleado'], $body['numeroTelefonoEmpleado'], $body['cRolE'], $body['cTaller']);
        break;
        case 'DELETE':
            $empleado->delete_empleado($_GET['cEmpleado']);
            echo json_encode(array('msg' => 'Eliminado Correctamente'));
            break;
}



?>