<?php
defined('BASEPATH') or exit('No se permite acceso directo'); //si la constante esta definida se ejecuta el resto del codigo, sino se detiene la ejecución y tira un mensaje

class crear_cursomodel extends model //Creamos una clase llamada "crear_cursomodel" con herencia "model"
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

	public function crear_curso($parametros) //función que crea un nuevo curso en la base de datos
	{
		extract($parametros); //convierto los índices del array en variables independientes

		$sql = "INSERT INTO curso (curso) VALUES ('$curso')"; //armo la consulta para ingresar los datos a la tabla 'curso'

		$this->db->query($sql); //hago la consulta en la base de datos
	}
}
?>