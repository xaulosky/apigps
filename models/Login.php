<?php
class Login extends Conectar
{

    /* funcion para iniciar sesion con password encriptada y devuelve un la información del usuario */
    public function iniciarSesion($usuario, $password)
    {
        $password = md5($password);
        $conectar = parent::conexion();
        $sql = "SELECT cUsuario, email, cRolU, cTaller, nombreU  FROM usuario WHERE email = ? AND clave = ?";
        $stmt = $conectar->prepare($sql);
        $stmt->bindValue(1, $usuario);
        $stmt->bindValue(2, $password);
        $stmt->execute();
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($resultado) {
            return $resultado;
        } else {
            return array('msg' => 'Usuario o clave incorrecta');
        }
    }
}