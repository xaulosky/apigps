<?php

class Empleado extends Conectar
{
    public function get_empleados()
    {
        $conectar = parent::conexion();
        $sql = "SELECT * FROM empleado";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_empleado($cEmpleado)
    {
        $conectar = parent::conexion();
        $sql = "SELECT * FROM empleado WHERE cEmpleado = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $cEmpleado);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

   
    public function crear_empleado($rutEmpleado, $nombreEmpleado, $apellidoEmpleado, $emailEmpleado, $numeroTelefonoEmpleado, $cRolE, $cTaller)
    {
        $conectar = parent::conexion();
        $sql = "INSERT INTO empleado VALUES(null, ?, ?, ?, ?, ?, ?, ?)";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $rutEmpleado);
        $sql->bindValue(2, $nombreEmpleado);
        $sql->bindValue(3, $apellidoEmpleado);
        $sql->bindValue(4, $emailEmpleado);
        $sql->bindValue(5, $numeroTelefonoEmpleado);
        $sql->bindValue(6, $cRolE);
        $sql->bindValue(7, $cTaller);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }


    public function update_empleado($rutEmpleado, $nombreEmpleado, $apellidoEmpleado, $emailEmpleado, $numeroTelefonoEmpleado, $cRolE, $cTaller, $cEmpleado)
    {
        $conectar = parent::conexion();
        $sql = "UPDATE empleado SET rutEmpleado = ?, nombreEmpleado = ?, apellidoEmpleado = ?, emailEmpleado = ?, numeroTelefonoEmpleado = ?, cRolE = ?, cTaller = ? WHERE cEmpleado = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $rutEmpleado);
        $sql->bindValue(2, $nombreEmpleado);
        $sql->bindValue(3, $apellidoEmpleado);
        $sql->bindValue(4, $emailEmpleado);
        $sql->bindValue(5, $numeroTelefonoEmpleado);
        $sql->bindValue(6, $cRolE);
        $sql->bindValue(7, $cTaller);
        $sql->bindValue(8, $cEmpleado);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    
  
    public function delete_empleado($cEmpleado)
    {
        $conectar = parent::conexion();
        $sql = "DELETE FROM empleado WHERE cEmpleado = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $cEmpleado);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

   
}