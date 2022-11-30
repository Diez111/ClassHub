<?php 
defined('BASEPATH') or exit('No se permite acceso directo'); //si la constante esta definida se ejecuta el resto del codigo, sino se detiene la ejecución y tira un mensaje

/*
Clase para separar en partes la URL
*/
class router
{
	protected $uri; //declaro la variable 'uri'
	protected $controller; //declaro la variable 'controller'
	protected $method; //declaro la variable 'method'
	protected $param; //declaro la variable 'param'

	public function __construct() //función que se ejecuta al asignarle la clase a un objeto
	{
		$this->setUri(); //se ejecuta la función 'setUri' propia de la clase
		$this->setController(); //se ejecuta la función 'setController' propia de la clase
		$this->setMethod(); //se ejecuta la función 'setMethod' propia de la clase
		$this->setParam(); //se ejecuta la función 'setParam' propia de la clase
	}

	public function setUri() //función que divide la URL en partes y las ingresa en un array
	{
		$this->uri = explode('/', URI); //la función explode de php separa un string por el caracter que queramos y lo convierte en array, en este caso separa el string 'URI' por cada caracter '/' que este dentro y cada parte es un índice del array resultante, este array se le asigna a la variable 'uri' de la clase
	}

	public function setController() //función que asigna el controlador
	{
		$this->controller = $this->uri[2] === '' ? 'inicio' : $this->uri[2]; //a la variable 'controller' de la clase se le asigna el valor que esté dentro del índice 2 del array 'uri', si está vacío se le asigna 'inicio' como default, sino se le asigna el que esté
	}

	public function setMethod() //función que asigna el método del controlador
	{
		$this->method = !empty($this->uri[3]) ? $this->uri[3] : 'exec'; //a la variable 'method' de la clase se le asigna el valor que esté dentro del índice 3 del array 'uri', si está vacío se le asigna 'exec' como default, sino se le asigna el que esté
	}

	public function setParam() //función que asigna el parametro recibido por la petición
	{
		if (REQUEST_METHOD === 'POST') { //si el método de la petición es POST, a la variable 'param' de la clase se le asigna el array $_POST
			$this->param = $_POST;
		} else if (REQUEST_METHOD === 'GET') { //si el método de la petición es GET, a la variable 'param' de la clase se le asigna lo que esté en el índice 4 del array 'uri', si no hay nada se le asigna vacío
			$this->param = !empty($this->uri[4]) ? $this->uri[4] : '';
		}
	}

	public function getUri() //función que retorna el array 'uri'
	{
		return $this->uri;
	}

	public function getController() //función que retorna el valor de 'controller'
	{
		return $this->controller;
	}

	public function getMethod() //función que retorna el valor de 'method'
	{
		return $this->method;
	}

	public function getParam() //función que retorna el valor de 'param'
	{
		return $this->param;
	}
}

?>