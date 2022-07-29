<?php 
defined('BASEPATH') or exit('No se permite acceso directo');
require_once ROOT . '/mvc/modelos/editar_usuario/editar_usuariomodel.php';
require_once ROOT . '/mvc/system/session.php';

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
						'correo' => $datos['correo'],
						'usuario' => $datos['usuario'],
						'id' => $datos['idusuario'],
						'curso' => $datos['curso']);
		$this->render(__CLASS__, $params);
	}

	public function salir()
	{
		$this->session->close();
		header('location: /mvc/login');
	}

	public function update($parametros)
	{
		$this->model->Update($parametros);
		header('location: /mvc/lista_usuarios');
	}
}

?>