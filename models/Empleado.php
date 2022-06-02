<?php

class Empleado extends Conectar
{
    public function get_empleados()
    {
        $conectar = parent::conexion();
        $sql = "SELECT cEmpleado FROM empleado";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_empleado($id)
    {
        $conectar = parent::conexion();
        $sql = "SELECT * FROM empleado WHERE cEmpleado = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}