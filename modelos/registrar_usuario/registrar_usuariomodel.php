<?php 

class registrar_usuariomodel extends model
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function nuevo_usuario($datos, $cursos)
	{
		extract($datos);

		$clave = md5($clave);

		$sql = "INSERT INTO usuario(nombre, correo, usuario, clave, rol, cursos) VALUES('$nombre','$correo','$usuario','$clave','$rol','$cursos')";

		$this->db->query($sql);
	}
}

?>