<?php 
defined('BASEPATH') or exit('No se permite acceso directo');
require_once ROOT . '/mvc/modelos/examen_menu_admin/examen_menu_adminmodel.php';
require_once ROOT . '/mvc/system/session.php';

 class examen_menu_admincontroller extends controller
{
	private $model;
	private $session;

	public function __construct()
	{
		$this->model = new examen_menu_adminmodel();
		$this->session = new session();
		$this->session->iniciar();
		if (empty($this->session->get('pass'))) {
			header('location: /mvc/login');
		}

		if ($this->session->get('rol') != 1) {
			header('location: /mvc/errorpage');
		}
	}
	
	public function exec(){
		$params = array('nombre' => $this->session->get('nombre'), 'rol' => $this->session->get('rol'));
		$this->render(__CLASS__, $params);
	}

	public function salir()
	{
		$this->session->close();
		$this->model->close();
		header('location: /mvc/login');
	}
}
?>