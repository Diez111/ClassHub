<?php 
defined('BASEPATH') or exit('No se permite acceso directo'); //si la constante esta definida se ejecuta el resto del codigo, sino se detiene la ejecución y tira un mensaje
require_once ROOT . '/mvc/modelos/examen_ranking/examen_rankingmodel.php'; //carga el archivo con el modelo
require_once ROOT . '/mvc/system/session.php'; //carga el archivo de la clase 'session'

class examen_rankingcontroller extends controller //Crea la clase "examen_rankingcontroller" con herencia de la clase "controller"
{
	private $session; //Crea la variable 'session'
	private $model; //Crea la variable 'model'

	public function __construct() //función que se ejecuta al asignarle la clase a un objeto
	{
		$this->model = new examen_rankingmodel(); //creamos el objeto 'model' con la clase 'examen_rankingmodel' para poder comunicarse con la base de datos a traves del modelo
		$this->session = new session(); //creamos el objeto 'session' con la clase 'session' para poder obtener informacion de la sesión
		$this->session->iniciar(); //iniciamos la sesión

		if (empty($this->session->getAll())) { //pedimos la variable completa de la sesión, si existe se sigue con el código, sino nos manda al login
			header('location: /mvc/login'); //usamos la función header(propia de php) para ir al login
		}

		if ($this->session->get('rol') != 3) { //si el rol es diferente a 3(alumno) no se puede acceder a la página
			header('location: /mvc/errorpage'); //y nos manda a la página de error
		}
	}

	public function exec() //función que se encarga de obtener los datos para la vista y mostrarla, el parametro que recibimos es de la URL
	{
		$query_notas = $this->model->notas($this->session->get('idUser')); //le pedimos al modelo que nos de información de las notas segun la id del usuario

		$params = array('query_notas' => $query_notas, 'rol' => $this->session->get('rol'), 'tema' => $this->session->get('temavis')); //asignamos los parametros que vamos a enviar a la vista
		$this->render(__CLASS__, $params); //función heredada que permite mostrar la vista y enviarle los datos que queramos, dentro de 'params'

		$this->model->close(); //le decimos al modelo que finalice la conexión con la base de datos por seguridad
	}

	public function salir() //Función para cerrar la sesion 
	{
		$this->session->close(); //Cerramos la sesion
		$this->model->close(); //le decimos al modelo que finalice la conexión con la base de datos por seguridad
		header('location: /mvc/login'); //Nos manda al login 
	}
}

?>