<?php
defined('BASEPATH') or exit('No se permite acceso directo'); //si la constante esta definida se ejecuta el resto del codigo, sino se detiene la ejecución y tira un mensaje
require_once ROOT . '/mvc/modelos/chat_privado/chat_privadomodel.php'; //carga el archivo con el modelo
require_once ROOT . '/mvc/system/session.php'; //carga el archivo de la clase 'session'
 
class chat_privadocontroller extends controller //Crea la clase "chat_privadocontroller" con herencia de la clase "controller"
{
	private $session; //Crea la variable 'session'
	private $model; //Crea la variable 'model'

	public function __construct() //función que se ejecuta al asignarle la clase a un objeto
	{
		$this->model = new chat_privadomodel(); //creamos el objeto 'model' con la clase 'chat_privadomodel' para poder comunicarse con la base de datos a traves del modelo
		$this->session = new session(); //creamos el objeto 'session' con la clase 'session' para poder obtener informacion de la sesión
		$this->session->iniciar(); //iniciamos la sesión

		if (empty($this->session->getAll())) { //pedimos la variable completa de la sesión, si existe se sigue con el código, sino nos manda al login
			header('location: /mvc/login'); //usamos la función header(propia de php) para ir al login
		}
	}

	public function enviar_mensaje($parametros) //función para enviar un mensaje
	{
		if (!empty($parametros['mensaje'])) { //verifica que no haya datos vacíos
			$this->model->enviar_mensaje($parametros);  //le decimos al modelo que cargue el mensaje en la base de datos
			$this->model->close(); //le decimos al modelo que finalice la conexión con la base de datos por seguridad

			$str = 'location: /mvc/chat_privado/exec/' . $parametros['receptor_id']; //creamos una ruta para la función 'header' y simular una recarga de página, el parametro que le pasamos es la id de la persona con la que hablamos

			header($str); //Nos manda al chat privado nuevamente para simular el efecto de recargar pagina y de esa forma mostrar los datos nuevos
		} else {
			$str = 'location: /mvc/chat_privado/exec/' . $parametros['receptor_id']; //creamos una ruta para la función 'header' y simular una recarga de página, el parametro que le pasamos es la id de la persona con la que hablamos

			header($str); //Nos manda al chat privado nuevamente para simular el efecto de recargar pagina y de esa forma mostrar los datos nuevos
		}
	}

	public function exec($usuario_id) //función que se encarga de obtener los datos para la vista y mostrarla, el parametro que recibimos es de la URL
	{
		$query = $this->model->mensajes($usuario_id, $this->session->get('idUser')); //le decimos al modelo que nos de el historial de mensajes de una conversación, según la id nuestra y la del otro usuario

		$params = array('nombre' => $this->session->get('nombre'), 'rol' => $this->session->get('rol'), 'tema' => $this->session->get('temavis'), 'id_receptor' => $usuario_id, 'query' => $query, 'id_emisor' => $this->session->get('idUser')); //asignamos los parametros que vamos a enviar a la vista
		$this->render(__CLASS__, $params);//función heredada que permite mostrar la vista y enviarle los datos que queramos, dentro de 'params'

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