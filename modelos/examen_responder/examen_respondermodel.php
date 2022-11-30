<?php
defined('BASEPATH') or exit('No se permite acceso directo'); //si la constante esta definida se ejecuta el resto del codigo, sino se detiene la ejecución y tira un mensaje

class examen_respondermodel extends model //Creamos una clase llamada "examen_respondermodel" con herencia "model"
{
	public function __construct() //función que se ejecuta al asignarle la clase a un objeto
    {
        parent::__construct(); //hereda o "copia" lo que está en el '__construct' de la clase padre, es decir, la clase 'model'
    }

	public function datosPrueba($idprueba) //función que devuelve los datos de una prueba
	{
		$sql = "SELECT quest_desc, ans1, ans2, ans3, ans4, res_correct FROM exam_question WHERE test_id = '$idprueba' ORDER BY quest_id ASC"; //armo la consulta para sacar la información de la tabla 'exan_question' donde 'test_id' sea igual a la id de la prueba recibida por parámetro, ordenado por 'quest_id' de forma ascendente

		return $this->db->query($sql); //hace la consulta en la base de datos y retorna la información al controlador
	}

	public function materia($idprueba) //función que devuelve los datos de la materia
	{
		$sql = "SELECT idmateria FROM exam_test WHERE test_id = '$idprueba'"; //armo la consulta para sacar la información de la tabla 'exam_test' donde 'test_id' sea igual a la id de la prueba recibida por parámetro

		return $this->db->query($sql); //hace la consulta en la base de datos y retorna la información al controlador
	}

	public function verificar_intento($id_prueba, $id_usuario) //función para verificar que sea el primer intento al hacer la prueba
	{
		$sql = "SELECT nota FROM exam_notas WHERE test_id = '$id_prueba' AND user_id = '$id_usuario'"; //armo la consulta para sacar la información de 'exam_notas' donde 'test_id' sea igual a la id de la prueba recibida por parámetro y 'user_id' sea igual a la id del usuario

		$query = $this->db->query($sql); //hago la consulta en la base de datos

		if ($query->num_rows) //si la consulta devuelve resultados diferentes a nulo
		{
			return false; //retorna falso
		} else {
			return true; //sino retorna verdadero
		}
	}

	public function corregir_prueba($parametros) //función que corrige las respuestas del usuario de una prueba
	{
		extract($parametros); //convierto los índices del array en variables independientes

		$sql = "SELECT res_correct FROM exam_question WHERE test_id = '$id_prueba' ORDER BY quest_id ASC"; //armo la consulta para sacar las respuestas correctas de la prueba en 'exam_question', y las ordeno de forma ascendente por 'quest_id'

		$query_respuestas = $this->db->query($sql); //hago la consulta en la base de datos y la guardo en una variable

		$contador1 = 0; //cuenta las respuestas
		$contador2 = 0; //cuenta las respuestas correctas
		$string = 'respuesta';
		$n = 1;

		//veo si las respuestas del usuario son iguales a las correctas, y cuento las respuestas correctas del usuario y la cantidad de preguntas de la prueba
		while ($datos = $query_respuestas->fetch_assoc()) {
			$string .= $n;
			$resp_usuario = $parametros[$string];
			$resp_correcta = $datos['res_correct'];

			if ($resp_usuario == $resp_correcta) {
				$contador2++;
			}
			
			$contador1++;
			$string = 'respuesta';
			$n++;
		}
		$nota = $contador2 . '/' . $contador1;

		$sql = "INSERT INTO exam_notas(test_id, user_id, nota, materia_id) VALUES ('$id_prueba', '$id_usuario', '$nota', '$id_materia')"; //armo la consulta para ingresar datos a la tabla 'exam_notas'

		$this->db->query($sql); //hago la consulta en la base de datos
	}
}

?>