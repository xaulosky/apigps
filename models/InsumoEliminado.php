<?php
/* Obtener InsumosEliminados desde la tabla insumoEliminado ordenados por fecha*/

class InsumoEliminado extends Conectar
{
    public function get_insumoEliminado()
    {
        $conectar = parent::conexion();
        $sql = "SELECT * FROM insumoEliminado ORDER BY fechaInsumoEliminado DESC";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    public function restaurarInsumo($idInsumoEliminado)
    {
        $conectar = parent::conexion();
        $sql = "UPDATE insumoEliminado SET estadoInsumoEliminado = '1' WHERE idInsumoEliminado = '$idInsumoEliminado'";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}
