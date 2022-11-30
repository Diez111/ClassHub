<?php
defined('BASEPATH') or exit('No se permite acceso directo'); //si la constante esta definida se ejecuta el resto del codigo, sino se detiene la ejecución y tira un mensaje

class recuperar_contracontroller extends controller //Crea la clase "recuperar_contracontroller" con herencia de la clase "controller"
{
	public function exec() //función que se encarga de obtener los datos para la vista y mostrarla
	{
		$this->render(__CLASS__); //función heredada que permite mostrar la vista
	}
}
?>