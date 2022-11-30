<?php
defined('BASEPATH') or exit('No se permite acceso directo'); //si la constante esta definida se ejecuta el resto del codigo, sino se detiene la ejecución y tira un mensaje
require_once ROOT . '/mvc/modelos/tareas_recibidas_profesor/tareas_recibidas_profesormodel.php'; //carga el archivo con el modelo 
require_once ROOT . '/mvc/system/session.php'; //carga el archivo de la clase 'session'


class tareas_recibidas_profesorcontroller extends controller //Crea la clase "tareas_recibidas_profesorcontroller" con herencia de la clase "controller"
{
	private $session; //Crea la variable 'session'
	private $model; //Crea la variable 'model'

	public function __construct() //función que se ejecuta al asignarle la clase a un objeto
	{
		$this->model = new tareas_recibidas_profesormodel(); //creamos el objeto 'model' con la clase 'tareas_recibidas_profesormodel' para poder comunicarse con la base de datos a traves del modelo
		$this->session = new session(); //creamos el objeto 'session' con la clase 'session' para poder obtener informacion de la sesión
		$this->session->iniciar(); //iniciamos la sesión

		if (empty($this->session->getAll())) { //pedimos la variable completa de la sesión, si existe se sigue con el código, sino nos manda al login
			header('location: /mvc/login'); //usamos la función header(propia de php) para ir al login
		}

		if ($this->session->get('rol') == 3) { //todo usuario diferente del rol 3(alumno) puede entrar a esta página
			header('location: /mvc/errorpage'); //sino me manda a error de pagina
		}
	}

	public function salir() //Función para cerrar la sesion 
	{
		$this->session->close(); //Cerramos la sesion
		$this->model->close(); //le decimos al modelo que finalice la conexión con la base de datos por seguridad
		header('location: /mvc/login'); //Nos manda al login 
	}

	public function exec() //función que se encarga de obtener los datos para la vista y mostrarla
	{
		$query = $this->model->tareas($this->session->get('idUser')); //le pedimos al modelo la información de las tareas enviadas por los alumnos según la id del usuario
		$params = array('nombre' => $this->session->get('nombre'), 'rol' => $this->session->get('rol'), 'tema' => $this->session->get('temavis'), 'query' => $query); //asignamos los parametros que vamos a enviar a la vista
		$this->render(__CLASS__, $params); //función heredada que permite mostrar la vista y enviarle los datos que queramos, dentro de 'params'

		$this->model->close(); //le decimos al modelo que finalice la conexión con la base de datos por seguridad
	}
}

?>