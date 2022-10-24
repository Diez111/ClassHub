<?php 

class loginmodel extends model
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function signIn($parametros)
	{
		$usuario = $this->db->real_escape_string($parametros['usuario']);
		$clave = md5($this->db->real_escape_string($parametros['clave']));
		$sql = "SELECT * FROM `usuario` WHERE usuario = '{$usuario}' AND clave = '{$clave}'";
		return $this->db->query($sql);
	}

	public function verif_usuario($parametros)
	{
		$usuario = $this->db->real_escape_string($parametros['usuario']);
		$sql = "SELECT * FROM `usuario` WHERE usuario = '{$usuario}'";

		if ($this->db->query($sql)->num_rows) {
			return true;
		}

		return false;
	}

	public function verif_bloqueo($parametros)
	{
		$usuario = $this->db->real_escape_string($parametros['usuario']);
		$sql = "SELECT * FROM `usuario` WHERE usuario = '{$usuario}' AND estatus = 2";

		if ($this->db->query($sql)->num_rows) {
			return true;
		}

		return false;
	}

	public function bloquear($parametros)
	{
		$usuario = $parametros['usuario'];
		$sql = "SELECT `intentos` FROM `usuario` WHERE `usuario` = '$usuario'";
		$query = $this->db->query($sql);
		
		$intentos = $query->fetch_assoc();

		if ($intentos['intentos'] > 0) {
			$sql = "UPDATE `usuario` SET `intentos` = {$intentos['intentos']} - 1 WHERE `usuario` = '{$usuario}'";
			$this->db->query($sql);
			return false;
		} else {
			$sql = "UPDATE usuario SET estatus = 2 WHERE `usuario` = '{$usuario}'";
			$this->db->query($sql);
			return true;
		}
	}

	public function reiniciar($parametros)
	{
		$usuario = $this->db->real_escape_string($parametros['usuario']);
		$sql = "UPDATE usuario SET intentos = 5 WHERE `usuario` = '{$usuario}'";
		$this->db->query($sql);
	}



	public function createRandomPassword($parametros, $ramdo)
	{
		$recuperar = $ramdo;

		$usuario = $this->db->real_escape_string($parametros['usuario']);

		$sql = "UPDATE usuario SET recuperar= '$recuperar' WHERE `usuario`='{$usuario}'";

		$this->db->query($sql);
	}

}

?>