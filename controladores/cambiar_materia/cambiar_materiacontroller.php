<?php 
defined('BASEPATH') or exit('No se permite acceso directo'); //si la constante esta definida se ejecuta el resto del codigo, sino se detiene la ejecución y tira un mensaje
require_once ROOT . '/mvc/modelos/cambiar_materia/cambiar_materiamodel.php'; //carga el archivo con el modelo
require_once ROOT . '/mvc/system/session.php'; //carga el archivo de la clase 'session'

class cambiar_materiacontroller extends controller //Crea la clase "cambiar_materiacontroller" con herencia de la clase "controller"
{
	private $session; //Crea la variable 'session'
	private $model; //Crea la variable 'model'

	public function __construct() //función que se ejecuta al asignarle la clase a un objeto
	{
		$this->model = new cambiar_materiamodel(); //creamos el objeto 'model' con la clase 'cambiar_materiamodel' para poder comunicarse con la base de datos a traves del modelo
		$this->session = new session(); //creamos el objeto 'session' con la clase 'session' para poder obtener informacion de la sesión
		$this->session->iniciar(); //iniciamos la sesión

		if (empty($this->session->getAll())) { //pedimos la variable completa de la sesión, si existe se sigue con el código, sino nos manda al login
			header('location: /mvc/login'); //usamos la función header(propia de php) para ir al login
		}

		if ($this->session->get('rol') != 1) { //si el rol que está en la sesión no es igual a 1(administrador), lo manda a la página de error
			header('location: /mvc/errorpage'); //usamos la función header(propia de php) para ir a la página de error
		}
	}

	public function exec($id_materia) //función que se encarga de obtener los datos para la vista y mostrarla
	{
		$query = $this->model->consulta($id_materia); //le decimos al modelo que nos de la información de la materia con la id que recibimos como parámetro
		$datos = $query->fetch_assoc(); //ingresamos los datos obtenidos a un array

		$params = array('nombre' => $this->session->get('nombre'),
						'tema' => $this->session->get('temavis'),
						'rol' => $this->session->get('rol'),
						'id_materia' => $id_materia,
						'materia' => $datos['materia']); //asignamos los parametros que vamos a enviar a la vista
		$this->render(__CLASS__, $params); //función heredada que permite mostrar la vista y enviarle los datos que queramos, dentro de 'params'

		$this->model->close(); //le decimos al modelo que finalice la conexión con la base de datos por seguridad
	}

	public function cambiar_nombre($parametros) //función que cambia el nombre de la materia
	{
		$this->model->cambiar_nombre($parametros); //le decimos al modelo que actualice el nombre de la materia con los datos recibidos
		$this->model->close(); //le decimos al modelo que finalice la conexión con la base de datos por seguridad
		header('location: /mvc/crear_materia'); //Nos manda a la lista de materias para ver los nuevos datos
	}

	public function salir() //Función para cerrar la sesion 
	{
		$this->session->close(); //Cerramos la sesion
		$this->model->close(); //le decimos al modelo que finalice la conexión con la base de datos por seguridad
		header('location: /mvc/login'); //Nos manda al login 
	}
}

?>