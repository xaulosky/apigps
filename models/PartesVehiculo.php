<?php
class PartesVehiculo extends Conectar
{
    /* get partes */
    public function get_partes_vehiculos()
    {
        $conectar = parent::conexion();
        $sql = "SELECT * FROM partesVehiculo";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    
}
