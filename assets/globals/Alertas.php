<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace assets\globals;

/**
 *
 * @author Jesus Gutierrez <jesusdavid1004@gmail.com>
 */
final class Alertas
{	
	/**
	 * Estados Respuestas HTTP
	 */
	const MSG_STATUS_SUCCESS = 'success';
	const MSG_STATUS_ERROR = 'error';

	/**
	 * Codigos HTTP
	 */
	const MSG_CODE_INTERNAL_SERVER_ERROR = 'Se ha producido un error interno.';
    const MSG_CODE_UNPROCESSABLE_ENTITY = 'Entidad no procesable.';
    const MSG_CODE_BAD_REQUEST = 'La solicitud contiene sintaxis errónea.';
    const MSG_CODE_NOT_CONTENT = 'La petición se ha completado con éxito pero su respuesta no tiene ningún contenido';    
	
	/**
	 * Alertas
	 */
	const MSG_ROUTE_NOTFOUND = 'Ruta no encontrada. Intente de nuevo.';
	const MSG_PARAMS_EMPTY = 'Parametros sin valores.';
	const MSG_PROPERTY_NOT_DEFINED = 'La propiedad no está definida.';

	const MSG_ADD_SUCCESS = 'Nuevo registro almacenado correctamente.';
	const MSG_UPDATE_SUCCESS = 'Registro actualizado correctamente.';
	const MSG_DELETE_SUCCESS = 'Registro eliminado correctamente.';
}
