<?php 
defined('BASEPATH') or exit('No se permite acceso directo'); //si la constante esta definida se ejecuta el resto del codigo, sino se detiene la ejecución y tira un mensaje

/*
Clase principal o padre de todos los controladores
*/
class controller
{
	protected $view; //se crea la variable protegida 'view', que algo esté protegido significa que solo esa clase o subclases(clases hijas) pueden usarla

	public function render($nombre_controlador = '', $params = array()) //esta función protegida sirve para mostrar y enviar datos a la vista, recibe el nombre del controlador, que en caso de que no se reciba nada sea remplazado por vacío para evitar errores, y recibe los parámetros o datos que se van a enviar a la vista, que en caso de que no se reciba nada sea reemplazado por un array vacío
	{
		$this->view = new view($nombre_controlador, $params); //creo el objeto 'view' con la clase 'view', con el nombre del controlador y los parametros para el '__construct' de la clase 'view', que es la función de cualquier clase que se ejecuta cuando se le asigna una clase a un objeto
	}
}
?>