<?php 
defined('BASEPATH') or exit('No se permite acceso directo'); //si la constante esta definida se ejecuta el resto del codigo, sino se detiene la ejecución y tira un mensaje
require_once ROOT . '/mvc/modelos/examen_responder/examen_respondermodel.php'; //carga el archivo con el modelo
require_once ROOT . '/mvc/system/session.php'; //carga el archivo de la clase 'session'

class examen_respondercontroller extends controller //Crea la clase "examen_respondercontroller" con herencia de la clase "controller"
{
	private $session; //Crea la variable 'session'
	private $model; //Crea la variable 'model'

	public function __construct() //función que se ejecuta al asignarle la clase a un objeto
	{
		$this->model = new examen_respondermodel(); //creamos el objeto 'model' con la clase 'examen_respondermodel' para poder comunicarse con la base de datos a traves del modelo
		$this->session = new session(); //creamos el objeto 'session' con la clase 'session' para poder obtener informacion de la sesión
		$this->session->iniciar(); //iniciamos la sesión

		if (empty($this->session->getAll())) { //pedimos la variable completa de la sesión, si existe se sigue con el código, sino nos manda al login
			header('location: /mvc/login'); //usamos la función header(propia de php) para ir al login
		}

		if ($this->session->get('rol') != 3) { //si el rol es diferente a 3(alumno) no se puede acceder a la página
			header('location: /mvc/errorpage'); //y nos manda a la página de error
		}
	}

	public function corregir($parametros) //función que corrige las respuestas de la prueba
	{
		if ($this->model->verificar_intento($parametros['id_prueba'], $parametros['id_usuario'])) //primero se verifica de que la prueba no haya sido realizada antes por ese usuario
		{
			$this->model->corregir_prueba($parametros); //si es el primer intento, se corrige la prueba y se sube la nota
		}

		$this->model->close(); //le decimos al modelo que finalice la conexión con la base de datos por seguridad
		header('location: /mvc/examen_menu_alumnos'); //nos manda al menu principal de los examenes
	}

	public function exec($idprueba) //función que se encarga de obtener los datos para la vista y mostrarla, el parametro que recibimos es de la URL
	{
		$query_prueba = $this->model->datosPrueba($idprueba); //le pedimos al modelo que nos pase la información de la prueba según la id
		$query_materia = $this->model->materia($idprueba); //le pedimos al modelo que nos pase la id de la materia según la id de la prueba

		$temp = $query_materia->fetch_assoc(); //convierto la información recibida del modelo en un array asociativo
		$id_materia = $temp['idmateria']; //le paso la id de la materia a una variable

		$params = array('nombre' => $this->session->get('nombre'), 'rol' => $this->session->get('rol'), 'tema' => $this->session->get('temavis'), 'id_usuario' => $this->session->get('idUser'), 'id_prueba' => $idprueba, 'query_prueba' => $query_prueba, 'id_materia' => $id_materia); //asignamos los parametros que vamos a enviar a la vista
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