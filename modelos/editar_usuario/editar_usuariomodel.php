<?php 

class editar_usuariomodel extends model
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function consulta($id)
	{
		$sql = "SELECT nombre, correo, usuario, rol, curso, idusuario, estatus FROM `usuario` WHERE idusuario = '$id'";

    	return $this->db->query($sql);
	}

	public function Update($parametros)
	{
		extract($parametros);
		if ($clave == '') {
			$sql = "UPDATE `usuario` SET nombre = '$nombre', correo = '$correo', usuario = '$usuario', rol = '$rol', curso = '$curso', estatus = '$estado', intentos = '5' WHERE idusuario = '$id'";
		} else {
			$clave = md5($clave);
			$sql = "UPDATE `usuario` SET nombre = '$nombre', correo = '$correo', usuario = '$usuario', clave = '$clave', rol = '$rol', curso = '$curso', estatus = '$estado', intentos = '5' WHERE idusuario = '$id'";
		}

		$this->db->query($sql);
	}
}

?>