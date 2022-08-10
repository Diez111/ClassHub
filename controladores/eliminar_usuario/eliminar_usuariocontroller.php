<?php 
defined('BASEPATH') or exit('No se permite acceso directo');
require_once ROOT . '/mvc/modelos/eliminar_usuario/eliminar_usuariomodel.php';
require_once ROOT . '/mvc/system/session.php';

class eliminar_usuariocontroller extends controller
{
	private $model;
	private $session;

	public function __construct()
	{
		$this->model = new eliminar_usuariomodel();
		$this->session = new session();
		$this->session->iniciar();
		if (empty($this->session->get('pass'))) {
			header('location: /mvc/login');
		}

		if ($this->session->get('rol') != 1) {
			header('location: /mvc/errorpage');
		}
	}

	public function exec($id)
	{
		$query = $this->model->consulta($id);
		$datos = $query->fetch_assoc();

		$params = array('nombre' => $this->session->get('nombre'),
						'rol' => $this->session->get('rol'),
						'id' => $datos['idusuario'],
						'nombre_u' => $datos['nombre'],
						'usuario' => $datos['usuario'],
						'rol_u' => $datos['rol']);
		$this->render(__CLASS__, $params);
	}

	public function eliminar($parametros)
	{
		$this->model->Eliminar_usuario($parametros);
		$this->model->close();
		header('location: /mvc/lista_usuarios');
	}

	public function salir()
	{
		$this->session->close();
		$this->model->close();
		header('location: /mvc/login');
	}
}

?>