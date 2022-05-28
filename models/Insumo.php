<?php 

class Insumo extends Conectar{

    public function get_insumo_Disponible(){
        $conectar = parent::conexion();
        $sql = "SELECT * FROM insumoDisponible";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    /* Funcion obtener insumoNoDisponible */
    public function get_insumo_NoDisponible(){
        $conectar = parent::conexion();
        $sql = "SELECT * FROM insumoNoDisponible";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    /* funcion obtener insumo por cInsumo */
    public function get_insumo_por_cInsumo($cInsumo){
        $conectar = parent::conexion();
        $sql = "SELECT * FROM insumo WHERE cInsumo = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $cInsumo);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    /* Funcion obtener insumo por nombre */
    public function get_insumo_por_nombre($nombreInsumo){
        $conectar = parent::conexion();
        $sql = "SELECT * FROM insumo WHERE nombreInsumo = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $nombreInsumo);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}