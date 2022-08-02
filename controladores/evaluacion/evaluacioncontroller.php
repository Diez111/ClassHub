<?php 
defined('BASEPATH') or exit('No se permite acceso directo');
require_once ROOT . '/mvc/modelos/evaluacion/evaluacionmodel.php';
require_once ROOT . '/mvc/system/session.php';

class evaluacioncontroller extends controller
{
	private $session;
	
	public function __construct()
	{
		$this->session = new session();
		$this->session->iniciar();
		if (empty($this->session->get('pass'))) {
			header('location: /mvc/evaluacionadmin');
		}
	}

	public function exec(){
		$params = array('nombre' => $this->session->get('nombre'), 'rol' => $this->session->get('rol'));
		$this->render(__CLASS__, $params);
	}

	public function salir()
	{
		$this->session->close();
		header('location: /mvc/login');
	}
}

?>