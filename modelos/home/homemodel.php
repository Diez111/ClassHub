<?php 

class homemodel extends model
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function getUser($id)
	{
		return $this->db->query("SELECT * FROM `usuario` WHERE `idusuario` = $id")->fetch_array(MYSQLI_ASSOC);
	}
}

?>