<?php 

class tareas_recibidas_profesormodel extends model
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function tareas()
	{
		$sql = "SELECT C.curso, T.titulo, T.fecha_creacion, T.nombre_archivo, T.idtarea FROM tarea AS T \n"

    	. "INNER JOIN curso AS C ON T.curso = C.idcurso \n"

    	. "INNER JOIN materia AS M ON T.materia = M.idmateria \n"

    	. "WHERE T.rol = '3'";

		return $this->db->query($sql);
	}
}

?>