<?php 
defined('BASEPATH') or exit('No se permite acceso directo');

class errorpagecontroller extends controller
{
	public $path_inicio;
	
	public function __construct()
	{
		$this->path_inicio = 'mvc/';
	}

	public function exec()
	{
		$this->render(__CLASS__, array('path_inicio' => $this->path_inicio));
	}
}

?>