<?php

require_once '../config/funciones.php';

class Repuesto extends Conectar
{

    // Función para obtener la lista de repuestos existentes en la BBDD
    function get_repuestos($cTaller)
    {
        $conectar = parent::conexion();
        $sql = "SELECT * FROM repuesto WHERE cTaller = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $cTaller);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    // Función para agregar un nuevo repuesto
    function add_repuestos($nombreRepuesto, $cantidad, $fechaSolicitud, $estadoRepuesto, $cTaller)
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

    // Función para editar un repuesto existente
    function edit_repuestos($nombreRepuesto, $cantidad, $fechaSolicitud, $fechaLlegada, $estadoRepuesto, $cRepuesto)
    {
        $conectar = parent::conexion();
        $sql = "UPDATE repuesto SET nombreRepuesto = ?, cantidad = ?, fechaSolicitud = ?, fechaLlegada = ?, estadoRepuesto = ? WHERE cRepuesto = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $nombreRepuesto);
        $sql->bindValue(2, $cantidad);
        $sql->bindValue(3, $fechaSolicitud);
        $sql->bindValue(4, $fechaLlegada);
        $sql->bindValue(5, $estadoRepuesto);
        $sql->bindValue(6, $cRepuesto);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    // Función para eliminar un repuesto
    function delete_repuestos($cRepuesto)
    {
        $conectar = parent::conexion();
        $sql = "DELETE FROM repuesto WHERE cRepuesto = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $cRepuesto);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}
