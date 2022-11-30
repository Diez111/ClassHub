<?php
defined('BASEPATH') or exit('No se permite acceso directo'); //si la constante esta definida se ejecuta el resto del codigo, sino se detiene la ejecución y tira un mensaje
require_once ROOT . '/mvc/modelos/examen_crear_pregunta/examen_crear_preguntamodel.php';  //carga el archivo con el modelo
require_once ROOT . '/mvc/system/session.php'; //carga el archivo de la clase 'session'


class examen_crear_preguntacontroller extends controller //Crea la clase "examen_crear_preguntacontroller" con herencia de la clase "controller"
{
	private $session; //Crea la variable 'session'
	private $model; //Crea la variable 'model'

	public function __construct() //función que se ejecuta al asignarle la clase a un objeto
	{
		$this->model = new examen_crear_preguntamodel(); //creamos el objeto 'model' con la clase 'examen_crear_preguntamodel' para poder comunicarse con la base de datos a traves del modelo
		$this->session = new session(); //creamos el objeto 'session' con la clase 'session' para poder obtener informacion de la sesión
		$this->session->iniciar(); //iniciamos la sesión

		if (empty($this->session->getAll())) { //pedimos la variable completa de la sesión, si existe se sigue con el código, sino nos manda al login
			header('location: /mvc/login'); //usamos la función header(propia de php) para ir al login
		}

		if ($this->session->get('rol') == 3) { //Todos los roles menos los Alumnos pueden ver esto
			header('location: /mvc/errorpage'); //sino te manda a la pagina de error
		}
	}	
	public function exec() //función que se encarga de obtener los datos para la vista y mostrarla
	{
		$query = $this->model->pruebas(); //le pedimos al modelo que nos de la información sobre las pruebas

		$params = array('nombre' => $this->session->get('nombre'), 'rol' => $this->session->get('rol'), 'tema' => $this->session->get('temavis'), 'query' => $query); //asignamos los parametros que vamos a enviar a la vista
		$this->render(__CLASS__, $params); //función heredada que permite mostrar la vista y enviarle los datos que queramos, dentro de 'params'
		
		$this->model->close(); //le decimos al modelo que finalice la conexión con la base de datos por seguridad
	}

	public function agregar_pregunta($parametros) //función que agrega una pregunta para una prueba
	{
		if (!empty($parametros['nom_pregunta']) and !empty($parametros['res_correct'])) { //verifica que no haya datos vacíos
			$this->model->agregarPregunta($parametros); //le pedimos al model que agregue la pregunta de la prueba con los parametros que recibimos
			$this->model->close(); //le decimos al modelo que finalice la conexión con la base de datos por seguridad
			header('location: /mvc/examen_crear_pregunta'); //nos manda de vuelta a la misma página para simular una recarga de página
		} else {
			header('location: /mvc/examen_crear_pregunta'); //nos manda de vuelta a la misma página para simular una recarga de página
		}
	}

	public function salir() //Función para cerrar la sesion 
	{
		$this->session->close(); //Cerramos la sesion
		$this->model->close(); //le decimos al modelo que finalice la conexión con la base de datos por seguridad
		header('location: /mvc/login'); //Nos manda al login 
	}
}
?>