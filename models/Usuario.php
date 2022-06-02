<?php

class Usuario extends Conectar
{
    public function get_usuarios()
    {
        $conectar = parent::conexion();
        $sql = "SELECT * FROM usuario";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    public function get_usuario($id)
    {
        $conectar = parent::conexion();
        $sql = "SELECT * FROM usuarios WHERE id = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    /* crear usuario recive email clave*/
    public function crear_usuario($email, $clave)
    {
        $conectar = parent::conexion();
        $sql = "INSERT INTO usuario (email, clave) VALUES (?, MD5(?))";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $email);
        $sql->bindValue(2, $clave);
        $sql->execute();
    }

    public function update_usuario($id, $nombre, $email)
    {
        $conectar = parent::conexion();
        $sql = "UPDATE usuarios SET nombre = ?, email = ? WHERE id = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $nombre);
        $sql->bindValue(2, $email);
        $sql->bindValue(3, $id);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    /* cambiar clave */
    public function cambiar_clave($cUsuario, $clave)
    {
        $conectar = parent::conexion();
        $sql = "UPDATE usuarios SET clave = MD5(?) WHERE cUsuario = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $clave);
        $sql->bindValue(2, $cUsuario);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete_usuario($cUsuario)
    {
        $conectar = parent::conexion();
        $sql = "DELETE FROM usuarios WHERE cUsuario = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $cUsuario);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}
