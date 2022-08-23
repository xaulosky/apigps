<?php
/* configuracion de los CORS */
require_once("../config/configHeader.php");
require_once '../config/conexion.php';
require_once '../models/tipoCarroceria.php';

$tipoCarroceria = new TipoCarroceria();

$body = json_decode(file_get_contents("php://input"), true);

switch ($method) {

    case 'GET': //obtener una aseguradora por su id
        if (isset($_GET['cTipoCarroceria'])) {
            echo json_encode($tipoCarroceria->get_tipoCarroceria_por_id($_GET['cTipoCarroceria']));
        }else if (isset($_GET['tipoCarroceria'])) {
            echo json_encode($tipoCarroceria->get_tipoCarroceria_por_tipo($_GET['tipoCarroceria']));
        } else {
            echo json_encode($tipoCarroceria->get_tipoCarroceria());
        }

        break;

    case 'POST': //agregar una aseguradora

        /* valida que todos los datos sean enviados de lo contrario envia un mensaje de que faltan datos */
        if (isset(($body['nombreTipoCarroceria']), ($body['tipoCarroceria']))) {
            echo json_encode($tipoCarroceria->agregar_tipoCarroceria($body['nombreTipoCarroceria'], $body['tipoCarroceria']));
        } else {
            echo json_encode(array('msg' => 'Faltan datos'));
        }

        break;

    case 'PUT': //actualizar una aseguradora

        /* valida que todos los datos sean enviados de lo contrario envia un mensaje de que faltan datos */
        if (isset($body['cTipoCarroceria']) && isset($body['nombreTipoCarroceria']) && isset($body['tipoCarroceria'])) {
            echo json_encode($tipoCarroceria->editar_tipoCarroceria($body['cTipoCarroceria'], $body['nombreTipoCarroceria'], $body['tipoCarroceria']));
        } else {
            echo json_encode(array('msg' => 'Faltan datos'));
        }

        break;

    case 'DELETE': //eliminar una aseguradora

        /* valida que todos los datos sean enviados de lo contrario envia un mensaje de que faltan datos */
        if (isset($_GET['cTipoCarroceria'])) {
            echo json_encode($tipoCarroceria->eliminar_tipoCarroceria($_GET['cTipoCarroceria']));
        } else {
            echo json_encode(array('msg' => 'Faltan datos'));
        }

        break;
}
