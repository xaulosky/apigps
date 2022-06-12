<?php

class Cliente extends Conectar
{
    public function get_clientes()
    {
        $conectar = parent::conexion();
        $sql = "SELECT c.cCliente, c.rutC, c.emailC, c.nombreC, c.apellidoC, c.direccionC, c.estadoC, co.nombreC as nombreCo FROM cliente c, comuna co WHERE c.cComuna = co.cComuna";
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
    public function add_cliente($rutC, $emailC, $nombreC, $apellidoC, $direccionC, $estadoC, $cComuna)
    {
        $conectar = parent::conexion();
        $sql = "INSERT INTO cliente (rutC, emailC, nombreC, apellidoC, direccionC, estadoC, cComuna) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $rutC);
        $sql->bindValue(2, $emailC);
        $sql->bindValue(3, $nombreC);
        $sql->bindValue(4, $apellidoC);
        $sql->bindValue(5, $direccionC);
        $sql->bindValue(6, $estadoC);
        $sql->bindValue(7, $cComuna);
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
        $sql = "DELETE FROM cliente WHERE cCliente = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}
