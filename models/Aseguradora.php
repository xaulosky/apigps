<?php

class Aseguradora extends Conectar
{
    public function get_aseguradoras()
    {
        $conectar = parent::conexion();
        $sql = "SELECT * FROM aseguradora ORDER BY cAseguradora DESC";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    //Función para obtener una aseguradora por su id
    public function get_aseguradora($cAseguradora)
    {
        $conectar = parent::conexion();
        $sql = "SELECT * FROM aseguradora WHERE cAseguradora = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, limpiaInput($cAseguradora));
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    //Función para obtener una aseguradora por su nombre
    public function get_aseguradora_por_nombre($nombreAseguradora)
    {
        $conectar = parent::conexion();
        $sql = "SELECT * FROM aseguradora WHERE nombreAseguradora = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $nombreAseguradora);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    //Función para obtener una aseguradora por su tipo
    public function get_aseguradora_por_tipo($tipoSeguro)
    {
        $conectar = parent::conexion();
        $sql = "SELECT * FROM aseguradora WHERE tipoSeguro = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $tipoSeguro);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    //funcion para añadir una aseguradora a la base de datos
    public function add_aseguradora($nombreAseguradora, $tipoSeguro)
    {
        $conectar = parent::conexion();
        $sql = "INSERT INTO aseguradora (nombreAseguradora, tipoSeguro) VALUES (?, ?)";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $nombreAseguradora);
        $sql->bindValue(2, $tipoSeguro);
        $sql->execute();
    }

    //funcion para eliminar una aseguradora de la base de datos
    public function delete_aseguradora($cAseguradora)
    {
        $conectar = parent::conexion();
        $sql = "DELETE FROM aseguradora WHERE cAseguradora = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $cAseguradora);
        $sql->execute();
    }

    //funcion para actualizar una aseguradora de la base de datos
    public function update_aseguradora($cAseguradora, $nombreAseguradora, $tipoSeguro)
    {
        $conectar = parent::conexion();
        $sql = "UPDATE aseguradora SET nombreAseguradora = ?, tipoSeguro = ? WHERE cAseguradora = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $nombreAseguradora);
        $sql->bindValue(2, $tipoSeguro);
        $sql->bindValue(3, $cAseguradora);
        $sql->execute();
    }
}