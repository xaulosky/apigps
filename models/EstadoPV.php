<?php
/* cTALLER ARREGLAR PARA OTROS TALLERES. */
class EstadoPV extends Conectar
{
    public function getEstadosPV($cFicha)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "select e.cFicha, e.estado, p.cParteV, p.nombrePV from estadoPV e, partesVehiculo p WHERE cFicha = :cFicha AND p.cParteV = e.cParteV";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(":cFicha", $cFicha);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addEstadoPV($cFicha, $cParteV, $estado)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "insert into estadoPV values(?,?,?)";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $cParteV);
        $sql->bindValue(2, $cFicha);
        $sql->bindValue(3, $estado);
        $sql->execute();
    }
}
