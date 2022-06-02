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

   
    public function add_trabajo($nombreTrabajo, $descripcionTrabajo, $fechaEstimadaT, $fechaRealT, $costoT, $horasT, $cOrdenTrabajo, $cTipoT, $cEmpleado, $cTipoE)
    {
        $conectar = parent::conexion();
        $sql = "INSERT INTO trabajo VALUES(null, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $nombreTrabajo);
        $sql->bindValue(2, $descripcionTrabajo);
        $sql->bindValue(3, $fechaEstimadaT);
        $sql->bindValue(4, $fechaRealT);
        $sql->bindValue(5, $costoT);
        $sql->bindValue(6, $horasT);
        $sql->bindValue(7, $cOrdenTrabajo);
        $sql->bindValue(8, $cTipoT);
        $sql->bindValue(9, $cEmpleado);
        $sql->bindValue(10, $cTipoE);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }


    public function update_trabajo($cTrabajo, $nombreTrabajo, $descripcionTrabajo, $fechaEstimadaT, $fechaRealT, $costoT, $horasT, $cOrdenTrabajo, $cTipoT, $cEmpleado, $cTipoE)
    {
        $conectar = parent::conexion();
        $sql = "UPDATE trabajo SET nombreTrabajo = ?, descripcionTrabajo = ?, fechaEstimadaT = ?, fechaRealT = ?, costoT = ?, horasT = ?, cOrdenTrabajo = ? cTipoT = ?, cEmpleado = ?, cTipoE = ?, WHERE cTrabajo = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $nombreTrabajo);
        $sql->bindValue(2, $descripcionTrabajo);
        $sql->bindValue(3, $fechaEstimadaT);
        $sql->bindValue(4, $fechaRealT);
        $sql->bindValue(5, $costoT);
        $sql->bindValue(6, $horasT);
        $sql->bindValue(7, $cOrdenTrabajo);
        $sql->bindValue(8, $cTipoT);
        $sql->bindValue(9, $cEmpleado);
        $sql->bindValue(10, $cTipoE);

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
