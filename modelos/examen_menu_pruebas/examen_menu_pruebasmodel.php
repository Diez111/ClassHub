<?php
defined('BASEPATH') or exit('No se permite acceso directo'); //si la constante esta definida se ejecuta el resto del codigo, sino se detiene la ejecución y tira un mensaje

class examen_menu_pruebasmodel extends model //Creamos una clase llamada "examen_menu_pruebasmodel" con herencia "model"
{
	public function __construct() //función que se ejecuta al asignarle la clase a un objeto
    {
        parent::__construct(); //hereda o "copia" lo que está en el '__construct' de la clase padre, es decir, la clase 'model'
    }

	public function pruebas($id_curso) //función que devuelve los datos de las pruebas
	{
		$sql = "SELECT M.materia, E.test_name, E.test_id FROM exam_test AS E INNER JOIN materia AS M ON M.idmateria = E.idmateria WHERE idcurso = '$id_curso' ORDER BY E.test_id DESC"; //armo la consulta para pedir información de la tabla 'exam_test' vinculada con 'materia' donde 'idcurso' sea igual a la id pasada como parámetro y ordenado por 'test_id' de forma descendente

    	return $this->db->query($sql); //hace la consulta en la base de datos y retorna la información al controlador
	}
}

?>