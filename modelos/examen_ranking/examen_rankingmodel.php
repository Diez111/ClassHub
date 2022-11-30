<?php
defined('BASEPATH') or exit('No se permite acceso directo'); //si la constante esta definida se ejecuta el resto del codigo, sino se detiene la ejecución y tira un mensaje

class examen_rankingmodel extends model //Creamos una clase llamada "examen_rankingmodel" con herencia "model"
{
	public function __construct() //función que se ejecuta al asignarle la clase a un objeto
    {
        parent::__construct(); //hereda o "copia" lo que está en el '__construct' de la clase padre, es decir, la clase 'model'
    }

	public function notas($idusuario) //función que devuelve la información de las notas
	{
		$sql = "SELECT N.nota, T.test_name, M.materia FROM exam_notas AS N INNER JOIN exam_test AS T ON N.test_id = T.test_id INNER JOIN materia AS M ON M.idmateria = N.materia_id WHERE N.user_id = '$idusuario' ORDER BY N.nota_id DESC"; //armo la consulta para sacar información de la tabla 'exam_notas' vinculada con las tablas 'exam_test' y 'materia', donde 'user_id' sea igual a la id del usuario, ordenado por 'nota_id' de forma descendente

		return $this->db->query($sql); //hace la consulta en la base de datos y retorna la información al controlador
	}
}

?>