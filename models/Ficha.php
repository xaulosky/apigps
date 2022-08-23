<?php

class Ficha extends Conectar
{
    public function get_fichas($cTaller)
    {
        $conectar = parent::conexion();
        $sql = "SELECT f.cFicha, f.fechaIngresoFicha, f.fechaEntregaEstimada, f.fechaEntrega, f.fichaObservacion, v.patenteV, c.nombreC, c.apellidoC FROM ficha f, cliente c, vehiculo v, usuario u WHERE f.cTaller = c.cTaller AND f.cUsuario = u.cUsuario AND v.cVehiculo = f.cVehiculo AND c.cCliente = v.cCliente AND f.cTaller = :cTaller AND f.fichaBorrada = 0 ORDER BY f.cFicha DESC";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(":cTaller", $cTaller);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    public function get_ficha_by_id($cTaller, $cFicha)
    {
        $conectar = parent::conexion();
        $sql = "SELECT f.cFicha, f.fechaIngresoFicha, f.fichaObservacion, f.fechaEntregaEstimada, f.fechaEntrega, v.patenteV, c.nombreC, c.apellidoC FROM ficha f, cliente c, vehiculo v, usuario u WHERE f.cTaller = c.cTaller AND f.cUsuario = u.cUsuario AND v.cVehiculo = f.cVehiculo AND c.cCliente = v.cCliente AND f.cTaller = :cTaller AND f.fichaBorrada = 0 AND f.cFicha = :cFicha";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(":cTaller", $cTaller);
        $sql->bindValue(":cFicha", $cFicha);

        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    /* function add ficha resive cParteV, cFicha, estado */
    public function add_ficha($fechaIngresoFicha, $fechaEntregaEstimada,  $cTaller, $cVehiculo, $cUsuario, $fichaObservacion)
    {
        $conectar = parent::conexion();
        $sql = "INSERT INTO ficha (fechaIngresoFicha, fechaEntregaEstimada,cTaller,cVehiculo,cUsuario,fichaObservacion, fichaBorrada) VALUES ( :fechaIngresoFicha, :fechaEntregaEstimada, :cTaller, :cVehiculo, :cUsuario, :fichaObservacion, :fichaBorrada)";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(":fechaIngresoFicha", $fechaIngresoFicha);
        $sql->bindValue(":fechaEntregaEstimada", $fechaEntregaEstimada);
        $sql->bindValue(":cTaller", $cTaller);
        $sql->bindValue(":cVehiculo", $cVehiculo);
        $sql->bindValue(":cUsuario", $cUsuario);
        $sql->bindValue(":fichaObservacion", $fichaObservacion);
        $sql->bindValue(":fichaBorrada", 0);

        $sql->execute();

        return $sql;
    }

    public function delete_ficha($cFicha)
    {
        $conectar = parent::conexion();
        $sql = "UPDATE ficha SET fichaBorrada = 1 WHERE cFicha = :cFicha";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(":cFicha", $cFicha);
        $sql->execute();

        echo json_encode(array("msg" => "Eliminado correctamente"));
    }
}
