<?php
/* configuracion de los CORS */
 require_once("../config/configHeader.php");


/* header json */
header('Content-Type: application/json');

require_once '../config/conexion.php';
require_once '../models/vehiculo.php';

$vehiculo = new Vehiculo();

$body = json_decode(file_get_contents("php://input"), true);

/* method*/
$method = $_SERVER['REQUEST_METHOD'];

//funcion GET para obtener todos los vehiculos
switch ($method) {
    case 'GET':
        if (isset($_GET['cVehiculo'])) {
            echo json_encode($vehiculo->get_vehiculos($_GET['cVehiculo']));
        } else if(isset($_GET['patenteV'])) {
            echo json_encode($vehiculo->get_vehiculo_por_patente($_GET['patenteV']));
        } else if(isset($_GET['modeloV'])) {
            echo json_encode($vehiculo->get_vehiculo_por_modelo($_GET['modeloV']));
        }  else if(isset($_GET['colorV'])) {
            echo json_encode($vehiculo->get_vehiculo_por_color($_GET['colorV']));
        }else if(isset($_GET['estadoV'])) {
            echo json_encode($vehiculo->get_vehiculo_por_estado($_GET['estadoV']));
        }else if(isset($_GET['estadoRevisionTecnica'])) {
            echo json_encode($vehiculo->get_vehiculo_por_estadoRevision($_GET['estadoRevisionTecnica']));
        }else if(isset($_GET['montoAseguradora'])) {
            echo json_encode($vehiculo->get_vehiculo_por_montoAseguradora($_GET['montoAseguradora']));
        }else if(isset($_GET['cAseguradora'])) {
            echo json_encode($vehiculo->get_vehiculo_por_cAseguradora($_GET['cAseguradora']));
        }else if(isset($_GET['tipoCarroceria'])) {
            echo json_encode($vehiculo->get_vehiculo_por_TipoCarroceria($_GET['tipoCarroceria']));
        }else if(isset($_GET['cCliente'])) {
            echo json_encode($vehiculo->get_vehiculo_por_cCliente($_GET['cCliente']));
        }else{
            echo json_encode($vehiculo->get_vehiculos());
        }
        break;


    case 'POST':
        //funcion para comprobar si los datos del vehiculo estan vacios o están completos
        if (isset($body['cVehiculo']) && isset($body['patenteV']) && isset($body['modeloV']) && isset($body['colorV']) && isset($body['estadoV']) && isset($body['estadoRevisionTecnica']) && isset($body['montoAseguradora']) && isset($body['cAseguradora']) && isset($body['tipoCarroceria']) && isset($body['cCliente'])) {
            $vehiculo->añadir_vehiculo($body['cVehiculo'], $body['patenteV'], $body['modeloV'], $body['colorV'], $body['estadoV'], $body['estadoRevisionTecnica'], $body['montoAseguradora'], $body['cAseguradora'], $body['tipoCarroceria'], $body['cCliente']);
            echo json_encode(array('msg' => 'Vehiculo agregado correctamente'));
        } else {
            echo json_encode(array('msg' => 'Faltan datos'));
        }
        break;
}
