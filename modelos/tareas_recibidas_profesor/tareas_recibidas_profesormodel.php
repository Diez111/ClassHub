<?php 

class tareas_recibidas_profesormodel extends model
{
	
	public function __construct() 
	{
		parent::__construct(); //Sirve para que me pomga automaticamente lo que este en el contruct de la clase padre
	}

	public function tareas() //Al crear una nueva tarea se hace esta funcion 
	{
		$sql = "SELECT C.curso, T.titulo, T.fecha_creacion, T.nombre_archivo, T.idtarea FROM tarea AS T \n" //De la tabla tareas se consultan los cursos fechas etc para que luego se ingresen los nuevos datos de forma ordenada

    	. "INNER JOIN curso AS C ON T.curso = C.idcurso \n"  //Agrego en la base de datos cursos el id del curso

    	. "INNER JOIN materia AS M ON T.materia = M.idmateria \n" //Agrego en la base de datos materias 

    	. "WHERE T.rol = '3'"; //El rol es siempre del alumno

		return $this->db->query($sql); //Regresa estos datos a la variable sql
	}
}

?>