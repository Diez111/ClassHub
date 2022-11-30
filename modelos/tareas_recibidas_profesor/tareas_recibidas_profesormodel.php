<?php
defined('BASEPATH') or exit('No se permite acceso directo'); //si la constante esta definida se ejecuta el resto del codigo, sino se detiene la ejecución y tira un mensaje

class tareas_recibidas_profesormodel extends model //Creamos una clase llamada "tareas_recibidas_profesormodel" con herencia "model"
{
	public function __construct() //función que se ejecuta al asignarle la clase a un objeto
    {
        parent::__construct(); //hereda o "copia" lo que está en el '__construct' de la clase padre, es decir, la clase 'model'
    }

	public function tareas($id_usuario) //función que devuelve información de las tareas
	{
		$sql = "SELECT C.curso, T.titulo, A.fecha_enviado, A.nombre_archivo, M.materia, U.nombre FROM tarea_alumnos AS A INNER JOIN curso AS C ON A.curso = C.idcurso INNER JOIN materia AS M ON A.materia = M.idmateria INNER JOIN usuario AS U ON A.idusuario = U.idusuario INNER JOIN tarea AS T ON A.idtarea = T.idtarea WHERE A.idcreador = '$id_usuario' ORDER BY A.idtarea DESC"; //armo la consulta para sacar información de la tabla 'tarea_alumnos', vinculada con las tablas 'curso', 'materia', 'usuario' y 'tarea', donde muestra las tareas enviadas por los alumnos donde el id del creador de la tarea sea del usuario, ordenado por 'idtarea' de forma descendiente

		return $this->db->query($sql); //hace la consulta en la base de datos y retorna la información al controlador
	}
}
?>