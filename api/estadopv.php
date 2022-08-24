<?php
/* configuracion de los CORS */
require_once("../config/configHeader.php");
require_once '../config/conexion.php';
require_once '../models/EstadoPV.php';

$estado = new EstadoPV();

$body = json_decode(file_get_contents("php://input"), true);

/* method*/
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        echo json_encode($estado->getEstadosPV($_GET["cFicha"]));
        break;
    case 'POST':
        /* valida que todos los datos sean enviados de lo contrario envia un mensaje de que faltan datos */
        $ficha = $_GET['ultima'];
        if (count($body) > 0) {
            foreach ($body as $item) {
                $estado->addEstadoPV($ficha, $item['cParteV'],  $item['estado']);
            }
        }
        break;
}
