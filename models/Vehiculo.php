<?php

require_once '../config/funciones.php';

class Vehiculo extends Conectar
{

    function get_vehiculos()
    {
        $conectar = parent::conexion();
        $sql = "SELECT * FROM vehiculo";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    function get_vehiculo($cVehiculo)
    {
        $conectar = parent::conexion();
        $sql = "SELECT * FROM vehiculo WHERE cVehiculo = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $cVehiculo);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    function add_vehiculo($patenteV, $colorV, $modeloV, $estadoV, $estadoRevisionTecnicaV, $montoAseguradora, $cCliente, $cAseguradora, $cTipoCarroceria)
    {
        $conectar = parent::conexion();
        $sql = "INSERT INTO vehiculo VALUES(null, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, limpiaInput($patenteV));
        $sql->bindValue(2, $colorV);
        $sql->bindValue(3, $modeloV);
        $sql->bindValue(4, $estadoV);
        $sql->bindValue(5, $estadoRevisionTecnicaV);
        $sql->bindValue(6, $montoAseguradora);
        $sql->bindValue(7, $cCliente);
        $sql->bindValue(8, $cAseguradora);
        $sql->bindValue(9, $cTipoCarroceria);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}
