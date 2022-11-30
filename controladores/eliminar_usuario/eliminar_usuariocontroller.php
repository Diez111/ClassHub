<?php
defined('BASEPATH') or exit('No se permite acceso directo'); //si la constante esta definida se ejecuta el resto del codigo, sino se detiene la ejecución y tira un mensaje
require_once ROOT . '/mvc/modelos/eliminar_usuario/eliminar_usuariomodel.php'; //carga el archivo con el modelo
require_once ROOT . '/mvc/system/session.php'; //carga el archivo de la clase 'session'

class eliminar_usuariocontroller extends controller //Crea la clase "eliminar_usuariocontroller" con herencia de la clase "controller"
{
	private $session; //Crea la variable 'session'
	private $model; //Crea la variable 'model'

	public function __construct() //función que se ejecuta al asignarle la clase a un objeto
	{
		$this->model = new eliminar_usuariomodel(); //creamos el objeto 'model' con la clase 'eliminar_usuariomodel' para poder comunicarse con la base de datos a traves del modelo
		$this->session = new session(); //creamos el objeto 'session' con la clase 'session' para poder obtener informacion de la sesión
		$this->session->iniciar(); //iniciamos la sesión

		if (empty($this->session->getAll())) { //pedimos la variable completa de la sesión, si existe se sigue con el código, sino nos manda al login
			header('location: /mvc/login'); //usamos la función header(propia de php) para ir al login
		}

		if ($this->session->get('rol') != 1) { //Si el rol que está en la sesión es diferente a 1(Admin) te manda a la pantalla de error
			header('location: /mvc/errorpage');  //Nos manda a la pantalla de error
		}
	}

	public function exec($id_usuario) //función que se encarga de obtener los datos para la vista y mostrarla, el parametro que recibimos es de la URL
	{
		if ($id_usuario == 1) {
			header('location: /mvc/errorpage');
		}
		
		$query = $this->model->consulta($id_usuario); //le decimos al modelo que nos de la información del usuario según la id que recibimos como parámetro 
		$datos = $query->fetch_assoc(); //convertimos la información recibida en un array asociativo
		
		$params = array('nombre' => $this->session->get('nombre'),
						'tema' => $this->session->get('temavis'),
						'rol' => $this->session->get('rol'),
						'idusuario' => $datos['idusuario'],
						'nombre_u' => $datos['nombre'],
						'usuario' => $datos['usuario'],
						'rol_u' => $datos['rol']); //asignamos los parametros que vamos a enviar a la vista
		$this->render(__CLASS__, $params); //función heredada que permite mostrar la vista y enviarle los datos que queramos, dentro de 'params'

		$this->model->close(); //le decimos al modelo que finalice la conexión con la base de datos por seguridad
	}

	public function eliminar($parametros) //función para eliminar al usuario
	{
		$this->model->Eliminar_usuario($parametros); //le decimos al modelo que elimine al usuario con la información que está en los parámetros
		$this->model->close(); //le decimos al modelo que finalice la conexión con la base de datos por seguridad
		header('location: /mvc/lista_usuarios'); //nos manda a la lista de usuarios
	}

	public function salir() //Función para cerrar la sesion 
	{
		$this->session->close(); //Cerramos la sesion
		$this->model->close(); //le decimos al modelo que finalice la conexión con la base de datos por seguridad
		header('location: /mvc/login'); //Nos manda al login
	}
}

?>