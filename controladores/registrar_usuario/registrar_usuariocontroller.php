<?php
defined('BASEPATH') or exit('No se permite acceso directo'); //si la constante esta definida se ejecuta el resto del codigo, sino se detiene la ejecución y tira un mensaje
require_once ROOT . '/mvc/modelos/registrar_usuario/registrar_usuariomodel.php'; //carga el archivo con el modelo
require_once ROOT . '/mvc/system/session.php'; //carga el archivo de la clase 'session'

class registrar_usuariocontroller extends controller //Crea la clase "registrar_usuariocontroller" con herencia de la clase "controller"
{
	private $session; //Crea la variable 'session'
	private $model; //Crea la variable 'model'

	public function __construct() //función que se ejecuta al asignarle la clase a un objeto
	{
		$this->model = new registrar_usuariomodel(); //creamos el objeto 'model' con la clase 'registrar_usuariomodel' para poder comunicarse con la base de datos a traves del modelo
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
		$query_cursos = $this->model->cursos(); //le pedimos al modelo la información de los cursos

		$params = array('nombre' => $this->session->get('nombre'), 'rol' => $this->session->get('rol'), 'tema' => $this->session->get('temavis'), 'query_cursos' => $query_cursos); //asignamos los parametros que vamos a enviar a la vista
		$this->render(__CLASS__, $params); //función heredada que permite mostrar la vista y enviarle los datos que queramos, dentro de 'params'

		$this->model->close(); //le decimos al modelo que finalice la conexión con la base de datos por seguridad
	}

	public function registrar($parametros) //Creamos la funcion "registrar" con los parametros que le dimos en la vista
	{
		$query = $this->model->ultimo_curso(); //le pido al modelo que devuelva el numero de la cantidad de cursos
		$datos = $query->fetch_assoc(); //paso los datos a un array
		
		if (!empty($parametros['nombre']) and !empty($parametros['correo']) and !empty($parametros['usuario']) and !empty($parametros['clave'])) { //verifica que no haya datos vacíos
			//lo siguiente es una forma de crear el string de los cursos que separamos anteriormente
			$str = 'curso';
			$n = 1;
			$cursos = '';

			//la lógica que sigue es basicamente ver si dentro de los parametros recibidos están los cursos a los que pertenece el usuario, y va formando el string según en los que esté
			for ($i=1; $i <= $datos['idcurso']; $i++) { 
				$str .= $n;
				if (isset($parametros[$str])) {
					$cursos .= '-';
					$cursos .= $n;
				}
				$str = 'curso';
				$n++;
			}
		
			$this->model->nuevo_usuario($parametros, $cursos); //le pedimos al modelo que ingrese los datos a la base de datos
			$this->model->close(); //le decimos al modelo que finalice la conexión con la base de datos por seguridad
			header('location: /mvc/lista_usuarios'); //nos manda a la lista de usuarios para ver los cambios
		} else {
			header('location: /mvc/registrar_usuario'); //nos recarga la página
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