<?php 

class Insumo extends Conectar{

    public function get_insumo(){
        $conectar = parent::conexion();
        $sql = "SELECT * FROM insumo WHERE cTaller = 1";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    /* Funcion obtener insumo por nombre */
    public function get_insumo_por_nombre($nombreInsumo){
        $conectar = parent::conexion();
        $sql = "SELECT * FROM insumo WHERE nombreInsumo = ? AND cTaller = 1";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $nombreInsumo);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    /* funcion obtener insumo por cInsumo */
    public function get_insumo_por_cInsumo($cInsumo){
        $conectar = parent::conexion();
        $sql = "SELECT * FROM insumo WHERE cInsumo = ? AND cTaller = 1";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $cInsumo);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }


}