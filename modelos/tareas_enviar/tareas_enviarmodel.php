<?php
defined('BASEPATH') or exit('No se permite acceso directo'); //si la constante esta definida se ejecuta el resto del codigo, sino se detiene la ejecución y tira un mensaje

class tareas_enviarmodel extends model //Creamos una clase llamada "tareas_enviarmodel" con herencia "model"
{
	public function __construct() //función que se ejecuta al asignarle la clase a un objeto
    {
        parent::__construct(); //hereda o "copia" lo que está en el '__construct' de la clase padre, es decir, la clase 'model'
    }

	public function cursos() //función que devuelve la información de los cursos
	{
		$sql = "SELECT * FROM curso"; //armo la consulta para sacar toda la información de la tabla 'curso'
		return $this->db->query($sql); //hace la consulta en la base de datos y retorna la información al controlador
	}

	public function materias() //función que devuelve la información de las materias
	{
		$sql = "SELECT * FROM materia"; //armo la consulta para sacar toda la información de la tabla 'materia'
		return $this->db->query($sql); //hace la consulta en la base de datos y retorna la información al controlador
	}

	public function crearTarea($parametros, $fecha, $nom_arch) //función para subir los datos de una tarea
	{
		extract($parametros); //convierto los índices del array en variables independientes

		$sql = "INSERT INTO tarea(curso, materia, titulo, descripcion, fecha_creacion, nombre_archivo, idusuario) VALUES('$curso', '$materia', '$nom_tarea', '$desc_tarea', '$fecha', '$nom_arch', '$id_usuario')"; //armo la consulta para ingresar datos a la tabla 'tarea'
		
		$this->db->query($sql); //hago la consulta en la base de datos
	}

	public function eliminarTarea($idtarea) //función para eliminar los datos una tarea
	{
		$sql = "DELETE FROM tarea WHERE idtarea = '$idtarea'"; //armo la consulta para borrar los datos de la tarea con la id que recibimos por parámetro
		$this->db->query($sql); //hago la consulta en la base de datos
	}

	public function tareas($id_usuario) //función para ver las tareas enviadas por el usuario
	{
		$sql = "SELECT C.curso, M.materia, T.titulo, T.descripcion, T.fecha_creacion, T.nombre_archivo, T.idtarea FROM tarea AS T INNER JOIN curso AS C ON T.curso = C.idcurso INNER JOIN materia AS M ON T.materia = M.idmateria WHERE T.idusuario = '$id_usuario' ORDER BY T.idtarea DESC"; //armo la consulta para sacar la información de la tabla 'tarea', vinculada a las tablas 'curso' y 'materia', donde solo toma las tareas enviadas por el usuario y donde el rol no sea 3(alumno), ordenado por 'idtarea' de forma descendente 

		return $this->db->query($sql); //hace la consulta en la base de datos y retorna la información al controlador 
	}
}

?>