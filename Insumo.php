<?php
/* cTALLER ARREGLAR PARA OTROS TALLERES. */
class Insumo extends Conectar
{

    public function get_insumo()
    {
        $conectar = parent::conexion();
        $sql = "SELECT * FROM insumo WHERE cTaller = 1 AND estado = 'activo'";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    /* Funcion obtener insumo por nombre */
    public function get_insumo_por_nombre($nombreInsumo)
    {
        $conectar = parent::conexion();
        $sql = "SELECT * FROM insumo WHERE nombreInsumo = ? AND cTaller = 1";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $nombreInsumo);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    /* funcion obtener insumo por cInsumo */
    public function get_insumo_por_cInsumo($cInsumo)
    {
        $conectar = parent::conexion();
        $sql = "SELECT * FROM insumo WHERE cInsumo = ? AND cTaller = 1";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $cInsumo);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    /* Funcion agregar insumo recive nombreInsumo, cantidad, costo, cTaller=1*/
    public function agregar_insumo($nombreInsumo, $cantidad, $costo, $estado)
    {
        $conectar = parent::conexion();
        $sql = "INSERT INTO insumo VALUES(null, ?, ?, ?, ?,?)";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $nombreInsumo);
        $sql->bindValue(2, $cantidad);
        $sql->bindValue(3, $costo);
        $sql->bindValue(4, $estado);
        $sql->bindValue(5, 1);
        $sql->execute();
    }

    /* Actualizar insumo recive nombreInsumo, cantidad, costo, cTaller=1 */
    public function actualizar_insumo($nombreInsumo, $cantidad, $costo, $cInsumo)
    {
        $conectar = parent::conexion();
        $sql = "UPDATE insumo SET nombreInsumo = ?, cantidad = ?, costo = ? WHERE cInsumo = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $nombreInsumo);
        $sql->bindValue(2, $cantidad);
        $sql->bindValue(3, $costo);
        $sql->bindValue(4, $cInsumo);
        $sql->execute();
    }
    /* update eliminar insumo*/

    public function update_estado_insumo( $estado, $cInsumo)
    {
        $conectar = parent::conexion();
        $sql = "UPDATE insumo SET estado = ? WHERE cInsumo = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $estado);
        $sql->bindValue(2, $cInsumo);
        $sql->execute();
    }

    /* Eliminar insumo recive cInsumo */
    public function delete_insumo($id)
    {
        $conectar = parent::conexion();
        $sql = "DELETE FROM insumo WHERE cInsumo = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}
