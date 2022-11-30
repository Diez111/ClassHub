<?php
defined('BASEPATH') or exit('No se permite acceso directo'); //si la constante esta definida se ejecuta el resto del codigo, sino se detiene la ejecución y tira un mensaje

class chat_publicomodel extends model //Creamos una clase llamada "chat_publicomodel" con herencia "model"
{
	public function __construct() //función que se ejecuta al asignarle la clase a un objeto
    {
        parent::__construct(); //hereda o "copia" lo que está en el '__construct' de la clase padre, es decir, la clase 'model'
    }

	public function mensajes($idcurso) //función que devuelve los mensajes de los integrantes de un curso
	{
		$sql = "SELECT P.mensaje, U.nombre FROM chat_publico AS P INNER JOIN usuario AS U ON P.usuario_id = U.idusuario WHERE P.curso_id = '$idcurso' ORDER BY P.mensaje_id DESC"; //armo la consulta para sacar información de la tabla 'chat publico' y la tabla vinculada 'usuario' donde en la tabla 'chat_público' el 'curso_id' sea igual al 'idcurso' pasado por parametro y ordenado por 'mensaje_id' de forma descendente

		return $this->db->query($sql);  //hace la consulta en la base de datos y retorna la información al controlador
	}

	public function enviar_mensaje($parametros) //función que sube los datos de un mensaje a la base de datos
	{
		extract($parametros); //convierto los índices del array en variables independientes

		$sql = "INSERT INTO chat_publico(mensaje, usuario_id, curso_id) VALUES('$mensaje', '$usuario_id', '$curso_id')"; //armo la consulta para ingresar valores a las columnas 'mensaje', 'usuario_id' y 'curso_id' de la tabla 'chat_publico'
		
		$this->db->query($sql); //hago la consulta en la base de datos
	}

}

?>