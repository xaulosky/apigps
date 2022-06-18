<?php
class Login extends Conectar
{

    /* funcion para iniciar sesion con password encriptada y devuelve un la información del usuario */
    public function iniciarSesion($usuario, $password)
    {
        $password = md5($password);
        $conectar = parent::conexion();
        $sql = "SELECT u.cUsuario, u.email, u.cRolU, u.cTaller, u.nombreU, u.cRolU, r.nombreRolU, t.nombreTaller FROM usuario u, rolUsuario r, taller t WHERE u.email = ? AND u.clave = ? AND u.cRolU = r.cRolU AND u.cTaller = t.cTaller AND u.estadoU = '1'";
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
