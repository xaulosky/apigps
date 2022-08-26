<?php

header('Content-Type: application/json');

// Configuración de los CORS
require_once("../config/configHeader.php");
require_once '../config/conexion.php';
require_once '../models/Repuesto2.php';

$repuesto = new Repuesto();

$body = json_decode(file_get_contents("php://input"), true);

// Method
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {

    //Obtiene repuestos
    case 'GET':
        echo json_encode($repuesto->get_repuestos($_GET['cTaller']));
        break;

    //Valida que los campos necesarios sean llenados
    case 'POST':
        if (isset($body['nombreRepuesto']) && isset($body['marcaV']) && isset($body['modeloV']) && isset($body['cantidad'])) {
            $repuesto->add_repuestos($body['nombreRepuesto'], $body['marcaV'], $body['modeloV'], $body['cantidad'], $body['cTaller']);
            echo json_encode(array('msg' => 'Repuesto Agregado'));
        } else {
            echo json_encode(array('msg' => 'Falta rellenar algún campo'));
        }
        break;

    //Edita un repuesto existente
    case 'PUT':
        if (isset($body['nombreRepuesto']) && isset($body['marcaV']) && isset($body['modeloV']) && isset($body['cantidad']) && isset($body['estadoRepuesto']) && isset($body['cRepuesto'])) {
            $repuesto->edit_repuestos($body['nombreRepuesto'], $body['marcaV'], $body['modeloV'], $body['cantidad'], $body['estadoRepuesto'], $body['cRepuesto']);
            echo json_encode(array('msg' => 'Repuesto Editado'));
        } else {
            echo json_encode(array('msg' => 'Fallo al editar el repuesto'));
        }
        break;

    //Borra un repuesto por su código
    case 'DELETE':
        if (isset($_GET['cRepuesto'])) {
            $repuesto->delete_repuestos($_GET['cRepuesto']);
            echo json_encode(array('msg' => 'Repuesto Eliminado'));
        } else {
            echo json_encode(array('msg' => 'Fallo al eliminar el repuesto'));
        }
        break;
}
