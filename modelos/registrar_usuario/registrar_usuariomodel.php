<?php 

class registrar_usuariomodel extends model
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function nuevo_usuario($datos)
	{
		extract($datos);

		$clave = md5($clave);

		$sql = "INSERT INTO usuario(nombre,correo,usuario,clave,rol,curso) VALUES('$nombre','$correo','$usuario','$clave','$rol','$curso')";

		$this->db->query($sql);
	}
}

?>