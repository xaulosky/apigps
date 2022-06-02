<?php

class TipoEstado extends Conectar
{
    public function get_tipoEstados()
    {
        $conectar = parent::conexion();
        $sql = "SELECT cTipoE FROM tipoEstado";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_tipoEstado($id)
    {
        $conectar = parent::conexion();
        $sql = "SELECT * FROM tipoEstado WHERE cTipoE = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}