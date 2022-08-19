<?php

/* configuracion de los CORS */
header('Content-Type: application/json');
require_once("../config/configHeader.php");
require_once '../config/conexion.php';
require_once '../models/Taller.php';

$taller = new Taller();

$body = json_decode(file_get_contents("php://input"), true);

/* method*/
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        if (isset($_GET['cTaller'])) {
            echo json_encode($taller->get_taller($_GET['cTaller']));
        } else {
            echo json_encode($taller->get_talleres());
        }
        break;

    case 'POST':
        /* validar que existan */
        if (isset($body['rutTaller'] ,$body['nombreTaller'], $body['direccionTaller'],$body['nombreDueñoTaller'], $body['apellidoPDUeñoTaller'], $body['apellidoMDueñoTaller'], $body['rutDueñoTaller'], $body['emailTaller'], $body['numeroTelefonoTaller'], $body['cComuna'])) {
            $taller->agregar_taller($body['rutTaller'] ,$body['nombreTaller'], $body['direccionTaller'],$body['nombreDueñoTaller'], $body['apellidoPDUeñoTaller'], $body['apellidoMDueñoTaller'],$body['rutDueñoTaller'], $body['emailTaller'], $body['numeroTelefonoTaller'], $body['cComuna']);
            echo json_encode(array('msg' => 'Agregado correctamente'));
        } else {
            echo json_encode(array('msg' => 'Faltan datos'));
        }
        break;

    case 'PUT':
        /* validar que existan */
        if (isset($body['cTaller'] ,$body['rutTaller'] ,$body['nombreTaller'], $body['direccionTaller'],$body['nombreDueñoTaller'], $body['apellidoPDUeñoTaller'], $body['apellidoMDueñoTaller'], $body['rutDueñoTaller'], $body['emailTaller'], $body['numeroTelefonoTaller'], $body['cComuna'])) {
            $taller->actualizar_taller($body['cTaller'],$body['rutTaller'] ,$body['nombreTaller'], $body['direccionTaller'],$body['nombreDueñoTaller'], $body['apellidoPDUeñoTaller'], $body['apellidoMDueñoTaller'],$body['rutDueñoTaller'], $body['emailTaller'], $body['numeroTelefonoTaller'], $body['cComuna']);
            echo json_encode(array('msg' => 'Actualizado correctamente'));
        } else {
            echo json_encode(array('msg' => 'Faltan datos'));
        }
        break;

    case 'DELETE':
        /* validar que existan */
        if (isset($_GET['cTaller'])) {
            $taller->eliminar_taller($_GET['cTaller']);
            echo json_encode(array('msg' => 'Eliminado correctamente'));
        } else {
            echo json_encode(array('msg' => 'Faltan datos'));
        }
        break;

    default:
        echo json_encode(array('msg' => 'Metodo no soportado'));
        break;
}
