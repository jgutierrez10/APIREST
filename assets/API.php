<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace assets;

use assets\DBManagerPersona;

use assets\globals\Constantes;
use assets\globals\Funciones;

/**
 * API REST
 *
 * @author Jesus Gutierrez <jesusdavid1004@gmail.com>
 */

class API
{
	private $_dbManagerPersona;

	public function __construct()
	{
		$this->_dbManagerPersona = new DBManagerPersona();
	}

	public function routeConfig()
	{
        header('Content-Type: application/JSON');                
        
        $method = $_SERVER['REQUEST_METHOD'];
        
        switch ($method) 
        {
	        case 'GET'://consulta
	            $this->getPersonas();
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

 	private function response($code=200, $status="", $message="")
 	{
    	http_response_code($code);

    	if(!empty($status) && !empty($message))
    	{
        	$response = ["status" => $status , "message"=>$message];  

        	echo json_encode($response,JSON_PRETTY_PRINT);    
    	}            
 	}

	private function getPersonas()
	{
		$arrRuta = explode('/', Funciones::cleanRoute($_SERVER['REQUEST_URI']));
		$action = (!empty($arrRuta[1])) ? $arrRuta[1] : "";
		$param = (!empty($arrRuta[2])) ? $arrRuta[2] : "";

	    if($action == 'personas')
	    {               
	        if(!empty($param))
	        {
	            $response = $this->_dbManagerPersona->obtenerPersona($param);                
	        }
	        else
	        {     
	        	$response = $this->_dbManagerPersona->obtenerPersonas();                
	        }

	        echo json_encode($response,JSON_PRETTY_PRINT);
	    }
	    else
	    {
	    	$this->response(Constantes::CODE_BAD_REQUEST);
	    }
	}  
}