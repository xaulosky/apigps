<?php

class Taller extends Conectar
{
    public function get_talleres()
    {
        $conectar = parent::conexion();
        $sql = "SELECT * FROM taller ORDER BY cTaller DESC";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    //Función para obtener un taller por su id
    public function get_taller($cTaller)
    {
        $conectar = parent::conexion();
        $sql = "SELECT * FROM taller WHERE cTaller = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, limpiaInput($cTaller));
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    //Función para obtener un taller por su rutTaller
    public function get_taller_por_rutTaller($rutTaller)
    {
        $conectar = parent::conexion();
        $sql = "SELECT * FROM taller WHERE rutTaller = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $rutTaller);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    //Función para obtener un taller por su nombre
    public function get_taller_por_nombre($nombreTaller)
    {
        $conectar = parent::conexion();
        $sql = "SELECT * FROM taller WHERE nombreTaller = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $nombreTaller);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    //Función para obtener un taller por su dirección
    public function get_taller_por_direccion($direccionTaller)
    {
        $conectar = parent::conexion();
        $sql = "SELECT * FROM taller WHERE direccionTaller = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $direccionTaller);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    //Función para obtener un taller por su nombreDueñoTaller
    public function get_taller_por_nombreDueñoTaller($nombreDueñoTaller)
    {
        $conectar = parent::conexion();
        $sql = "SELECT * FROM taller WHERE nombreDueñoTaller = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $nombreDueñoTaller);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }   
    //Función para obtener un taller por su apellidoPDueñoTaller
    public function get_taller_por_apellidoPDueñoTaller($apellidoPDueñoTaller)
    {
        $conectar = parent::conexion();
        $sql = "SELECT * FROM taller WHERE apellidoPDueñoTaller = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $apellidoPDueñoTaller);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    //Función para obtener un taller por su apellidoMDueñoTaller
    public function get_taller_por_apellidoMDueñoTaller($apellidoMDueñoTaller)
    {
        $conectar = parent::conexion();
        $sql = "SELECT * FROM taller WHERE apellidoMDueñoTaller = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $apellidoMDueñoTaller);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    //Función para obtener un taller por su rutDueñoTaller
    public function get_taller_por_rutDueñoTaller($rutDueñoTaller)
    {
        $conectar = parent::conexion();
        $sql = "SELECT * FROM taller WHERE rutDueñoTaller = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $rutDueñoTaller);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    //función para obtener un taller por su emailTaller
    public function get_taller_por_emailTaller($emailTaller)
    {
        $conectar = parent::conexion();
        $sql = "SELECT * FROM taller WHERE emailTaller = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $emailTaller);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    //función para obtener un taller por su numeroTelefonoTaller
    public function get_taller_por_numeroTelefonoTaller($numeroTelefonoTaller)
    {
        $conectar = parent::conexion();
        $sql = "SELECT * FROM taller WHERE numeroTelefonoTaller = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $numeroTelefonoTaller);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    //función para obtener un taller por su cComuna
    public function get_taller_por_cComuna($cComuna)
    {
        $conectar = parent::conexion();
        $sql = "SELECT * FROM taller WHERE cComuna = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, limpiaInput($cComuna));
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    //función para agregar un taller a la base de datos
    public function agregar_taller($rutTaller, $nombreTaller, $direccionTaller, $nombreDueñoTaller, $apellidoPDueñoTaller, $apellidoMDueñoTaller, $rutDueñoTaller, $emailTaller, $numeroTelefonoTaller, $cComuna)
    {
        $conectar = parent::conexion();
        $sql = "INSERT INTO taller VALUES(null, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $rutTaller);
        $sql->bindValue(2, $nombreTaller);
        $sql->bindValue(3, $direccionTaller);
        $sql->bindValue(4, $nombreDueñoTaller);
        $sql->bindValue(5, $apellidoPDueñoTaller);
        $sql->bindValue(6, $apellidoMDueñoTaller);
        $sql->bindValue(7, $rutDueñoTaller);
        $sql->bindValue(8, $emailTaller);
        $sql->bindValue(9, $numeroTelefonoTaller);
        $sql->bindValue(10, limpiaInput($cComuna));
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    //función para actualizar un taller de la base de datos
    public function actualizar_taller($cTaller, $rutTaller, $nombreTaller, $direccionTaller, $nombreDueñoTaller, $apellidoPDueñoTaller, $apellidoMDueñoTaller, $rutDueñoTaller, $emailTaller, $numeroTelefonoTaller, $cComuna)
    {
        $conectar = parent::conexion();
        $sql = "UPDATE taller SET rutTaller = ?, nombreTaller = ?, direccionTaller = ?, nombreDueñoTaller = ?, apellidoPDueñoTaller = ?, apellidoMDueñoTaller = ?, rutDueñoTaller = ?, emailTaller = ?, numeroTelefonoTaller = ?, cComuna = ? WHERE cTaller = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $rutTaller);
        $sql->bindValue(2, $nombreTaller);
        $sql->bindValue(3, $direccionTaller);
        $sql->bindValue(4, $nombreDueñoTaller);
        $sql->bindValue(5, $apellidoPDueñoTaller);
        $sql->bindValue(6, $apellidoMDueñoTaller);
        $sql->bindValue(7, $rutDueñoTaller);
        $sql->bindValue(8, $emailTaller);
        $sql->bindValue(9, $numeroTelefonoTaller);
        $sql->bindValue(10, limpiaInput($cComuna));
        $sql->bindValue(11, $cTaller);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    //función para eliminar un taller de la base de datos
    public function eliminar_taller($cTaller)
    {
        $conectar = parent::conexion();
        $sql = "DELETE FROM taller WHERE cTaller = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $cTaller);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}
