<?php
/* configuracion de los CORS */
require_once("../config/configHeader.php");
require_once '../config/conexion.php';
require_once '../models/Aseguradora.php';

$aseguradora = new Aseguradora();

$body = json_decode(file_get_contents("php://input"), true);

/*method*/
$method = $_SERVER['REQUEST_METHOD'];

    switch ($method) {
        case 'GET':
            if (isset($_GET['cAseguradora'])) {
                echo json_encode($aseguradora->get_aseguradora($_GET['cAseguradora']));
            } else if (isset($_GET['nombreAseguradora'])) {
                echo json_encode($aseguradora->get_aseguradora_por_nombre($_GET['nombreAseguradora']));
            } else if (isset($_GET['tipoSeguro'])) {
                echo json_encode($aseguradora->get_aseguradora_por_tipo($_GET['tipoSeguro']));
            } else {
                echo json_encode($aseguradora->get_aseguradoras());
            }
            break; 

        case 'POST':
            /* valida que todos los datos sean enviados de lo contrario envia un mensaje de que faltan datos */
            if (isset(($body['nombreAseguradora']) ,($body['tipoSeguro']))) {
                echo json_encode($aseguradora->add_aseguradora($body['nombreAseguradora'], $body['tipoSeguro']));
            } else {
                echo json_encode(array('msg' => 'Faltan datos'));
            }
            break;

        case 'PUT':
            /* valida que todos los datos sean enviados de lo contrario envia un mensaje de que faltan datos */
            if (isset($body['cAseguradora']) && isset($body['nombreAseguradora']) && isset($body['tipoSeguro'])) {
                echo json_encode($aseguradora->update_aseguradora($body['cAseguradora'], $body['nombreAseguradora'], $body['tipoSeguro']));
            } else {
                echo json_encode(array('msg' => 'Faltan datos'));
            }
            break;

        case 'DELETE':
            /* valida que todos los datos sean enviados de lo contrario envia un mensaje de que faltan datos */
            if (isset($_GET['cAseguradora'])) {
                echo json_encode($aseguradora->delete_aseguradora($_GET['cAseguradora']));
            } else {
                echo json_encode(array('msg' => 'Faltan datos'));
            }
            break;
        }
        
