<?php
defined('BASEPATH') or exit('No se permite acceso directo'); //si la constante esta definida se ejecuta el resto del codigo, sino se detiene la ejecución y tira un mensaje

class cambiar_cursomodel extends model //Creamos una clase llamada "cambiar_cursomodel" con herencia "model"
{
	public function __construct() //función que se ejecuta al asignarle la clase a un objeto
    {
        parent::__construct(); //hereda o "copia" lo que está en el '__construct' de la clase padre, es decir, la clase 'model'
    }

	public function consulta($id_curso) //función que devuelve datos del curso de la base de datos
	{
		$sql = "SELECT curso FROM curso WHERE idcurso = '$id_curso'"; //armo la consulta para sacar información de la tabla 'curso' para sacar el nombre del curso con la id pasada por parámetro

    	return $this->db->query($sql); //hace la consulta en la base de datos y retorna la información al controlador
	}

	public function cambiar_nombre($parametros) //función que actualiza el nombre de un curso
	{
		extract($parametros); //convierto los índices del array en variables independientes
		
		$sql = "UPDATE curso SET curso = '$curso' WHERE idcurso = '$id_curso'"; //armo la consulta para actualizar el nombre de un curso con un cierto id en la tabla 'curso'

		$this->db->query($sql); //hago la consulta en la base de datos
	}
}

?>