<?php

class Comuna extends Conectar
{
    /* function get comuna */
    public function get_comunas()
    {
        $conectar = parent::conexion();
        $sql = "SELECT cComuna, nombreC FROM comuna";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_comuna($id)
    {
        $conectar = parent::conexion();
        $sql = "SELECT * FROM comuna WHERE cComuna = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}