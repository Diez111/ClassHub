<?php 
defined('BASEPATH') or exit('No se permite acceso directo');
require_once ROOT . '/mvc/modelos/registrar_usuario/registrar_usuariomodel.php';
require_once ROOT . '/mvc/system/session.php';

class registrar_usuariocontroller extends controller
{
	private $model;
	private $session;

	public function __construct()
	{
		$this->model = new registrar_usuariomodel();
		$this->session = new session();
		$this->session->iniciar();
		if (empty($this->session->get('pass'))) {
			header('location: /mvc/login');
		}

		if ($this->session->get('rol') != 1) {
			header('location: /mvc/errorpage');
		}
	}

	public function exec()
	{
		$params = array('nombre' => $this->session->get('nombre'), 'rol' => $this->session->get('rol'));
		$this->render(__CLASS__, $params);
	}

	public function registrar($parametros)
	{
		
		$str = 'curso';
		$n = 1;
		$cursos = '';

		for ($i=1; $i < 15; $i++) { 
			$str .= $n;
			if (isset($parametros[$str])) {
				$cursos .= '-';
				$cursos .= $n;
			}

			$str = 'curso';
			$n++;
		}
		
		$this->model->nuevo_usuario($parametros, $cursos);
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