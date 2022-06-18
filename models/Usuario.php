<?php

class Usuario extends Conectar
{
    public function get_usuarios()
    {
        $conectar = parent::conexion();
<<<<<<< HEAD
        $sql = "SELECT * FROM usuario WHERE estadoU = 1";
=======
        $sql = "SELECT * FROM usuario";
>>>>>>> 66cee6aeec0fe0b019774aef3bdded5661394eb2
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
<<<<<<< HEAD
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
=======
    /* crear usuario recive email clave*/
    public function crear_usuario($email, $clave)
    {
        $conectar = parent::conexion();
        $sql = "INSERT INTO usuario (email, clave) VALUES (?, MD5(?))";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $email);
        $sql->bindValue(2, $clave);
>>>>>>> 66cee6aeec0fe0b019774aef3bdded5661394eb2
        $sql->execute();
    }
<<<<<<< HEAD
    public function update_usuario($nombreU,$email, $clave, $cRolU,$cUsuario)
=======

    public function update_usuario($id, $nombre, $email)
>>>>>>> 66cee6aeec0fe0b019774aef3bdded5661394eb2
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
    /* cambiar clave */
    public function cambiar_clave($cUsuario, $clave)
    {
        $conectar = parent::conexion();
<<<<<<< HEAD
        $sql = "UPDATE usuario SET estadoU = 0 WHERE cUsuario = ?";
=======
        $sql = "UPDATE usuarios SET clave = MD5(?) WHERE cUsuario = ?";
>>>>>>> 66cee6aeec0fe0b019774aef3bdded5661394eb2
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
