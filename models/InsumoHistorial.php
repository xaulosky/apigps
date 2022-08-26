<?php

class InsumoHistorial extends Conectar
{
    public function get_historial_insumo($cInsumo)
    {
        $conectar = parent::conexion();
        $sql = "SELECT cHistorialInsumo, DATE_FORMAT(fechaCambio, '%m/%d/%Y') as fechaCambio, nombreInsumo, cantidad, costo, cInsumo FROM historialInsumo WHERE cInsumo = ? ORDER BY cHistorialInsumo DESC LIMIT 3";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $cInsumo);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function restaurar_historial_insumo($cInsumo)
    {
        $conectar = parent::conexion();
        $sql = "UPDATE insumo SET estadoI = 1 WHERE cInsumo = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $cInsumo);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}
