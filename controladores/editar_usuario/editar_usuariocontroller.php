<?php 
defined('BASEPATH') or exit('No se permite acceso directo');//No se permite el acceso directo
require_once ROOT . '/mvc/modelos/editar_usuario/editar_usuariomodel.php';//Se conecta al modelo para la consulta de los datos a la bd
require_once ROOT . '/mvc/system/session.php';//Me dice la sesion en la que estoy

class editar_usuariocontroller extends controller
{
	private $model;
	private $session;

	public function __construct()
	{
		$this->model = new editar_usuariomodel(); 
		$this->session = new session();
		$this->session->iniciar();
		if (empty($this->session->get('pass'))) {
			header('location: /mvc/login');
		}

		if ($this->session->get('rol') != 1) { //solamente el admin puede entrar a esta pantalla
			header('location: /mvc/errorpage'); //sino te manda a la pantalla de error
		}
	}

	public function exec($id)
	{
		$query = $this->model->consulta($id); //Se muestran todos los datos segun el id del usuario
		$datos = $query->fetch_assoc();

		$array_cursos = explode('-', $datos['cursos']); //Se divide por - los cursos para poder asignarle a un usuario mas de un curso al mismo tiempo

		$params = array('nombre' => $this->session->get('nombre'),  //El array con todos los datos del usuario
						'rol' => $this->session->get('rol'),
						'nombre_u' => $datos['nombre'],
						'correo' => $datos['correo'],
						'usuario' => $datos['usuario'],
						'rol_u' => $datos['rol'],
						'id_usuario' => $datos['idusuario'],
						'estatus' => $datos['estatus'],
						'cursos' => $array_cursos);
		$this->render(__CLASS__, $params); //Se muestran todos los datos anteriores en la vista
	}

	public function update($parametros)
	{
		$str = 'curso';						//convierte en un string osea texto los datos del curso para poder analizar muchos cursos en una sola columna de la bd
		$n = 1;
		$cursos = '';

		for ($i=1; $i < 15; $i++) {  //se repite por la cantidad de cursos en total 
			$str .= $n;
			if (isset($parametros[$str])) {
				$cursos .= '-';
				$cursos .= $n;
			}

			$str = 'curso'; //La salida sera el string con los cursos del usuario en orden
			$n++;
		}

		$this->model->Update($parametros, $cursos); //Al actualizar se pasan los parametros el resto de datos editables y por separado los cursos
		$this->model->close(); //Al terminar se cierra la conexion con la bd por seguridad
		header('location: /mvc/lista_usuarios');//Me manda a la lista de usuarios
	}

	public function salir()
	{
		$this->session->close(); //Se cierra la sesion
		$this->model->close();//Se cierra la conexion con la bd
		header('location: /mvc/login');//Me manda al login
	}
}

?>