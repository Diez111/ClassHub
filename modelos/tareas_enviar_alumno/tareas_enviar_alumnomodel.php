<?php 

class tareas_enviar_alumnomodel extends model
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

	public function enviarTarea($parametros, $fecha, $nom_arch)
	{
		extract($parametros);

		$sql = "INSERT INTO tarea(curso, materia, titulo, fecha_creacion, idcreador, nombre_archivo, rol) VALUES('$curso', '$materia', '$titulo', '$fecha', '$id', '$nom_arch', '$rol')";

		$this->db->query($sql);
	}

	public function eliminarTarea($idtarea)
	{
		$sql = "DELETE FROM tarea WHERE idtarea = '$idtarea'";

		$this->db->query($sql);
	}

	public function consulta($idtarea)
	{
		$sql = "SELECT materia, titulo FROM tarea AS T \n"

    	. "WHERE idtarea = '$idtarea'";

		return $this->db->query($sql);
	}
}

?>