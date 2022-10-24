<?php 
defined('BASEPATH') or exit('No se permite acceso directo');//No se permite el acceso directo
require_once ROOT . '/mvc/modelos/eliminar_usuario/eliminar_usuariomodel.php';//Se conecta al modelo para la consulta de los datos a la bd
require_once ROOT . '/mvc/system/session.php';//Me dice la sesion en la que estoy

class eliminar_usuariocontroller extends controller
{
	private $model; 
	private $session;

	public function __construct()
	{
		$this->model = new eliminar_usuariomodel();
		$this->session = new session();
		$this->session->iniciar();
		if (empty($this->session->get('pass'))) { //Verifica la contraseña
			header('location: /mvc/login');//En caso de no ser correcta me manda al login
		}

		if ($this->session->get('rol') != 1) { //Solo el admin con el rol 1 puede entrar a esta pagina
			header('location: /mvc/errorpage');//Si no lo soy me manda a la pantalla de error
		}
	}

	public function exec($id)
	{
		$query = $this->model->consulta($id); //Consulto todos los datos de mi usuario segun la id de la sesion
		$datos = $query->fetch_assoc();
		
		$params = array('nombre' => $this->session->get('nombre'), //El array de todos los datos a borrar
						'rol' => $this->session->get('rol'),
						'idusuario' => $datos['idusuario'],
						'nombre_u' => $datos['nombre'],
						'usuario' => $datos['usuario'],
						'rol_u' => $datos['rol']);
		$this->render(__CLASS__, $params);//Se mostrara en la vista los datos a borrar
	}

	public function eliminar($parametros)
	{
		$this->model->Eliminar_usuario($parametros); //Se pide al modelo borrar los datos
		$this->model->close();//Al terminar se corta la conexion con la bd
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