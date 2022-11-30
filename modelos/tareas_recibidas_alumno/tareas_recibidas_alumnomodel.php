<?php
defined('BASEPATH') or exit('No se permite acceso directo'); //si la constante esta definida se ejecuta el resto del codigo, sino se detiene la ejecución y tira un mensaje

class tareas_recibidas_alumnomodel extends model //Creamos una clase llamada "tareas_recibidas_alumnomodel" con herencia "model"
{
	public function __construct() //función que se ejecuta al asignarle la clase a un objeto
    {
        parent::__construct(); //hereda o "copia" lo que está en el '__construct' de la clase padre, es decir, la clase 'model'
    }

	public function tareas($id_curso) //función que devuelve información de las tareas
	{
		$sql = "SELECT M.materia, T.titulo, T.descripcion, T.fecha_creacion, U.nombre, T.nombre_archivo, T.idtarea FROM tarea AS T INNER JOIN materia AS M ON T.materia = M.idmateria INNER JOIN usuario AS U ON T.idusuario = U.idusuario WHERE T.curso = '$id_curso' ORDER BY T.idtarea DESC"; //armo la consulta para sacar información de la tabla 'tarea', vinculada con las tablas 'materia' y 'usuario', donde muestra las tareas del curso recibido por parámetro, ordenado por 'idtarea' de forma descendiente

		return $this->db->query($sql); //hace la consulta en la base de datos y retorna la información al controlador
	}
}

?>