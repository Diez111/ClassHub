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
		
		$sql = "SELECT res_correct FROM exam_question WHERE test_id = '$idprueba'";
		$query = $this->db->query($sql);

		$n = 1;
		$string = 'opcion';

		if ($query->num_rows) {
			while ($datos = $query->fetch_assoc()) {
				$string .= $n;
				$res_user = $parametros[$string];
				$res_correct = $datos['res_correct'];
				$sql = "INSERT INTO exam_userans(test_id, res_user, res_correct, user_id) VALUES('$idprueba', '$res_user', '$res_correct', '$idusuario')";
				$this->db->query($sql);
				$n++;
				$string = 'opcion';
			}
		}
	}

	public function corregirPrueba($parametros)
	{
		extract($parametros);

		$sql = "SELECT res_user, res_correct FROM exam_userans WHERE user_id = '$idusuario' AND test_id = '$idprueba'";
		$query = $this->db->query($sql);

		$cant_quest = $query->num_rows;

		$contador = 0;

		while ($datos = $query->fetch_assoc()) {
			if ($datos['res_user'] == $datos['res_correct']) {
				$contador++;
			}
		}

		$sql = "SELECT idtema FROM exam_test WHERE test_id = '$idprueba'";
		$query = $this->db->query($sql);
		$dato = $query->fetch_assoc();
		$tema_id = $dato['idtema'];

		$sql = "INSERT INTO exam_notas(test_id, user_id, nota, cant_quest, tema_id) VALUES('$idprueba', '$idusuario', '$contador', '$cant_quest', '$tema_id')";
		$this->db->query($sql);
	}
}

?>