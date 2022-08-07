<?php 

class examen_respondermodel extends model
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function datosPrueba($idprueba)
	{
		$sql = "SELECT quest_desc, ans1, ans2, ans3, ans4, res_correct FROM exam_question WHERE test_id = '$idprueba'";

		return $this->db->query($sql);
	}

	public function insertarRespuestas($parametros)
	{
		extract($parametros);
		
		$sql = "SELECT quest_id, test_id, res_correct FROM exam_question WHERE test_id = '$idprueba'";
		$query = $this->db->query($sql);
		$temp = $query->fetch_assoc();
		$quest_id = $temp['quest_id'];
		$n = 1;
		$string = 'opcion';
		if ($query->num_rows) {
			while ($datos = $query->fetch_assoc()) {
				$string .= $n;
				$res = $parametros[$string];
				$sql = "UPDATE exam_question SET res_user = '$res', user_id = '$idusuario' WHERE test_id = '$idprueba' AND quest_id = '$quest_id'";
				$this->db->query($sql);
				$n++;
				$string = 'opcion';
				$quest_id++;
			}
				$string .= $n;
				$res = $parametros[$string];
				$sql = "UPDATE exam_question SET res_user = '$res', user_id = '$idusuario' WHERE test_id = '$idprueba' AND quest_id = '$quest_id'";
				$this->db->query($sql);
		}
	}

	public function corregirPrueba($parametros)
	{
		extract($parametros);

		$sql = "SELECT res_correct FROM exam_question WHERE user_id = '$idusuario'";
		$query = $this->db->query($sql);
		$resultados = $query->num_rows;

		$sql = "SELECT res_user FROM exam_question WHERE res_user = res_correct AND test_id = '$idprueba' AND user_id = '$idusuario'";
		$query = $this->db->query($sql);
		$results_user = $query->num_rows;

		$sql = "INSERT INTO exam_results(user_id, test_id, nota, cant_quest) VALUES('$idusuario', '$idprueba', '$results_user', '$resultados')";
		$this->db->query($sql);
	}
}

?>