<?php 
defined('BASEPATH') or exit('No se permite acceso directo');

class corehelper
{
	
	public static function validarControlador($controlador)
	{
		if (!is_file(PATH_CONTROLLERS . "{$controlador}/{$controlador}controller.php")) {
			return false;
		}
		return true;
	}

	public static function validarMetodo($controlador, $metodo)
	{
		if (!method_exists($controlador, $metodo)) {
			return false;
		}
		return true;
	}
}

?>