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
     * General
     */
    const STATUS_ACTIVE = 1;

    /**
     * Rutas
     */
    const MIN_PARAMS_GET = 2;

	/**
	 * Servicios
	 */
	const NAME_ACTION_PERSONA = "personas";

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
    const CODE_REQUEST_SUCCESS = 200;
    const CODE_NOT_CONTENT = 204;
    const CODE_BAD_REQUEST = 400;
    const CODE_UNPROCESSABLE_ENTITY = 422;
    const CODE_INTERNAL_SERVER_ERROR = 500;
}
