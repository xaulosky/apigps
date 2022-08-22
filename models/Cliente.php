<?php

class Cliente extends Conectar
{
    public function get_clientes($cTaller)
    {
        $conectar = parent::conexion();
        $sql = "SELECT c.cCliente, c.rutC, c.emailC, c.nombreC, c.apellidoC, c.direccionC, c.estadoC, co.nombreC as nombreCo FROM cliente c, comuna co WHERE c.cComuna = co.cComuna AND c.estadoC = '0' AND c.cTaller = '$cTaller'";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_cliente($id)
    {
        $conectar = parent::conexion();
        $sql = "SELECT * FROM cliente WHERE cCliente = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_cliente_por_nombre($nombre)
    {
        $conectar = parent::conexion();
        $sql = "SELECT * FROM cliente WHERE nombreC = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $nombre);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    /* get cliente for rutC */
    public function get_cliente_por_rut($rutC)
    {
        $conectar = parent::conexion();
        $sql = "SELECT * FROM cliente WHERE rutC = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $rutC);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    /* get cliente for apellidoC */
    public function get_cliente_por_apellido($apellidoC)
    {
        $conectar = parent::conexion();
        $sql = "SELECT * FROM cliente WHERE apellidoC = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $apellidoC);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    /* function add cliente resive  rutC, emailC, nombreC, apellidoC, direccionC, cComuna */
    public function add_cliente_activo($rutC, $emailC, $nombreC, $apellidoC, $direccionC, $cComuna, $cTaller)
    {
        $conectar = parent::conexion();
        $sql = "INSERT INTO cliente (rutC, emailC, nombreC, apellidoC, direccionC, estadoC, cComuna, cTaller) VALUES (?, ?, ?, ?, ?, 0, ?, ?)";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $rutC);
        $sql->bindValue(2, $emailC);
        $sql->bindValue(3, $nombreC);
        $sql->bindValue(4, $apellidoC);
        $sql->bindValue(5, $direccionC);
        $sql->bindValue(6, $cComuna);
        $sql->bindValue(7, $cTaller);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }


    /* function update_cliente resive cCliente, rutC, emailC, nombreC, apellidoC, direccionC, cComuna */
    public function update_cliente($id, $rutC, $emailC, $nombreC, $apellidoC, $direccionC, $cComuna)
    {
        $conectar = parent::conexion();
        $sql = "UPDATE cliente SET rutC = ?, emailC = ?, nombreC = ?, apellidoC = ?, direccionC = ?, cComuna = ? WHERE cCliente = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $rutC);
        $sql->bindValue(2, $emailC);
        $sql->bindValue(3, $nombreC);
        $sql->bindValue(4, $apellidoC);
        $sql->bindValue(5, $direccionC);
        $sql->bindValue(6, $cComuna);
        $sql->bindValue(7, $id);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    /* function delete_cliente resive cCliente */
    public function delete_cliente($id)
    {
        $conectar = parent::conexion();
        $sql = "UPDATE cliente SET estadoC = '1' WHERE cCliente = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    /* funcion filtrar por nombreC */
    public function filtrar_cliente_nombre($nombre)
    {
        $conectar = parent::conexion();
        $sql = "SELECT * FROM cliente WHERE nombreC LIKE '%$nombre%'";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function clientes_eliminados($cTaller)
    {
        $conectar = parent::conexion();
        $sql = "SELECT c.cCliente, c.rutC, c.emailC, c.nombreC, c.apellidoC, c.direccionC, c.estadoC, co.nombreC as nombreCo FROM cliente c, comuna co WHERE c.cComuna = co.cComuna AND c.estadoC = '1' AND c.cTaller = '$cTaller'";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function restore_cliente($id)
    {
        $conectar = parent::conexion();
        $sql = "UPDATE cliente SET estadoC = '0' WHERE cCliente = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}
