<?php
    class HistorialInsumo extends Conectar
    {
        public function get_historialInsumo($cInsumo)
        {
            $conectar = parent::conexion();
            $sql = "SELECT * FROM historialInsumo WHERE cInsumo=? ORDER BY fechaHistorialInsumo DESC";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $cInsumo);
            $sql->execute();
            return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        }

    }