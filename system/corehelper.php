<?php 
defined('BASEPATH') or exit('No se permite acceso directo'); //si la constante esta definida se ejecuta el resto del codigo, sino se detiene la ejecución y tira un mensaje

/*
Clase para verificar controladores y métodos de controladores
*/
class corehelper
{
	public function validarControlador($controlador) //función que verifica la existencia de un controlador, recibe el nombre del controlador
	{
		if (!is_file(PATH_CONTROLLERS . "{$controlador}/{$controlador}controller.php")) { //utiliza un función de php para ver si existe un archivo
			return false; //si no existe, retorna 'false'
		}
		return true; //si existe, retorna 'true'
	}

	public function validarMetodo($controlador, $metodo) //función que verifica la existencia del método de un controlador, recibe el nombre del controlador y el del método
	{
		if (!method_exists($controlador, $metodo)) { //utiliza un función de php para ver si existe un método dentro de una clase(el controlador)
			return false; //si no existe, retorna 'false'
		}
		return true; //si existe, retorna 'true'
	}
}

?>