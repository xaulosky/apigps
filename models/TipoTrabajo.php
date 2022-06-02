<?php

class TipoTrabajo extends Conectar
{
    public function get_tipoTrabajo()
    {
        $conectar = parent::conexion();
        $sql = "SELECT cTipoT FROM tipoTrabajo";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_tipoTrabajo($id)
    {
        $conectar = parent::conexion();
        $sql = "SELECT * FROM tipoTrabajo WHERE cTipoT = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}