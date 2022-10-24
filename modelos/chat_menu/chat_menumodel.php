<?php 

class chat_menumodel extends model
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function chats_publicos($rol, $cursos)
	{
		if ($rol == 1) { //si sos del rol 1 osea admin podes ver todos los chats sin restriciones 
			$sql = "SELECT * FROM curso";
		} else {
			$array_cursos = explode('-', $cursos); //divide en - cada curso para poder cargar y obtener estos cursos desde una sola columna
			$sql = 'SELECT * FROM curso WHERE ';
		
			for ($i=1; $i < 15; $i++) {  //se cargan todos los chats de forma ordenada 
				if (isset($array_cursos[$i])) { //pide el dato de la cantidad de cursos

					$n = $array_cursos[$i]; //de esto genera un numero de cursos
					$sql .= 'idcurso = ' . '\'' . $n . '\''; //se muestran los cursos segun la id

					if (isset($array_cursos[$i+1])) { //Se muestran los cursos de forma ordenada
						$sql .= ' OR ';
					}

				} else {
					break;
				}
			}
		}
		
		return $this->db->query($sql);
	}

	public function administradores($idusuario)
	{
		$sql = "SELECT nombre, idusuario FROM usuario WHERE rol = '1' AND NOT idusuario = '$idusuario'"; //constultos los id de los administradores

		return $this->db->query($sql);
	}

	public function profesores($idusuario, $rol, $cursos)
	{
		if ($rol != 3) {	//consnulto los id de los profesores 
			$sql = "SELECT nombre, idusuario FROM usuario WHERE rol = '2' AND NOT idusuario = '$idusuario'";
		} else {
			$sql = "SELECT nombre, idusuario FROM usuario WHERE rol = '2' AND cursos LIKE '%{$cursos}%'"; //el cursos asignados que tienen
		}

		return $this->db->query($sql);
	}

	public function alumnos($idusuario, $rol, $cursos)
	{
		if ($rol == 3) {//consulto los id de los alumnos
			$sql = "SELECT nombre, idusuario FROM usuario WHERE cursos LIKE '%{$cursos}%' AND rol = '3' AND NOT idusuario = '$idusuario'";
		} else if ($rol == 2){//si el rol es igual a 2 osea profesor
			$cursos_separados = explode('-', $cursos); //que los separe por - para que el usuario profesor pueda tener cargados mas de un curso al mismo tiempo y despues descomponer el dato y utilizarlo
			$sql = "SELECT nombre, idusuario FROM usuario WHERE rol = '3' AND ("; //Si el usuario es un alumno

			for ($i=1; $i < 15; $i++) {  //que cargue todos los cursos
				if (isset($cursos_separados[$i])) {
					$sql .= "cursos LIKE '%{$cursos_separados[$i]}%'"; //Solo muestre los cursos que tiene disponible su usuario

					if (isset($cursos_separados[$i+1])) { 
						$sql .= " OR ";
					}
				} else {
					break;
				}
			}

			$sql .= ")";

		} else {
			$sql = "SELECT nombre, idusuario FROM usuario WHERE rol = '3'";
		}

		return $this->db->query($sql);
	}
}

?>