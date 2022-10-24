<?php 

class examen_menu_temamodel extends model
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function consulta()
	{
		$sql = "SELECT idtema, tema FROM exam_subject";

    	return $this->db->query($sql);
	}
}

?>