<?php

header('Content-Type: application/json');

require_once("../config/configHeader.php");
require_once '../config/conexion.php';
require_once '../models/InsumoHistorial.php';

$insumoHistorial = new InsumoHistorial();

$body = json_decode(file_get_contents("php://input"), true);

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        if(isset($_GET['cInsumo'])){
            echo json_encode($insumoHistorial->get_historial_insumo($_GET['cInsumo']));
        }else{
            echo json_encode(array('msg' => 'No hay datos'));
        }
        break;
    case 'PUT':
        if(isset($body['nombreInsumo']) && isset($body['cantidad']) && isset($body['costo']) && isset($body['cInsumo'])){
            $insumoHistorial->restaurar_historial_insumo($body['nombreInsumo'], $body['cantidad'], $body['costo'],$body['cInsumo']);
            echo json_encode(array('msg' => 'Insumo restaurado')); 
        }else{
            echo json_encode(array('msg' => 'Error al restaurar insumo'));
        }
}   
