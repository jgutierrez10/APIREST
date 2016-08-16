<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace assets;

use assets\DBManagerPersona;

/**
 * API REST
 *
 * @author Jesus Gutierrez <jesusdavid1004@gmail.com>
 */

class API
{
	public function routeConfig()
	{
        header('Content-Type: application/JSON');                
        
        $method = $_SERVER['REQUEST_METHOD'];
        
        switch ($method) 
        {
	        case 'GET'://consulta
	            echo 'GET';
	            break;     
	        case 'POST'://inserta
	            echo 'POST';
	            break;                
	        case 'PUT'://actualiza
	            echo 'PUT';
	            break;      
	        case 'DELETE'://elimina
	            echo 'DELETE';
	            break;
	        default://metodo NO soportado
	            echo 'METODO NO SOPORTADO';
	            break;
	    }
    }	
}

