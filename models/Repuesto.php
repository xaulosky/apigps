<?php

require_once '../config/funciones.php';

class Repuesto extends Conectar
{

    /*Función para obtener la lista de repuestos existentes en la BBDD*/
    function get_repuestos()
    {
        $conectar = parent::conexion();
        $sql = "SELECT * FROM repuesto";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    /*Función para agregar un nuevo repuesto*/
    function add_repuestos($nombreRepuesto, $cantidad, $fechaSolicitud, $fechaLlegada, $estadoRepuesto, $cTaller)
    {
        $conectar = parent::conexion();
        $sql = "INSERT INTO repuesto (nombreRepuesto, cantidad, fechaSolicitud, fechaLlegada, estadoRepuesto, cTaller) VALUES (?, ?, ?, ?, ?, ?)";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $nombreRepuesto);
        $sql->bindValue(2, $cantidad);
        $sql->bindValue(3, $fechaSolicitud);
        $sql->bindValue(4, $fechaLlegada);
        $sql->bindValue(5, $estadoRepuesto);
        $sql->bindValue(6, $cTaller);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}
