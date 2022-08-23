<?php

class OrdenTrabajo extends Conectar
{
    public function get_ordenTrabajos()
    {
        $conectar = parent::conexion();
        $sql = "SELECT cOrdenTrabajo FROM ordenTrabajo";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_tipoEstado($id)
    {
        $conectar = parent::conexion();
        $sql = "SELECT * FROM ordenTrabajo WHERE cOrdenTrabajo = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}