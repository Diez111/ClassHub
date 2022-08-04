<?php 

class tareas_enviarmodel extends model
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function cursos()
	{
		$sql = "SELECT * FROM curso";

		return $this->db->query($sql);
	}

	public function materias()
	{
		$sql = "SELECT * FROM materia";

		return $this->db->query($sql);
	}

	public function crearTarea($parametros, $fecha, $nom_arch)
	{
		extract($parametros);

		$sql = "INSERT INTO tarea(curso, materia, titulo, descripcion, fecha_creacion, idcreador, nombre_archivo, rol) VALUES('$curso', '$materia', '$nom_tarea', '$desc_tarea', '$fecha', '$id', '$nom_arch', '$rol')";

		$this->db->query($sql);
	}

	public function eliminarTarea($idtarea)
	{
		$sql = "DELETE FROM tarea WHERE idtarea = '$idtarea'";

		$this->db->query($sql);
	}

	public function tareas()
	{
		$sql = "SELECT C.curso, M.materia, T.titulo, T.descripcion, T.fecha_creacion, U.nombre, T.nombre_archivo, T.idtarea FROM tarea AS T \n"

    	. "INNER JOIN curso AS C ON T.curso = C.idcurso \n"

    	. "INNER JOIN materia AS M ON T.materia = M.idmateria \n"

    	. "INNER JOIN usuario AS U ON T.idcreador = U.idusuario \n"

    	. "WHERE NOT T.rol = '3'";

		return $this->db->query($sql);
	}
}

?>