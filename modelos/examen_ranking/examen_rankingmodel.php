<?php 

class examen_rankingmodel extends model
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function consulta($idusuario)
	{
		$sql = "SELECT N.nota, N.cant_quest, S.tema, T.test_name FROM exam_notas AS N INNER JOIN exam_test AS T ON N.test_id = T.test_id INNER JOIN exam_subject AS S ON N.tema_id = S.idtema WHERE N.user_id = '$idusuario'";

		return $this->db->query($sql);
	}
}

?>