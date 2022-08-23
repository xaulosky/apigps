<?php

 header('Content-Type: application/json');

 require_once("../config/configHeader.php");//Sirve para permitir que se realicen las consultas a la BBDD
 require_once '../config/conexion.php';
 require_once '../models/Insumo.php';

 $insumo = new Insumo();

 $body = json_decode(file_get_contents("php://input"), true);

 /* method */
 $method = $_SERVER['REQUEST_METHOD'];

 switch ($method) {
     case 'GET':
            echo json_encode($insumo->get_insumo($_GET['cTaller']));
            break;

    case 'POST':
        if(isset($body['nombreInsumo']) && isset($body['cantidad']) && isset($body['costo']) && isset($body['cTaller'])){
            $insumo->agregar_insumo($body['nombreInsumo'], $body['cantidad'], $body['costo'], $body['cTaller']);
            echo json_encode(array('msg' => 'ok'));
        }else{
            echo json_encode(array('msg' => 'no'));
        }
        break;

    case 'PUT':
        if(isset($body['nombreInsumo']) && isset($body['cantidad']) && isset($body['costo']) && isset($body['cInsumo']) && isset($body['cTaller'])){
            
            $insumo->actualizar_insumo($body['nombreInsumo'], $body['cantidad'], $body['costo'],$body['cInsumo'] ,$body['cTaller']);
            echo json_encode(array( 'msg' => 'ok'));
        }else{
            echo json_encode(array('msg' => 'no'));
        }
        break;

    case 'DELETE':
        if (isset($_GET['cInsumo'])){
            $insumo->update_estado_insumo($_GET['cInsumo']);
            echo json_encode(array('msg' => 'ok'));
        } else {
            echo json_encode(array('msg' => 'no'));
        }
        break;
}
