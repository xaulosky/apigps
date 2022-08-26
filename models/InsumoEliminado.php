<?php
/* Obtener InsumosEliminados desde la tabla insumoEliminado ordenados por fecha*/

class InsumoEliminado extends Conectar
{
    public function get_insumo_eliminado($cTaller)
    {
        $conectar = parent::conexion();
        $sql = "SELECT * FROM insumo WHERE cTaller = ? AND estadoI = 0";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $cTaller);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }


    public function restaurar_eliminado_insumo($cInsumo)
    {
        $conectar = parent::conexion();
        $sql = "UPDATE insumo SET estadoI = 1 WHERE cInsumo = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $cInsumo);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}
