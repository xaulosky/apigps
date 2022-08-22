<?php

class tipoCarroceria extends Conectar
{
    public function get_tipoCarroceria()
    {
        $conectar = parent::conexion();
        $sql = "SELECT * FROM tipoCarroceria ORDER BY cTipoCarroceria DESC";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    //Función para obtener un tipo de carroceria por su id

    public function get_tipoCarroceria_por_id($cTipoCarroceria)
    {
        $conectar = parent::conexion();
        $sql = "SELECT * FROM tipoCarroceria WHERE cTipoCarroceria = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, limpiaInput($cTipoCarroceria));
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    //funcion para obtener un tipo de carroceria por su tipo
    public function get_tipoCarroceria_por_tipo($tipoCarroceria)
    {
        $conectar = parent::conexion();
        $sql = "SELECT * FROM tipoCarroceria WHERE tipoCarroceria = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $tipoCarroceria);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    //funcion para editar un tipo de carroceria
    public function editar_tipoCarroceria($cTipoCarroceria, $tipoCarroceria)
    {
        $conectar = parent::conexion();
        $sql = "UPDATE tipoCarroceria SET tipoCarroceria = ? WHERE cTipoCarroceria = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $tipoCarroceria);
        $sql->bindValue(2, $cTipoCarroceria);
        $sql->execute();
    }

    //funcion para eliminar un tipo de carroceria
    public function eliminar_tipoCarroceria($cTipoCarroceria)
    {
        $conectar = parent::conexion();
        $sql = "DELETE FROM tipoCarroceria WHERE cTipoCarroceria = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $cTipoCarroceria);
        $sql->execute();
    }

    //funcion para agregar un tipo de carroceria
    public function agregar_tipoCarroceria($tipoCarroceria)
    {
        $conectar = parent::conexion();
        $sql = "INSERT INTO tipoCarroceria (tipoCarroceria) VALUES (?)";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $tipoCarroceria);
        $sql->execute();
    }
}