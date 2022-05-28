<?php

class Conectar
{
    protected $db;

    protected function Conexion()
    {
        try {
            $conectar = $this->db = new PDO('mysql:host=mysql.face.ubiobio.cl;dbname=G9proyecto_bd', 'G9proyecto', 'G9proyecto1069');
            return $conectar;
        } catch (Exception $e) {
            print "Error: " . $e->getMessage() . "<br>";
            die();
        }
    }

    public function set_names()
    {
        return $this->db->query("SET NAMES 'utf8'");
    }
}
