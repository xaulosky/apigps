<?php

/* header json */
header('Content-Type: application/json');

require_once '../config/conexion.php';
require_once '../models/Cliente.php';

$cliente = new Cliente();

$body = json_decode(file_get_contents("php://input"), true);

/* method*/
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        if (isset($_GET['id'])) {
            echo json_encode($cliente->get_cliente($_GET['id']));
        } else if(isset($_GET['nombreC'])){
            echo json_encode($cliente->get_cliente_por_nombre($_GET['nombreC']));
        } else if(isset($_GET['rutC'])){
            echo json_encode($cliente->get_cliente_por_rut($_GET['rutC']));
        }  else if(isset($_GET['apellidoC'])){
            echo json_encode($cliente->get_cliente_por_apellido($_GET['apellidoC']));
        } else{
            echo json_encode($cliente->get_clientes());
        }
        break;

    case 'POST':
        /* valida que todos los datos sean enviados de lo contrario envia un mensaje de que faltan datos */
        if (isset($body['rutC']) && isset($body['emailC']) && isset($body['nombreC']) && isset($body['apellidoC']) && isset($body['direccionC']) && isset($body['cComuna'])) {
            $cliente->add_cliente($body['rutC'], $body['emailC'], $body['nombreC'], $body['apellidoC'], $body['direccionC'], $body['cComuna']);
            echo json_encode(array('msg' => 'Cliente agregado'));
        } else {
            echo json_encode(array('msg' => 'Faltan datos'));
        }
        break;

    case 'PUT':
        /* valida que todos los datos sean enviados de lo contrario envia un mensaje de que faltan datos */
        if (isset($body['cCliente']) && isset($body['rutC']) && isset($body['emailC']) && isset($body['nombreC']) && isset($body['apellidoC']) && isset($body['direccionC']) && isset($body['cComuna'])) {
            $cliente->update_cliente($body['cCliente'], $body['rutC'], $body['emailC'], $body['nombreC'], $body['apellidoC'], $body['direccionC'], $body['cComuna']);
            echo json_encode(array('msg' => 'Cliente actualizado'));
        } else {
            echo json_encode(array('msg' => 'Faltan datos'));
        }
        break;
        case 'DELETE':
        /* valida que todos los datos sean enviados de lo contrario envia un mensaje de que faltan datos */
        if (isset($body['cCliente'])) {
            $cliente->delete_cliente($body['cCliente']);
            echo json_encode(array('msg' => 'Cliente eliminado'));
        } else {
            echo json_encode(array('msg' => 'Faltan datos'));
        }
}
