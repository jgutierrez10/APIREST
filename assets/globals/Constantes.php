<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace assets\globals;

/**
 * Description of Constantes
 *
 * @author Jesus Gutierrez <jesusdavid1004@gmail.com>
 */
final class Constantes 
{	
	/**
	 * Registros 
	 */
	const STATUS_ACTIVE = 1;

	/**	
	 * Parametros DB
	 */
    const DB_ADMIN = 'mysql';
    const DB_SERVER = 'localhost';
    const DB_NAME = 'dbtest';
    const DB_USERNAME = 'root';
    const DB_PASSWORD = 'admin';

    /**
     * Codigos HTTP
     */
    const CODE_INTERNAL_SERVER_ERROR = 500;
    const CODE_UNPROCESSABLE_ENTITY = 422;
    const CODE_BAD_REQUEST = 400;
    const CODE_NOT_CONTENT = 204;

    /**
     * Mensajes Codigos HTTP
     */
    const MSG_CODE_INTERNAL_SERVER_ERROR = 'Se ha producido un error interno.';
    const MSG_CODE_UNPROCESSABLE_ENTITY = 'Entidad no procesable.';
    const MSG_CODE_BAD_REQUEST = 'La solicitud contiene sintaxis errónea.';
    const MSG_CODE_NOT_CONTENT = 'La petición se ha completado con éxito pero su respuesta no tiene ningún contenido';    
}
