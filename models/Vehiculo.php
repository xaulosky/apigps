<?php

class Vehiculo extends Conectar
{
    public function get_vehiculos($cTaller)
    {
        $conectar = parent::conexion();
        $sql = "SELECT * FROM vehiculo v, tipoCarroceria tc, taller t, cliente c WHERE t.cTaller=? AND v.cTipoCarroceria = tc.cTipoCarroceria AND v.cTaller = t.cTaller AND v.cCliente = c.cCliente";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $cTaller);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    //Función para obtener un vehiculo por su id
    public function get_vehiculo($cVehiculo)
    {
        $conectar = parent::conexion();
        $sql = "SELECT * FROM vehiculo  WHERE cVehiculo = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $cVehiculo);
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
        $sql = "SELECT * FROM vehiculov WHERE modeloV = ?";
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
    public function get_vehiculo_por_TipoCarroceria($cTipoCarroceria)
    {
        $conectar = parent::conexion();
        $sql = "SELECT * FROM tipoCarroceria WHERE cTipoCarroceria = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $cTipoCarroceria);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    //función para obtener un vehiculo por su id de cliente
    public function get_vehiculo_por_cCliente($cCliente)
    {
        $conectar = parent::conexion();
        $sql = "SELECT * FROM vehiculo v, cliente c, taller t WHERE c.cCliente = ? AND v.cCliente=c.cCliente AND v.cTaller=t.cTaller";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $cCliente);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_Cliente($cTaller)
    {
        $conectar = parent::conexion();
        $sql = "SELECT * FROM vehiculo v, cliente c, taller t WHERE c.cTaller = ? AND v.cCliente=c.cCliente AND v.cTaller=t.cTaller";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $cTaller);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    //función para obtener un vehiculo por su id de taller
    public function get_vehiculo_por_cTaller($cTaller)
    {
        $conectar = parent::conexion();
        $sql = "SELECT * FROM vehiculo WHERE cTaller = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $cTaller);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    //función para añadir vehiculos a la BDD
    public function añadir_vehiculo($patenteV, $modeloV, $colorV, $estadoV, $estadoRevisionTecnicaV, $montoAsegurdora, $cCliente, $cAseguradora, $cTipoCarroceria, $cTaller)
    {
        $conectar = parent::conexion();
        $sql = "INSERT INTO vehiculo (patenteV, modeloV, colorV, estadoV, estadoRevisionTecnicaV, montoAseguradora, cAseguradora, cTipoCarroceria, cCliente, cTaller) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
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
        $sql->bindValue(10, $cTaller);
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
