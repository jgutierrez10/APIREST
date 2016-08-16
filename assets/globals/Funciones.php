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
final class Funciones
{	
	/**
	 * Limpiar Ruta y eliminar caracteres redundantes
	 * 
	 * @param  string $route
	 * @return string
	 */
	public static function cleanRoute($route)
	{
		return trim(filter_var($route, FILTER_SANITIZE_URL), '/');
	}
}
