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
}
