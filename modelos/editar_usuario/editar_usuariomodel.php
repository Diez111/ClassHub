<?php 

class editar_usuariomodel extends model 
{
	
	public function __construct() //te pone automaticamente lo que este en el construct de la clase padre
	{
		parent::__construct();
	}

	public function consulta($id)
	{
		$sql = "SELECT nombre, correo, usuario, rol, cursos, idusuario, estatus FROM `usuario` WHERE idusuario = '$id'"; //Se seleccionan todos los datos editables del usuario  para mostrarse en la vista

    	return $this->db->query($sql);
	}

	public function Update($parametros, $cursos)
	{
		extract($parametros);
		if ($clave == '') {
			$sql = "UPDATE `usuario` SET nombre = '$nombre', correo = '$correo', usuario = '$usuario', rol = '$rol', cursos = '$cursos', estatus = '$estado', intentos = '5' WHERE idusuario = '$id'"; //al editarse se actualizan todos los datos del usuario
		} else {
			$clave = md5($clave);
			$sql = "UPDATE `usuario` SET nombre = '$nombre', correo = '$correo', usuario = '$usuario', clave = '$clave', rol = '$rol', cursos = '$cursos', estatus = '$estado', intentos = '5' WHERE idusuario = '$id'"; //Al editar la contrase se cifra antes de enviarse con el resto
		}

		$this->db->query($sql);
	}
}

?>