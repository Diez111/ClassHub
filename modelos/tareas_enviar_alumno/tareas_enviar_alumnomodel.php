<?php 

class tareas_enviar_alumnomodel extends model
{
	
	public function __construct()
	{
		parent::__construct();//Sirve para que me pomga automaticamente lo que este en el contruct de la clase padre
	}

	public function cursos()
	{
		$sql = "SELECT * FROM curso"; //Toma todo lo que este en la tabla cursos

		return $this->db->query($sql); //Esto lo retorna a la variable que lo solicita
	}

	public function materias()
	{
		$sql = "SELECT * FROM materia"; //Toma todo lo que este en la variable materia

		return $this->db->query($sql);//Esto lo retorna a la variable que lo solicita
	}

	public function enviarTarea($parametros, $fecha, $nom_arch)
	{
		extract($parametros); //Descompone los parametro para analizarlos y poder subirlo en las tablas

		$sql = "INSERT INTO tarea(curso, materia, titulo, fecha_creacion, idcreador, nombre_archivo, rol) VALUES('$curso', '$materia', '$titulo', '$fecha', '$id', '$nom_arch', '$rol')";//En la tabla tarea se sube el curso, materia, titulo, etc con sus correspondientes valores que agrego el usuario o son parte del usuario

		$this->db->query($sql);//Esto lo retorna a la variable que lo solicita
	}

	public function eliminarTarea($idtarea)
	{
		$sql = "DELETE FROM tarea WHERE idtarea = '$idtarea'"; //Se borra la id de la tarea en la tabla tarea

		$this->db->query($sql);//Esto lo retorna a la variable que lo solicita
	}

	public function consulta($idtarea)
	{
		$sql = "SELECT materia, titulo FROM tarea AS T \n" //Se selecciona materia y titulo de la tabla tarea

    	. "WHERE idtarea = '$idtarea'";

		return $this->db->query($sql);//Esto lo retorna a la variable que lo solicita
	}
}

?>