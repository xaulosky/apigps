<?php

class Trabajo extends Conectar
{
    public function get_trabajos()
    {
        $conectar = parent::conexion();
        $sql = "SELECT * FROM trabajo";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_trabajo($cTrabajo)
    {
        $conectar = parent::conexion();
        $sql = "SELECT * FROM trabajo WHERE cTrabajo = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $cTrabajo);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

   
    public function crear_trabajo($nombreTrabajo, $descripcionTrabajo, $fechaEstimadaT, $fechaRealT, $estadoT, $costoT, $horasT, $cOrdenTrabajo, $cTipoT, $cEmpleado)
    {
        $conectar = parent::conexion();
        $sql = "INSERT INTO trabajo VALUES(null, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $nombreTrabajo);
        $sql->bindValue(2, $descripcionTrabajo);
        $sql->bindValue(3, $fechaEstimadaT);
        $sql->bindValue(4, $fechaRealT);
        $sql->bindValue(5, $estadoT);
        $sql->bindValue(6, $costoT);
        $sql->bindValue(7, $horasT);
        $sql->bindValue(8, $cOrdenTrabajo);
        $sql->bindValue(9, $cTipoT);
        $sql->bindValue(10, $cEmpleado);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }


    public function update_trabajo($cTrabajo, $nombreTrabajo, $descripcionTrabajo, $fechaEstimadaT, $fechaRealT, $estadoT, $costoT, $horasT, $cOrdenTrabajo, $cTipoT, $cEmpleado)
    {
        $conectar = parent::conexion();
        $sql = "UPDATE trabajo SET nombreTrabajo = ?, descripcionTrabajo = ?, fechaEstimadaT = ?, fechaRealT = ?, estadoT = ?, costoT = ?, horasT = ?, cOrdenTrabajo = ? cTipoT = ?, cEmpleado = ? WHERE cTrabajo = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $nombreTrabajo);
        $sql->bindValue(2, $descripcionTrabajo);
        $sql->bindValue(3, $fechaEstimadaT);
        $sql->bindValue(4, $fechaRealT);
        $sql->bindValue(5, $estadoT);
        $sql->bindValue(6, $costoT);
        $sql->bindValue(7, $horasT);
        $sql->bindValue(8, $cOrdenTrabajo);
        $sql->bindValue(9, $cTipoT);
        $sql->bindValue(10, $cEmpleado);

        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    
  
    public function delete_trabajo($cTrabajo)
    {
        $conectar = parent::conexion();
        $sql = "DELETE FROM trabajo WHERE cTrabajo = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $cTrabajo);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

   
}
