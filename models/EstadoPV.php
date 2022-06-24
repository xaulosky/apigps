<?php
/* cTALLER ARREGLAR PARA OTROS TALLERES. */
class EstadoPV extends Conectar
{
    public function getEstadosPV()
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "select * from estadoPV";
        $sql = $conectar->prepare($sql);
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
