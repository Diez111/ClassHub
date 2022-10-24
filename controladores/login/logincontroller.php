<?php 
defined('BASEPATH') or exit('No se permite acceso directo');
require_once ROOT . '/mvc/modelos/login/loginmodel.php';
require_once ROOT . '/mvc/system/session.php';

class logincontroller extends controller
{
	private $model;
	private $session;

	public function __construct()
	{
		$this->model = new loginmodel();
		$this->session = new session();
	}

	public function exec()
	{
		$this->render(__CLASS__);
	}

	public function signin($parametros)
	{
		if ($this->model->verif_bloqueo($parametros)) {
			return $this->mensajeError("Cuenta Bloqueada. Contacte al administrador");
		} else {

			if ($this->verificar($parametros)) {
				return $this->mensajeError("El Usuario y la Contraseña son obligatorios");
			}

			$result = $this->model->signIn($parametros);

			if (!$result->num_rows) {
				if ($this->model->bloquear($parametros)) {
					return $this->mensajeError("Cuenta Bloqueada. Contacte al administrador");
				}

				return $this->mensajeError("El Usuario o la Contraseña son incorrectos");
			}
			$this->model->reiniciar($parametros);
			$datos = $result->fetch_object();

			//inicio de la sesion
			$this->session->iniciar();
			$this->session->add('idUser', $datos->idusuario);
			$this->session->add('nombre', $datos->nombre);
			$this->session->add('email', $datos->correo);
			$this->session->add('user', $datos->usuario);
			$this->session->add('pass', $datos->clave);
			$this->session->add('rol', $datos->rol);
			$this->session->add('curso', $datos->curso);
			$this->session->add('cursos', $datos->cursos);
			$this->session->add('estatus', $datos->estatus);
			$this->session->add('temavis', $datos->temavis);

			$this->model->close();

			header('location: /mvc/inicio'); //esto va a redireccionar al inicio

		}
	}





	public function verificar($parametros)
	{
		return empty($parametros['usuario']) || empty($parametros['clave']);
	}

	public function mensajeError($mensaje)
	{
		$params = array('mensaje_de_error' => $mensaje);
		$this->render(__CLASS__, $params);
	}

}










?>