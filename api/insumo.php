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
             echo json_encode($insumo->get_insumo_por_nombre($_GET['nombreInsumo']));
         } else if(isset($_GET['cInsumo'])){
            echo json_encode($insumo->get_insumo_por_cInsumo($_GET['cInsumo']));
        } else{
            echo json_encode($insumo->get_insumo());
        }
         break;
    case 'POST':
        # code...
        break;
}
