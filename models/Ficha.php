<?php

class Ficha extends Conectar
{
    public function get_fichas()
    {
        $conectar = parent::conexion();
        $sql = "SELECT * FROM ficha";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    /* function add ficha resive cParteV, cFicha, estado */
    public function add_ficha($fechaIngresoFicha, $fechaEntregaEstimada,  $cTaller, $cVehiculo, $cUsuario, $fichaObservacion)
    {
        $conectar = parent::conexion();
        $sql = "INSERT INTO ficha (fechaIngresoFicha, fechaEntregaEstimada,cTaller,cVehiculo,cUsuario,fichaObservacion) VALUES ( :fechaIngresoFicha, :fechaEntregaEstimada, :cTaller, :cVehiculo, :cUsuario, :fichaObservacion)";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(":fechaIngresoFicha", $fechaIngresoFicha);
        $sql->bindValue(":fechaEntregaEstimada", $fechaEntregaEstimada);
        $sql->bindValue(":cTaller", $cTaller);
        $sql->bindValue(":cVehiculo", $cVehiculo);
        $sql->bindValue(":cUsuario", $cUsuario);
        $sql->bindValue(":fichaObservacion", $fichaObservacion);
        $sql->execute();

        return $sql;
    }
}
