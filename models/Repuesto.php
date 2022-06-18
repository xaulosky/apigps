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
    function add_repuestos($nombreRepuesto, $cantidad, $fechaSolicitud, $estadoRepuesto)
    {
        $conectar = parent::conexion();
        $sql = "INSERT INTO repuesto (nombreRepuesto, cantidad, fechaSolicitud, estadoRepuesto) VALUES (?, ?, ?, ?)";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $nombreRepuesto);
        $sql->bindValue(2, $cantidad);
        $sql->bindValue(3, $fechaSolicitud);
        $sql->bindValue(4, $estadoRepuesto);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}
