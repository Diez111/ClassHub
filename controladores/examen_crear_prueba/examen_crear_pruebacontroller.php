<?php
defined('BASEPATH') or exit('No se permite acceso directo'); //si la constante esta definida se ejecuta el resto del codigo, sino se detiene la ejecución y tira un mensaje
require_once ROOT . '/mvc/modelos/examen_crear_prueba/examen_crear_pruebamodel.php'; //carga el archivo con el modelo
require_once ROOT . '/mvc/system/session.php'; //carga el archivo de la clase 'session'

class examen_crear_pruebacontroller extends controller //Crea la clase "examen_crear_pruebacontroller" con herencia de la clase "controller"
{
	private $session; //Crea la variable 'session'
	private $model; //Crea la variable 'model'

	public function __construct() //función que se ejecuta al asignarle la clase a un objeto
	{
		$this->model = new examen_crear_pruebamodel(); //creamos el objeto 'model' con la clase 'examen_crear_pruebamodel' para poder comunicarse con la base de datos a traves del modelo
		$this->session = new session(); //creamos el objeto 'session' con la clase 'session' para poder obtener informacion de la sesión
		$this->session->iniciar(); //iniciamos la sesión

		if (empty($this->session->getAll())) { //pedimos la variable completa de la sesión, si existe se sigue con el código, sino nos manda al login
			header('location: /mvc/login'); //usamos la función header(propia de php) para ir al login
		}

		if ($this->session->get('rol') == 3) { //todo usuario diferente del rol 3(alumno) puede entrar a esta página
			header('location: /mvc/errorpage'); //sino me manda a error de pagina
		}
	}

	public function exec() //función que se encarga de obtener los datos para la vista y mostrarla
	{
		$query_materias = $this->model->materias(); //Solicito al model las materias
		$query_cursos = $this->model->cursos(); //Solicito al model los cursos

		$params = array('nombre' => $this->session->get('nombre'), 'rol' => $this->session->get('rol'), 'tema' => $this->session->get('temavis'), 'query_materias' => $query_materias, 'query_cursos' => $query_cursos); //asignamos los parametros que vamos a enviar a la vista
		$this->render(__CLASS__, $params); //función heredada que permite mostrar la vista y enviarle los datos que queramos, dentro de 'params'

		$this->model->close(); //le decimos al modelo que finalice la conexión con la base de datos por seguridad
	}

	public function agregar_prueba($parametros) //función que crea una prueba
	{
		if (!empty($parametros['nom_prueba'])) { //verifica que no haya datos vacíos
			$this->model->agregarTest($parametros); //le pedimos al modelo que agregue una prueba a la base de datos con los parametros recibidos
			$this->model->close(); //le decimos al modelo que finalice la conexión con la base de datos por seguridad
			header('location: /mvc/examen_menu_admin'); //nos manda al menú anterior
		} else {
			header('location: /mvc/examen_crear_prueba'); //nos recarga la página
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