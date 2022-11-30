<?php
defined('BASEPATH') or exit('No se permite acceso directo'); //si la constante esta definida se ejecuta el resto del codigo, sino se detiene la ejecución y tira un mensaje. 
require_once ROOT . '/mvc/modelos/calendario/calendariomodel.php'; //carga el archivo con el modelo
require_once ROOT . '/mvc/system/session.php'; //carga el archivo de la clase 'session'

class calendariocontroller extends controller //Crea la clase "calendariocontroller" con herencia de la clase "controller"
{
	private $session; //Crea la variable 'session'
	private $model; //Crea la variable 'model'

	public function __construct() //función que se ejecuta al asignarle la clase a un objeto
	{
		$this->model = new calendariomodel(); //creamos el objeto 'model' con la clase 'calendariomodel' para poder comunicarse con la base de datos a traves del modelo
		$this->session = new session(); //creamos el objeto 'session' con la clase 'session' para poder obtener informacion de la sesión
		$this->session->iniciar(); //iniciamos la sesión

		if (empty($this->session->getAll())) { //pedimos la variable completa de la sesión, si existe se sigue con el código, sino nos manda al login
			header('location: /mvc/login'); //usamos la función header(propia de php) para ir al login
		}
	}

	public function crear_evento($parametros) //función para crear un evento del calendario, recibe parámetros de la vista
	{
		if (!empty($parametros['titulo']) and !empty($parametros['contenido'])) { //verifica que no haya datos vacíos
			$this->model->crear_evento($parametros); //Al modelo le mandamos los parámetros
			$this->model->close(); //le decimos al modelo que finalice la conexión con la base de datos por seguridad
			header('location: /mvc/calendario'); //Nos manda al calendario nuevamente para simular el efecto de recargar página y de esa forma mostrar los datos nuevos
		} else {
			header('location: /mvc/calendario'); //Nos manda al calendario nuevamente para simular el efecto de recargar página y de esa forma mostrar los datos nuevos
		}
	}

	public function exec() //función que se encarga de obtener los datos para la vista y mostrarla
	{
		$query = $this->model->eventos(); //le decimos al modelo que nos entregue la información de los eventos del calendario

		$params = array('nombre' => $this->session->get('nombre'), 'rol' => $this->session->get('rol'), 'tema' => $this->session->get('temavis'), 'query' => $query, 'id_usuario' => $this->session->get('idUser')); //asignamos los parametros que vamos a enviar a la vista
		$this->render(__CLASS__, $params); //función heredada que permite mostrar la vista y enviarle los datos que queramos, dentro de 'params'
		
		$this->model->close(); //le decimos al modelo que finalice la conexión con la base de datos por seguridad
	}
	public function salir()  //función para cerrar la sesión
	{
		$this->session->close(); //Cerramos la sesion
		$this->model->close(); //le decimos al modelo que finalice la conexión con la base de datos por seguridad
		header('location: /mvc/login'); //usamos la función header(propia de php) para ir al login
	}
}

?>