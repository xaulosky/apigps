<?php

 header('Content-Type: application/json');
 
 require_once '../config/conexion.php';
 require_once '../models/Insumo.php';

 $insumo = new Insumo();

 $body = json_decode(file_get_contents("php://input"), true);

 /* method */
 $method = $_SERVER['REQUEST_METHOD'];

 switch ($method) {
     case 'GET':
         if (isset($_GET['nombreInsumo'])){
             if($GET[nombreInsumo])
             echo json_encode($insumo->get_insumo_por_nombre($_GET['nombreInsumo']));
         } else if(isset($_GET['cInsumo'])){
            echo json_encode($insumo->get_insumo_por_cInsumo($_GET['cInsumo']));
        } else{
            echo json_encode($insumo->get_insumo());
        }
         break;


    case 'POST':
        if(isset($body['nombreInsumo']) && isset($body['cantidad']) && isset($body['costo']) ){
            $insumo->agregar_insumo($body['nombreInsumo'], $body['cantidad'], $body['costo'] );
            echo json_encode(array('msg' => 'Insumo agregado'));
        }else{
            echo json_encode(array('msg' => 'Faltan datos'));
        }
        break;


    case 'PUT':
        if(isset($body['cInsumo']) && isset($body['nombreInsumo']) && isset($body['cantidad']) && isset($body['costo'])){
            $insumo->actualizar_insumo($body['nombreInsumo'], $body['cantidad'], $body['costo'],$body['cInsumo']);
            echo json_encode(array('msg' => 'Insumo actualizado'));
        }else{
            echo json_encode(array('msg' => 'Faltan datos'));
        }
        break;
}
