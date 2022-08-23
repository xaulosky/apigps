<?php
/* configuracion de los CORS */
require_once("../config/configHeader.php");
require_once '../config/conexion.php';
require_once '../models/Cliente.php';

$cliente = new Cliente();

$body = json_decode(file_get_contents("php://input"), true);

/* method*/
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        if (isset($_GET['cTaller'])) {
            echo json_encode($cliente->clientes_eliminados($_GET['cTaller']));
        }
        break;

    case 'DELETE':
        if (isset($body['cCliente'])) {
            $cliente->restore_cliente($body['cCliente']);
            echo json_encode(array('msg' => 'Cliente restaurado'));
        } else {
            echo json_encode(array('msg' => 'Falta cCliente'));
        }
        break;
}