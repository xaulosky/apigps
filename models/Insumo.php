<?php
class Insumo extends Conectar
{

    public function get_insumo($cTaller)
    {
        $conectar = parent::conexion();
        $sql = "SELECT * FROM insumo WHERE cTaller = ? AND estadoI = 1";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $cTaller);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    public function get_insumo_por_nombre($nombreInsumo)
    {
        $conectar = parent::conexion();
        $sql = "SELECT * FROM insumo WHERE nombreInsumo = ? AND cTaller = 1";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $nombreInsumo);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_insumo_por_cInsumo($cInsumo)
    {
        $conectar = parent::conexion();
        $sql = "SELECT * FROM insumo WHERE cInsumo = ? AND cTaller = 1";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $cInsumo);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function agregar_insumo($nombreInsumo, $cantidad, $costo, $cTaller)
    {
        $conectar = parent::conexion();
        $sql = "INSERT INTO insumo(nombreInsumo,cantidad,costo,estadoI,cTaller) VALUES(?, ?, ?, ?,?)";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $nombreInsumo);
        $sql->bindValue(2, $cantidad);
        $sql->bindValue(3, $costo);
        $sql->bindValue(4, 1);
        $sql->bindValue(5, $cTaller);
        $sql->execute();
    }

    public function actualizar_insumo($nombreInsumo, $cantidad, $costo, $cInsumo, $cTaller)
    {
        $conectar = parent::conexion();
        $sql = "UPDATE insumo SET nombreInsumo = ?, cantidad = ?, costo = ? WHERE cInsumo = ? AND cTaller = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $nombreInsumo);
        $sql->bindValue(2, $cantidad);
        $sql->bindValue(3, $costo);
        $sql->bindValue(4, $cInsumo);
        $sql->bindValue(5, $cTaller);
        $sql->execute();
    }

    public function update_estado_insumo($cInsumo)
    {
        $conectar = parent::conexion();
        $sql = "UPDATE insumo SET estadoI = 0 WHERE cInsumo = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $cInsumo);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete_insumo($cInsumo)
    {
        $conectar = parent::conexion();
        $sql = "DELETE FROM insumo WHERE cInsumo = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $cInsumo);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    
}
