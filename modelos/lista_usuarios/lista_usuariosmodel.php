<?php 

class lista_usuariosmodel extends model
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function consulta()
	{
		$sql = "SELECT U.idusuario, U.nombre, U.correo, U.usuario, R.rol \n"

    	. "FROM `usuario` AS U\n"

    	. "INNER JOIN `rol` AS R ON U.rol = R.idrol\n"

    	. "ORDER BY U.rol ASC";

    	return $this->db->query($sql);
	}
}

?>