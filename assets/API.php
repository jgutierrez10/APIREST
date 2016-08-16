<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace assets;

use assets\DBManagerPersona;

use assets\globals\Alertas;
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
	            $this->savePersona();
	            break;                
	        case 'PUT'://actualiza
	            $this->updatePersona();
	            break;      
	        case 'DELETE'://elimina
	            $this->deletePersona();
	            break;
	        default://metodo NO soportado
	            echo Alertas::MSG_ROUTE_NOTFOUND;
	            break;
	    }
    }

 	private function response($code = Constantes::CODE_REQUEST_SUCCESS , $status="", $message="")
 	{
    	http_response_code($code);

    	if(!empty($status) && !empty($message))
    	{
        	$response = ["status" => $status , "message" => $message];  

        	echo json_encode($response,JSON_PRETTY_PRINT);    
    	}            
 	}

	private function getPersonas()
	{
		$arrRuta = explode('/', Funciones::cleanRoute($_SERVER['REQUEST_URI']));

		if((count($arrRuta) - 1) <= Constantes::MIN_PARAMS_GET)
		{
			$action = (!empty($arrRuta[1])) ? $arrRuta[1] : "";
			$param = (!empty($arrRuta[2])) ? $arrRuta[2] : "";

	    	if($action == Constantes::NAME_ACTION_PERSONA)
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
		}
		else
	    {	
		    $this->response(Constantes::CODE_BAD_REQUEST);
	    }
	}

	private function savePersona()
	{
		$arrRuta = explode('/', Funciones::cleanRoute($_SERVER['REQUEST_URI']));
		$action = (!empty($arrRuta[1])) ? $arrRuta[1] : "";

		if($action == Constantes::NAME_ACTION_PERSONA)
		{   
        	$persona = json_decode(file_get_contents('php://input'));   

          	if(empty($persona))
          	{
             	$this->response(Constantes::CODE_UNPROCESSABLE_ENTITY, Alertas::MSG_STATUS_ERROR, Alertas::MSG_PARAMS_EMPTY); 
         	}
         	else if(isset($persona->nombre, $persona->apellido, $persona->cedula))
         	{
             	$this->_dbManagerPersona->agregarPersona($persona->nombre, $persona->apellido, $persona->cedula);
             	$this->response(Constantes::CODE_REQUEST_SUCCESS, Alertas::MSG_STATUS_SUCCESS, Alertas::MSG_ADD_SUCCESS);                             
         	}
         	else
         	{
             	$this->response(Constantes::CODE_UNPROCESSABLE_ENTITY, Alertas::MSG_STATUS_ERROR, Alertas::MSG_PROPERTY_NOT_DEFINED);
         	}
     	} 
     	else
     	{               
	        $this->response(Constantes::CODE_BAD_REQUEST);
     	}  
	}

	private function updatePersona()
	{
		$arrRuta = explode('/', Funciones::cleanRoute($_SERVER['REQUEST_URI']));
		$action = (!empty($arrRuta[1])) ? $arrRuta[1] : "";
		$param = (!empty($arrRuta[2])) ? $arrRuta[2] : "";
		
	    if($action == Constantes::NAME_ACTION_PERSONA && !empty($param))
	    {
            $persona = json_decode(file_get_contents('php://input'));   
        
            if(empty($persona))
          	{
             	$this->response(Constantes::CODE_UNPROCESSABLE_ENTITY, Alertas::MSG_STATUS_ERROR, Alertas::MSG_PARAMS_EMPTY); 
         	}
         	else if(isset($persona->nombre, $persona->apellido, $persona->cedula))
         	{
             	$this->_dbManagerPersona->editarPersona($param, $persona->nombre, $persona->apellido, $persona->cedula);
             	$this->response(Constantes::CODE_REQUEST_SUCCESS, Alertas::MSG_STATUS_SUCCESS, Alertas::MSG_UPDATE_SUCCESS);                             
         	}
         	else
         	{
             	$this->response(Constantes::CODE_UNPROCESSABLE_ENTITY, Alertas::MSG_STATUS_ERROR, Alertas::MSG_PROPERTY_NOT_DEFINED);
         	}     
        }
	    else
	    {
	    	$this->response(Constantes::CODE_BAD_REQUEST);
	    }
	}

	private function deletePersona()
	{
		$arrRuta = explode('/', Funciones::cleanRoute($_SERVER['REQUEST_URI']));
		$action = (!empty($arrRuta[1])) ? $arrRuta[1] : "";
		$param = (!empty($arrRuta[2])) ? $arrRuta[2] : "";

		if(!empty($action) && !empty($param))
		{
            if($action == Constantes::NAME_ACTION_PERSONA)
            {                   
                $this->_dbManagerPersona->eliminarPersona($param);
                $this->response(Constantes::CODE_NOT_CONTENT, Alertas::MSG_STATUS_SUCCESS, Alertas::MSG_DELETE_SUCCESS);
            }
            else
            {
            	$this->response(Constantes::CODE_BAD_REQUEST);
            }
        }
	}
}