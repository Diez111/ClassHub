<?php 

class tareas_enviadas_alumnomodel extends model
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function eliminarTarea($idtarea)
	{
		$sql = "DELETE FROM tarea WHERE idtarea = '$idtarea'";

		$this->db->query($sql);
	}

	public function tareas($id)
	{
		$sql = "SELECT M.materia, T.titulo, T.fecha_creacion, T.nombre_archivo, T.idtarea FROM tarea AS T \n"

    	. "INNER JOIN curso AS C ON T.curso = C.idcurso \n"

    	. "INNER JOIN materia AS M ON T.materia = M.idmateria \n"

    	. "WHERE T.idcreador = '$id'";

		return $this->db->query($sql);
	}
}

?>