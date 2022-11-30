<?php 
defined('BASEPATH') or exit('No se permite acceso directo'); //si la constante esta definida se ejecuta el resto del codigo, sino se detiene la ejecución y tira un mensaje
require_once ROOT . '/mvc/modelos/editar_usuario/editar_usuariomodel.php'; //carga el archivo con el modelo
require_once ROOT . '/mvc/system/session.php'; //carga el archivo de la clase 'session'

class editar_usuariocontroller extends controller //Crea la clase "editar_usuariocontroller" con herencia de la clase "controller"
{
	private $session; //Crea la variable 'session'
	private $model; //Crea la variable 'model'

	public function __construct() //función que se ejecuta al asignarle la clase a un objeto
	{
		$this->model = new editar_usuariomodel(); //creamos el objeto 'model' con la clase 'editar_usuariomodel' para poder comunicarse con la base de datos a traves del modelo
		$this->session = new session(); //creamos el objeto 'session' con la clase 'session' para poder obtener informacion de la sesión
		$this->session->iniciar(); //iniciamos la sesión

		if (empty($this->session->getAll())) { //pedimos la variable completa de la sesión, si existe se sigue con el código, sino nos manda al login
			header('location: /mvc/login'); //usamos la función header(propia de php) para ir al login
		}

		if ($this->session->get('rol') != 1) { //si el rol que está en la sesión no es igual a 1(administrador), lo manda a la página de error
			header('location: /mvc/errorpage'); //usamos la función header(propia de php) para ir a la página de error
		}
	}

	public function exec($id_usuario) //función que se encarga de obtener los datos para la vista y mostrarla, el parametro que recibimos es de la URL
	{
		$query = $this->model->consulta($id_usuario); //le decimos al modelo la información del usuario con la id que le pasamos
		$query_cursos = $this->model->cursos(); //le pedimos al modelo la información de los cursos

		$datos = $query->fetch_assoc(); //convertimos los datos obtenidos en un array asociativo
		$array_cursos = explode('-', $datos['cursos']); //los cursos a los que pertenece a un usuario estan en un string, asi que lo separamos y los ponemos en un array con explode para facilitar el trabajo en la vista

		$params = array('nombre' => $this->session->get('nombre'),
						'tema' => $this->session->get('temavis'),
						'rol' => $this->session->get('rol'),
						'nombre_u' => $datos['nombre'],
						'correo' => $datos['correo'],
						'usuario' => $datos['usuario'],
						'rol_u' => $datos['rol'],
						'id_usuario' => $datos['idusuario'],
						'estatus' => $datos['estatus'],
						'cursos' => $array_cursos,
						'query_cursos' => $query_cursos); //asignamos los parametros que vamos a enviar a la vista
		$this->render(__CLASS__, $params); //función heredada que permite mostrar la vista y enviarle los datos que queramos, dentro de 'params'

		$this->model->close(); //le decimos al modelo que finalice la conexión con la base de datos por seguridad
	}

	public function update($parametros) //función para actualizar los datos del usuario
	{
		$query = $this->model->ultimo_curso(); //le pido al modelo que devuelva el numero de la cantidad de cursos
		$datos = $query->fetch_assoc(); //paso los datos a un array

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

		$this->model->Update($parametros, $cursos); //le mandamos los datos al modelo para que los suba a la base de datos
		$this->model->close(); //le decimos al modelo que finalice la conexión con la base de datos por seguridad
		header('location: /mvc/lista_usuarios'); //volvemos a la lista de usuarios
	}

	public function salir() //Función para cerrar la sesion 
	{
		$this->session->close(); //Cerramos la sesion
		$this->model->close(); //le decimos al modelo que finalice la conexión con la base de datos por seguridad
		header('location: /mvc/login'); //Nos manda al login 
	}
}

?>