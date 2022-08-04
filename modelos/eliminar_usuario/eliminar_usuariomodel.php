<?php 

class eliminar_usuariomodel extends model
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function consulta($id)
	{
		$sql = "SELECT U.idusuario, U.nombre, U.usuario, R.rol FROM `usuario` AS U\n"

    	. "INNER JOIN rol AS R ON U.rol = R.idrol\n"

    	. "WHERE U.idusuario = '$id'";

    	return $this->db->query($sql);
	}

	public function Eliminar_usuario($id)
	{
		$sql = "DELETE FROM `usuario` WHERE idusuario = '$id'";

		$this->db->query($sql);
	}
}

?>