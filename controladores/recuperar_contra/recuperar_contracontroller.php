<?php
defined('BASEPATH') or exit('No se permite acceso directo'); //si la constante esta definida se ejecuta el resto del codigo, sino se detiene la ejecución y tira un mensaje
require_once ROOT . '/mvc/modelos/recuperar_contra/recuperar_contramodel.php'; //carga el archivo con el modelo

class recuperar_contracontroller extends controller //Crea la clase "recuperar_contracontroller" con herencia de la clase "controller"
{
	private $model; //Crea la variable 'model'

	public function __construct() //función que se ejecuta al asignarle la clase a un objeto
	{
		$this->model = new recuperar_contramodel(); //creamos el objeto 'model' con la clase 'loginmodel' para poder comunicarse con la base de datos a traves del modelo
	}

	public function exec() //función que se encarga de obtener los datos para la vista y mostrarla
	{
		$query = $this->model->consulta(); //le pido al modelo el mail del administrador
		$datos = $query->fetch_assoc(); //convertimos los datos obtenidos en un array asociativo

		$params = array('correo' => $datos['correo']); //asignamos los parametros que vamos a enviar a la vista
		$this->render(__CLASS__, $params); //función heredada que permite mostrar la vista y enviarle los datos que queramos, dentro de 'params'
	}
}
?>