<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace assets;

use PDO;
use PDOException;
use assets\DB;
use assets\globals\Constantes;

/**
 * Manager Aplication to Database with Queries
 *
 * @author Jesus Gutierrez <jesusdavid1004@gmail.com>
 */

class DBManagerPersona extends DB
{   
    private $_tablename = 'persona';

    public function __construct()
    {
    	parent::__construct();
    }

    public function obtenerPersonas()
    {
        $sql = 'SELECT * FROM persona AS p ORDER BY p.id ASC';

        $statement = $this->getConexion()->prepare($sql);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerPersona($id = 0)
    {   
        $sql = 'SELECT * FROM persona AS p WHERE p.id = :id AND p.activo = :activo';

        $statement = $this->getConexion()->prepare($sql);
        $statement->bindValue(':id', $id);
        $statement->bindValue(':activo', Constantes::STATUS_ACTIVE);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function agregarPersona($nombre, $apellido, $cedula)
    {
        try
        {
            $sql = 'INSERT INTO persona(nombre, apellido, cedula) VALUES(:nombre, :apellido, :cedula)';
            $statement = $this->getConexion()->prepare($sql);
            $statement->bindValue(':nombre', $nombre);
            $statement->bindValue(':apellido', $apellido);
            $statement->bindValue(':cedula', $cedula);
            $statement->execute();

        }catch(PDOException $e){
            echo $sql . "<br>" . $e->getMessage();
        }
    }

    public function editarPersona($id, $nombre, $apellido, $cedula)
    {
        try
        {
            $sql = 'UPDATE persona SET nombre = :nombre, apellido = :apellido, cedula = :cedula WHERE id = :id';
            $statement = $this->getConexion()->prepare($sql);
            $statement->bindValue(':nombre', $nombre);
            $statement->bindValue(':apellido', $apellido);
            $statement->bindValue(':cedula', $cedula);
            $statement->bindValue(':id', $id);
            $statement->execute();

        }catch(PDOException $e){
            echo $sql . "<br>" . $e->getMessage();
        }
    }

    public function eliminarPersona($id)
    {
        try
        {
            $sql = 'DELETE FROM persona WHERE id = :id';
            $statement = $this->getConexion()->prepare($sql);
            $statement->bindValue(':id', $id);
            $statement->execute();
            
        }catch(PDOException $e){
            echo $sql . "<br>" . $e->getMessage();
        }
    }

    public function getTableName()
    {
        return $this->_tablename;
    }
}
