<?php
defined('BASEPATH') or exit('No se permite acceso directo'); //si la constante esta definida se ejecuta el resto del codigo, sino se detiene la ejecución y tira un mensaje
require_once ROOT . '/mvc/modelos/crear_materia/crear_materiamodel.php'; //carga el archivo con el modelo
require_once ROOT . '/mvc/system/session.php'; //carga el archivo de la clase 'session'

class crear_materiacontroller extends controller //Crea la clase "crear_materiacontroller" con herencia de la clase "controller"
{
	private $session; //Crea la variable 'session'
	private $model; //Crea la variable 'model'

	public function __construct() //función que se ejecuta al asignarle la clase a un objeto
	{
		$this->model = new crear_materiamodel(); //creamos el objeto 'model' con la clase 'crear_materiamodel' para poder comunicarse con la base de datos a traves del modelo
		$this->session = new session(); //creamos el objeto 'session' con la clase 'session' para poder obtener informacion de la sesión
		$this->session->iniciar(); //iniciamos la sesión

		if (empty($this->session->getAll())) { //pedimos la variable completa de la sesión, si existe se sigue con el código, sino nos manda al login
			header('location: /mvc/login'); //usamos la función header(propia de php) para ir al login
		}

		if ($this->session->get('rol') != 1) { //Solo los admins pueden ver esta página
			header('location: /mvc/errorpage'); //Sino te manda a la página de error
		}
	}

	public function exec() //función que se encarga de obtener los datos para la vista y mostrarla
	{
		$query_materias = $this->model->materias(); //le pido al modelo la información de las materias

		$params = array('nombre' => $this->session->get('nombre'), 'rol' => $this->session->get('rol'), 'tema' => $this->session->get('temavis'), 'query_materias' => $query_materias); //asignamos los parametros que vamos a enviar a la vista
		$this->render(__CLASS__, $params); //función heredada que permite mostrar la vista y enviarle los datos que queramos, dentro de 'params'

		$this->model->close(); //le decimos al modelo que finalice la conexión con la base de datos por seguridad
	}

	public function crear_materia($parametros) //función que crea una materia
	{
		if (!empty($parametros['materia'])) { //verifica que no haya datos vacíos
			$this->model->crear_materia($parametros); //le pedimos al modelo que envie los datos de la materia a la base de datos
			$this->model->close(); //le decimos al modelo que finalice la conexión con la base de datos por seguridad
			header('location: /mvc/crear_materia'); //Nos manda a la misma página para simular una recarga de página
		} else {
			header('location: /mvc/crear_materia'); //Nos manda a la misma página para simular una recarga de página
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