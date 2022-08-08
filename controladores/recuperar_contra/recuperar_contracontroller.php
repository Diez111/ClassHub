<?php 
defined('BASEPATH') or exit('No se permite acceso directo');
require_once ROOT . '/mvc/modelos/recuperar_contra/recuperar_contramodel.php';
require_once ROOT . '/mvc/system/session.php';

class recuperar_contracontroller extends controller
{
	private $model;
	private $session;

	public function __construct()
	{
		$this->model = new recuperar_contramodel();
		$this->session = new session();
	}

	public function exec()
	{
		$this->render(__CLASS__);
	}


}

?>