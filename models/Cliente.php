<?php

class Cliente extends Conectar
{
    public function get_clientes()
    {
        $conectar = parent::conexion();
        $sql = "SELECT * FROM cliente";
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

    /* function add cliente resive  rutC, emailC, nombreC, apellidoC, direccionC, cComuna */
    public function add_cliente($rutC, $emailC, $nombreC, $apellidoC, $direccionC, $cComuna)
    {
        $conectar = parent::conexion();
        $sql = "INSERT INTO cliente VALUES(null, ?, ?, ?, ?, ?, ?)";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $rutC);
        $sql->bindValue(2, $emailC);
        $sql->bindValue(3, $nombreC);
        $sql->bindValue(4, $apellidoC);
        $sql->bindValue(5, $direccionC);
        $sql->bindValue(6, $cComuna);
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
