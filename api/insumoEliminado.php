<?php
header('Content-Type: application/json');

require_once("../config/configHeader.php"); //Sirve para permitir que se realicen las consultas a la BBDD
require_once '../config/conexion.php';
require_once '../models/InsumoEliminado.php';

$insumoEliminado = new InsumoEliminado();

$body = json_decode(file_get_contents("php://input"), true);

/* method */
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        echo json_encode($insumoEliminado->get_insumoEliminado());
        break;
    case 'PUT':
        if (isset($body['idInsumoEliminado'])) {
            $insumoEliminado->restaurarInsumo($body['idInsumoEliminado']);
        }
        break;
}