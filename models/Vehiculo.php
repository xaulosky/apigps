<?php

class Vehiculo extends Conectar
{
    public function get_vehiculos()
    {
        $conectar = parent::conexion();
        $sql = "SELECT v.cVehiculo, v.patenteV, v.modeloV, v.colorV, v.estadoV, c.cCliente, c.rutC, c.nombreC FROM vehiculo v, cliente c WHERE v.cCliente = c.cCliente";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    //Función para obtener un vehiculo por su id
    public function get_vehiculo($cVehiculo)
    {
        $conectar = parent::conexion();
        $sql = "SELECT * FROM vehiculo WHERE cVehiculo = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, limpiaInput($cVehiculo));
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    //Función para obtener un vehiculo por su patente
    public function get_vehiculo_por_patente($patenteV)
    {
        $conectar = parent::conexion();
        $sql = "SELECT * FROM vehiculo WHERE patenteV = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $patenteV);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    //Función para obtener un vehiculo por su modelo
    public function get_vehiculo_por_modelo($modeloV)
    {
        $conectar = parent::conexion();
        $sql = "SELECT * FROM vehiculo WHERE modeloV = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $modeloV);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    //Función para obtener un vehiculo por su color
    public function get_vehiculo_por_color($colorV)
    {
        $conectar = parent::conexion();
        $sql = "SELECT * FROM vehiculo WHERE colorV = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $colorV);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    //Función para obtener un vehiculo por su estado
    public function get_vehiculo_por_estado($estadoV)
    {
        $conectar = parent::conexion();
        $sql = "SELECT * FROM vehiculo WHERE estadoV = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $estadoV);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    //Función para obtener un vehiculo por su estado de revisión técnica
    public function get_vehiculo_por_estadoRevision($estadoRevisionTecnicaV)
    {
        $conectar = parent::conexion();
        $sql = "SELECT * FROM vehiculo WHERE estadoRevisionTecnicaV = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $estadoRevisionTecnicaV);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    //función para obtener un vehiculo por su monto de aseguradora
    public function get_vehiculo_por_montoAseguradora($montoAsegurdora)
    {
        $conectar = parent::conexion();
        $sql = "SELECT * FROM vehiculo WHERE montoAseguradora = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $montoAsegurdora);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    //función para obtener un vehiculo por su id de aseguradora
    public function get_vehiculo_por_cAseguradora($cAseguradora)
    {
        $conectar = parent::conexion();
        $sql = "SELECT * FROM vehiculo WHERE cAseguradora = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $cAseguradora);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    //función para obtener un vehiculo por su tipo de carrocería
    public function get_vehiculo_por_TipoCarroceria($tipoCarroceria)
    {
        $conectar = parent::conexion();
        $sql = "SELECT * FROM tipoCarroceria WHERE tipoCarroceria = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $tipoCarroceria);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    //función para obtener un vehiculo por su id de cliente
    public function get_vehiculo_por_cCliente($cCliente)
    {
        $conectar = parent::conexion();
        $sql = "SELECT * FROM vehiculo WHERE cCliente = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $cCliente);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    //función para añadir vehiculos a la BDD
    public function añadir_vehiculo($patenteV, $modeloV, $colorV, $estadoV, $estadoRevisionTecnicaV, $montoAsegurdora, $cAseguradora, $cTipoCarroceria, $cCliente)
    {
        $conectar = parent::conexion();
        $sql = "INSERT INTO vehiculo (patenteV, modeloV, colorV, estadoV, estadoRevisionTecnicaV, montoAseguradora, cAseguradora, cTipoCarroceria, cCliente) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $patenteV);
        $sql->bindValue(2, $modeloV);
        $sql->bindValue(3, $colorV);
        $sql->bindValue(4, $estadoV);
        $sql->bindValue(5, $estadoRevisionTecnicaV);
        $sql->bindValue(6, $montoAsegurdora);
        $sql->bindValue(7, $cAseguradora);
        $sql->bindValue(8, $cTipoCarroceria);
        $sql->bindValue(9, $cCliente);
        $sql->execute();
    }

    //funcion para eliminar un vehiculo de la BDD
    public function eliminar_vehiculo($cVehiculo)
    {
        $conectar = parent::conexion();
        $sql = "DELETE FROM vehiculo WHERE cVehiculo = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $cVehiculo);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    //funcion para actualizar un vehiculo de la BDD 
    public function actualizar_vehiculo($cVehiculo, $patenteV, $modeloV, $colorV, $estadoV, $estadoRevisionTecnicaV, $montoAsegurdora)
    {
        $conectar = parent::conexion();
        $sql = "UPDATE vehiculo SET patenteV = ?, modeloV = ?, colorV = ?, estadoV = ?, estadoRevisionTecnicaV = ?, montoAseguradora = ? WHERE cVehiculo = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $patenteV);
        $sql->bindValue(2, $modeloV);
        $sql->bindValue(3, $colorV);
        $sql->bindValue(4, $estadoV);
        $sql->bindValue(5, $estadoRevisionTecnicaV);
        $sql->bindValue(6, $montoAsegurdora);
        $sql->bindValue(7, $cVehiculo);
        $sql->execute();
    }
}
