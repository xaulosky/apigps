<?php

class Usuario extends Conectar
{
    public function get_usuarios()
    {
        $conectar = parent::conexion();
        $sql = "SELECT * FROM usuario WHERE estadoU = 1";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_usuario($id)
    {
        $conectar = parent::conexion();
        $sql = "SELECT * FROM usuario WHERE cUsuario = ? ";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    public function add_usuario($email,$clave,$cRolU,$cTaller,$nombreU)
    {
        $conectar = parent::conexion();
        $sql = "INSERT INTO usuario VALUES(null,?, MD5(?) , 1 ,? ,? ,?) ";
        $sql = $conectar->prepare($sql); 
        $sql->bindValue(1, $email);
        $sql->bindValue(2, $clave);
        $sql->bindValue(3, $cRolU);
        $sql->bindValue(4, $cTaller);
        $sql->bindValue(5, $nombreU);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    public function update_usuario($nombreU,$email, $clave, $cRolU,$cUsuario)
    {
        $conectar = parent::conexion();
        $sql = "UPDATE usuario SET nombreU = ?, email = ?, clave = ?, cRolU = ? WHERE cUsuario = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $nombreU);
        $sql->bindValue(2, $email);
        $sql->bindValue(3, $clave);
        $sql->bindValue(4, $cRolU);
        $sql->bindValue(5, $cUsuario);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    public function delete_usuario($id)
    {
        $conectar = parent::conexion();
        $sql = "UPDATE usuario SET estadoU = 0 WHERE cUsuario = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}
