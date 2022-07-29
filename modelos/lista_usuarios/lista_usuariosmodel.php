<?php 

class lista_usuariosmodel extends model
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function consulta()
	{
		$sql = "SELECT U.idusuario, U.nombre, U.correo, U.usuario, R.rol, C.curso \n"

    	. "FROM `usuario` AS U\n"

    	. "INNER JOIN `rol` AS R ON U.rol = R.idrol\n"

    	. "INNER JOIN `curso` AS C ON U.curso = C.idcurso\n"

    	. "ORDER BY U.idusuario ASC";

    	return $this->db->query($sql);
	}
}

?>