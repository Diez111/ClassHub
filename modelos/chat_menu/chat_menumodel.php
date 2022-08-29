<?php 

class chat_menumodel extends model
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function chats_publicos($rol, $cursos)
	{
		$array_cursos = explode('-', $cursos);
		$sql = 'SELECT * FROM curso WHERE ';
		
		for ($i=1; $i < 12; $i++) { 
			if (isset($array_cursos[$i])) {

				$n = $array_cursos[$i];
				$sql .= 'idcurso = ' . '\'' . $n . '\'';

				if (isset($array_cursos[$i+1])) {
					$sql .= ' OR ';
				}

			} else {
				break;
			}
		}

		/*
		if ($rol != 3) {
			$sql = "SELECT curso, idcurso FROM curso";
		} else {
			$sql = "SELECT curso, idcurso FROM curso WHERE idcurso = '$idcurso'";
		}
		*/
		return $this->db->query($sql);
	}

	public function administradores($idusuario)
	{
		$sql = "SELECT nombre, idusuario FROM usuario WHERE rol = '1' AND NOT idusuario = '$idusuario'";

		return $this->db->query($sql);
	}

	public function profesores($idusuario)
	{
		$sql = "SELECT nombre, idusuario FROM usuario WHERE rol = '2' AND NOT idusuario = '$idusuario'";

		return $this->db->query($sql);
	}

	public function alumnos($idusuario, $rol, $curso)
	{
		if ($rol == 3) {
			$sql = "SELECT nombre, idusuario FROM usuario WHERE curso = '$curso' AND rol = '3' AND NOT idusuario = '$idusuario'";
		} else {
			$sql = "SELECT nombre, idusuario FROM usuario WHERE rol = '3' AND NOT idusuario = '$idusuario'";
		}

		return $this->db->query($sql);
	}
}

?>