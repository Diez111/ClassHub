<?php
defined('BASEPATH') or exit('No se permite acceso directo'); //si la constante esta definida se ejecuta el resto del codigo, sino se detiene la ejecución y tira un mensaje

class tareas_enviar_alumnomodel extends model //Creamos una clase llamada "tareas_enviar_alumnomodel" con herencia "model"
{
	public function __construct() //función que se ejecuta al asignarle la clase a un objeto
    {
        parent::__construct(); //hereda o "copia" lo que está en el '__construct' de la clase padre, es decir, la clase 'model'
    }

	public function enviarTarea($parametros, $fecha, $nom_arch) //función para subir los datos de una tarea
	{
		extract($parametros); //convierto los índices del array en variables independientes

		$sql = "INSERT INTO tarea_alumnos(idtarea, curso, materia, fecha_enviado, nombre_archivo, idusuario, idcreador) VALUES('$idtarea', '$curso', '$materia', '$fecha', '$nom_arch', '$id_usuario', '$id_creador')"; //armo la consulta para ingresar datos a la tabla 'tarea'

		$this->db->query($sql); //hago la consulta en la base de datos
	}

	public function consulta($idtarea) //función que devuelve información de una tarea
	{
		$sql = "SELECT materia, idusuario FROM tarea AS T WHERE idtarea = '$idtarea'"; //armo la consulta para sacar información de la tabla 'tarea' donde 'idtarea' sea igual a la id de la tarea recibida como parámetro

		return $this->db->query($sql); //hace la consulta en la base de datos y retorna la información al controlador
	}
}

?>