<?php 

require_once ROOT . '/mvc/modelos/home/homemodel.php';
require_once ROOT . '/mvc/system/session.php';

class homecontroller extends controller
{
	
	public $model;
	public $nombre;
	public $session;

	public function __construct()
	{
		$this->session = new session();
		$this->session->iniciar();
		$this->model = new homemodel();
		$this->nombre = 'Mundo';
	}

	public function getUser($id)
	{
		$user = $this->model->getUser($id);
		$this->show($user);
	}

	public function show()
	{
		
		$params = array('nombre' => $this->nombre);
		$this->render(__CLASS__, $params);

	}

	public function salir()
	{
		$this->session->close();
		header('location: /mvc/login');
	}

	public function exec()
	{
		$this->show();
	}
}

?>