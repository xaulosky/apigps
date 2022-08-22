<?php

class InsumoHistorial extends Conectar
{
    public function get_historial_insumo($cInsumo)
    {
        $conectar = parent::conexion();
        $sql = "SELECT cHistorialInsumo,DATE_FORMAT(fechaCambio, '%m/%d/%Y') as fechaCambio, nombreInsumo, cantidad, costo, cInsumo FROM historialInsumo WHERE cInsumo = ? ORDER BY cHistorialInsumo DESC LIMIT 3";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $cInsumo);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function restaurar_historial_insumo($nombreInsumo, $cantidad, $costo, $cInsumo)
    {
        $conectar = parent::conexion();
        $sql = "UPDATE insumo SET nombreInsumo = ?, cantidad = ?, costo = ? WHERE cInsumo = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $nombreInsumo);
        $sql->bindValue(2, $cantidad);
        $sql->bindValue(3, $costo);
        $sql->bindValue(4, $cInsumo);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}
