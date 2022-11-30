<?php
defined('BASEPATH') or exit('No se permite acceso directo'); //si la constante esta definida se ejecuta el resto del codigo, sino se detiene la ejecución y tira un mensaje
require_once ROOT . '/mvc/modelos/login/loginmodel.php'; //carga el archivo con el modelo
require_once ROOT . '/mvc/system/session.php'; //carga el archivo de la clase 'session'
 
class logincontroller extends controller //Crea la clase "logincontroller" con herencia de la clase "controller"
{
	private $session; //Crea la variable 'session'
	private $model; //Crea la variable 'model'

	public function __construct() //función que se ejecuta al asignarle la clase a un objeto
	{
		$this->model = new loginmodel(); //creamos el objeto 'model' con la clase 'loginmodel' para poder comunicarse con la base de datos a traves del modelo
		$this->session = new session(); //creamos el objeto 'session' con la clase 'session' para poder obtener informacion de la sesión
	}

	public function exec() //función que se encarga de obtener los datos para la vista y mostrarla
	{
		$this->render(__CLASS__); //función heredada que permite mostrar la vista
	}

	public function signin($parametros) //función que permite iniciar sesión
	{
		if ($this->verificar($parametros)) { //Verifica si los campos de usuario y contraseña estan llenos
			return $this->mensajeError("El Usuario y la Contraseña son obligatorios"); //si alguno quedó vacío, muestra un mensaje
		}

		$result = $this->model->signIn($parametros); //Le pasamos al modelo los parametros para que verifique la informacion 

		if (!$result->num_rows) { //si no recibe nada sucede lo siguiente
			if ($this->model->bloquear($parametros)) { //le pregunta al modelo si la cuenta está bloqueada
				return $this->mensajeError("Cuenta Bloqueada. Contacte al administrador"); //si lo está, muestra un mensaje
			}
			return $this->mensajeError("El Usuario o la Contraseña son incorrectos"); //si algún dato está mal y aun no se bloqueó, muestra un mensaje
		}

		if ($this->model->verif_bloqueo($parametros)) { //Verificamos si la cuenta esta bloqueada
			return $this->mensajeError("Cuenta Bloqueada. Contacte al administrador"); //si lo está, muestra un mensaje
		}
			
		$this->model->reiniciar($parametros); //si se pudo ingresar con exito, reinicia los intentos para ingresar
		$datos = $result->fetch_object(); //convertimos los datos de la consulta en un objeto

		$this->session->iniciar(); //iniciamos la sesión para cargar los datos
		$this->session->add('idUser', $datos->idusuario); //cargamos la id del usuario
		$this->session->add('nombre', $datos->nombre); //cargamos el nombre del usuario
		$this->session->add('email', $datos->correo); //cargamos el email del usuario
		$this->session->add('user', $datos->usuario); //cargamos el nombre de usuario del usuario
		$this->session->add('rol', $datos->rol); //cargamos el rol del usuario
		$this->session->add('cursos', $datos->cursos); //cargamos el string de los cursos del usuario
		$this->session->add('temavis', $datos->temavis); //cargamos el tema de fondo del usuario

		$this->model->close(); //le decimos al modelo que finalice la conexión con la base de datos por seguridad

		header('location: /mvc/inicio'); //nos manda a la página principal
	}

	public function verificar($parametros) //función para verificar de que no haya datos vacios
	{
		return empty($parametros['usuario']) || empty($parametros['clave']); //retorna si algún campo esta vacío
	}

	public function mensajeError($mensaje) //función que recarga la página para mostrar un error
	{
		$params = array('mensaje_de_error' => $mensaje); //el mensaje de error que se manda a la vista
		$this->render(__CLASS__, $params); //función heredada que permite mostrar la vista y enviarle los datos que queramos, dentro de 'params'
	}

}
?>