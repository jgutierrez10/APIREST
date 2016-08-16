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

/**
 * Manager Aplication to Database with Queries
 *
 * @author Jesus Gutierrez <jesusdavid1004@gmail.com>
 */

class DBManager extends DB
{    
    public function __construct()
    {
    	parent::__construct();
    }

    public function getPersonas()
    {
        $sql = 'SELECT * FROM persona AS p ORDER BY p.id ASC';

        $result = $this->getConexion()->query($sql)->fetch(PDO::FETCH_ASSOC);

        if(!empty($result)){
            return $result;
        }

        return false;
    }
}
