<?php

require_once '../config/funciones.php';

class Repuesto extends Conectar
{

    /*Función para obtener la lista de repuestos existentes en la BBDD*/
    function get_repuestos($cTaller)
    {
        $conectar = parent::conexion();
        $sql = "SELECT * FROM repuesto WHERE cTaller = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $cTaller);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

/*Función para agregar un nuevo repuesto*/
    public function add_repuestos($nombreRepuesto, $cantidad, $fechaSolicitud, $estadoRepuesto, $cTaller)
    {
        $conectar = parent::conexion();
        $sql = "INSERT INTO repuesto (nombreRepuesto, cantidad, fechaSolicitud, estadoRepuesto, cTaller) VALUES (?, ?, ?, ?, ?)";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $nombreRepuesto);
        $sql->bindValue(2, $cantidad);
        $sql->bindValue(3, $fechaSolicitud);
        $sql->bindValue(4, $estadoRepuesto);
        $sql->bindValue(5, $cTaller);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}
