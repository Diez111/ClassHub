<?php
defined('BASEPATH') or exit('No se permite acceso directo'); //si la constante esta definida se ejecuta el resto del codigo, sino se detiene la ejecución y tira un mensaje

class tareas_enviadas_alumnomodel extends model //Creamos una clase llamada "tareas_enviadas_alumnomodel" con herencia "model"
{
	
	public function __construct() //función que se ejecuta al asignarle la clase a un objeto
    {
        parent::__construct(); //hereda o "copia" lo que está en el '__construct' de la clase padre, es decir, la clase 'model'
    }

	public function eliminarTarea($idrespuesta) //función para eliminar los datos de una tarea
	{
		$sql = "DELETE FROM tarea_alumnos WHERE idrespuesta = '$idrespuesta'"; //armo la consulta para borrar los datos de la tarea con la id que recibimos por parámetro

		$this->db->query($sql); //hago la consulta en la base de datos
	}

	public function tareas($id_alumno) //función que devuelve la información de las tareas enviadas por un alumno
	{
		$sql = "SELECT M.materia, T.titulo, A.fecha_enviado, A.nombre_archivo, A.idrespuesta FROM tarea_alumnos AS A INNER JOIN materia AS M ON A.materia = M.idmateria INNER JOIN tarea AS T ON A.idtarea = T.idtarea WHERE A.idusuario = '$id_alumno' ORDER BY A.idtarea DESC"; //armo la consulta para sacar información de la tabla 'tarea_alumnos', vinculada con las tablas 'materia' y 'tarea', donde 'idalumno' sea igual al id del usuario que recibimos por parámetro, ordenado por 'idtarea' de forma descendiente

		return $this->db->query($sql); //hace la consulta en la base de datos y retorna la información al controlador
	}
}

?>