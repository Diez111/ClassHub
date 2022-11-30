<?php
defined('BASEPATH') or exit('No se permite acceso directo'); //si la constante esta definida se ejecuta el resto del codigo, sino se detiene la ejecución y tira un mensaje
require_once ROOT . '/mvc/modelos/temas/temasmodel.php'; //carga el archivo con el modelo
require_once ROOT . '/mvc/system/session.php'; //carga el archivo de la clase 'session'

 class temascontroller extends controller //Crea la clase "temascontroller" con herencia de la clase "controller"
{
	private $session; //Crea la variable 'session'
	private $model; //Crea la variable 'model'

	public function __construct() //función que se ejecuta al asignarle la clase a un objeto
	{
		$this->model = new temasmodel(); //creamos el objeto 'model' con la clase 'temasmodel' para poder comunicarse con la base de datos a traves del modelo
		$this->session = new session(); //creamos el objeto 'session' con la clase 'session' para poder obtener informacion de la sesión
		$this->session->iniciar(); //iniciamos la sesión

		if (empty($this->session->getAll())) { //pedimos la variable completa de la sesión, si existe se sigue con el código, sino nos manda al login
			header('location: /mvc/login'); //usamos la función header(propia de php) para ir al login
		}
	}
	
	public function exec() //función que se encarga de obtener los datos para la vista y mostrarla
	{
		$params = array('temavis_u' => $this->session->get('temavis'), 'rol' => $this->session->get('rol'), 'tema' => $this->session->get('temavis')); //asignamos los parametros que vamos a enviar a la vista
		$this->render(__CLASS__, $params); //función heredada que permite mostrar la vista y enviarle los datos que queramos, dentro de 'params'
	}

	public function update($parametros) //función que va a cambiar el tema de fondo
	{
		$this->model->Update($parametros, $this->session->get('idUser')); //se le pide al modelo que actualice el tema en la base según la id del usuario
		$this->session->add('temavis', $parametros['temavis']); //se actualiza también el tema en la variable de la sesión
		$this->model->close(); //le decimos al modelo que finalice la conexión con la base de datos por seguridad
		header('location: /mvc/temas'); //nos manda a la misma página para simular una recarga de página
	}

	public function salir() //Función para cerrar la sesion 
	{
		$this->session->close(); //Cerramos la sesion
		$this->model->close(); //le decimos al modelo que finalice la conexión con la base de datos por seguridad
		header('location: /mvc/login'); //Nos manda al login 
	}
}

?>