<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace assets;

use PDO;
use PDOException;
use assets\globals\Constantes;

/**
 * Connect Aplication to Database
 *
 * @author Jesus Gutierrez <jesusdavid1004@gmail.com>
 */
class DB
{
    private $_conexion;
    
    public function __construct()
    {
    	try{
    		$this->_conexion = new PDO('mysql:host=localhost;dbname='.Constantes::DB_NAME, Constantes::DB_USERNAME, Constantes::DB_PASSWORD);
		}catch (PDOException $e){
            http_response_code(500);
		}
    }

    public function close()
    {
        $this->_conexion->close();
    }
    
    public function getConexion()
    {
        return $this->_conexion;
    }
}
