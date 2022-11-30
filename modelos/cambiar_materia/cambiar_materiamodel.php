<?php
defined('BASEPATH') or exit('No se permite acceso directo'); //si la constante esta definida se ejecuta el resto del codigo, sino se detiene la ejecución y tira un mensaje

class cambiar_materiamodel extends model //Creamos una clase llamada "cambiar_materiamodel" con herencia "model"
{
	public function __construct() //función que se ejecuta al asignarle la clase a un objeto
    {
        parent::__construct(); //hereda o "copia" lo que está en el '__construct' de la clase padre, es decir, la clase 'model'
    }

	public function consulta($id_materia) //función que devuelve datos de la materia de la base de datos
	{
		$sql = "SELECT materia FROM materia WHERE idmateria = '$id_materia'"; //armo la consulta para sacar información de la tabla 'materia' para sacar el nombre del curso con la id pasada por parámetro

    	return $this->db->query($sql); //hace la consulta en la base de datos y retorna la información al controlador
	}

	public function cambiar_nombre($parametros) //función que actualiza el nombre de una materia
	{
		extract($parametros); //convierto los índices del array en variables independientes
		
		$sql = "UPDATE materia SET materia = '$materia' WHERE idmateria = '$id_materia'"; //armo la consulta para actualizar el nombre de una materia con un cierto id en la tabla 'materia'

		$this->db->query($sql); //hago la consulta en la base de datos
	}
}

?>