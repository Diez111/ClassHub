<?php 

class examen_menu_pruebas extends model
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function consulta($idtema)
	{
		$sql =  "SELECT * FROM exam_test WHERE idtema = '$idtema'";

    	return $this->db->query($sql);
	}
}

?>