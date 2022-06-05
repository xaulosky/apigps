<?php

require_once '../config/funciones.php';

class Repuesto extends Conectar
{

    function get_repuestos()
    {
        $conectar = parent::conexion();
        $sql = "SELECT * FROM repuesto";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}
