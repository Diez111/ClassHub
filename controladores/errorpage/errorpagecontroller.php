<?php
defined('BASEPATH') or exit('No se permite acceso directo'); //si la constante esta definida se ejecuta el resto del codigo, sino se detiene la ejecución y tira un mensaje

class errorpagecontroller extends controller  //Crea la clase "errorpagecontroller" con herencia de la clase "controller"
{
	public function exec() //función que se encarga de mostrar la vista
	{
		$this->render(__CLASS__); //función que busca y muestra la vista correspondiente
	}
}
?>