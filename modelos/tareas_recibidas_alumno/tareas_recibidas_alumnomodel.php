<?php 

class tareas_recibidas_alumnomodel extends model
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function tareas()
	{
		$sql = "SELECT T.idtarea, C.curso, M.materia, T.titulo, T.descripcion, T.fecha_creacion, U.nombre, T.nombre_archivo FROM tarea AS T \n"

    	. "INNER JOIN curso AS C ON T.curso = C.idcurso \n"

    	. "INNER JOIN materia AS M ON T.materia = M.idmateria \n"

    	. "INNER JOIN usuario AS U ON T.idcreador = U.idusuario \n"

    	. "WHERE NOT T.rol = '3'";

		return $this->db->query($sql);
	}
}

?>