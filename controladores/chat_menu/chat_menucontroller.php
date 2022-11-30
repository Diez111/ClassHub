<?php
defined('BASEPATH') or exit('No se permite acceso directo'); //si la constante esta definida se ejecuta el resto del codigo, sino se detiene la ejecución y tira un mensaje
require_once ROOT . '/mvc/modelos/chat_menu/chat_menumodel.php'; //carga el archivo con el modelo
require_once ROOT . '/mvc/system/session.php'; //carga el archivo de la clase 'session'
  
class chat_menucontroller extends controller //Crea la clase "chat_menucontroller" con herencia de la clase "controller"
{
	private $session; //Crea la variable 'session'
	private $model; //Crea la variable 'model'

	public function __construct() //función que se ejecuta al asignarle la clase a un objeto
	{
		$this->model = new chat_menumodel(); //creamos el objeto 'model' con la clase 'chat_menumodel' para poder comunicarse con la base de datos a traves del modelo
		$this->session = new session(); //creamos el objeto 'session' con la clase 'session' para poder obtener informacion de la sesión
		$this->session->iniciar(); //iniciamos la sesión

		if (empty($this->session->getAll())) { //pedimos la variable completa de la sesión, si existe se sigue con el código, sino nos manda al login
			header('location: /mvc/login'); //usamos la función header(propia de php) para ir al login
		}
	}

	public function exec() //función que se encarga de obtener los datos para la vista y mostrarla
	{
		$querypublico = $this->model->chats_publicos($this->session->get('rol'), $this->session->get('cursos')); //le pide al modelo la información de todos los cursos, según el rol y el curso(o cursos) del usuario
		$queryadmin = $this->model->administradores($this->session->get('idUser')); //le pide al modelo la información de los administradores, según la id del usuario
		$queryprofes = $this->model->profesores($this->session->get('idUser'), $this->session->get('rol'), $this->session->get('cursos')); //le pide al modelo la información de los profesores, según la id del usuario, el rol y el curso(o cursos)
		$queryalumnos = $this->model->alumnos($this->session->get('idUser'), $this->session->get('rol'), $this->session->get('cursos')); //le pide al modelo la información de los alumnos, segun la id del usuario, el rol y el curso(o cursos)
		
		$params = array('nombre' => $this->session->get('nombre'), 'rol' => $this->session->get('rol'), 'tema' => $this->session->get('temavis'), 'querypublico' => $querypublico, 'queryadmin' => $queryadmin, 'queryprofes' => $queryprofes, 'queryalumnos' => $queryalumnos   ); //asignamos los parametros que vamos a enviar a la vista
		$this->render(__CLASS__, $params);//función heredada que permite mostrar la vista y enviarle los datos que queramos, dentro de 'params'

		$this->model->close();//le decimos al modelo que finalice la conexión con la base de datos por seguridad
	}

	public function salir()  //función para cerrar la sesión
	{
		$this->session->close(); //Cerramos la sesion
		$this->model->close(); //le decimos al modelo que finalice la conexión con la base de datos por seguridad
		header('location: /mvc/login'); //usamos la función header(propia de php) para ir al login
	}
}

?>