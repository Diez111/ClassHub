<?php
defined('BASEPATH') or exit('No se permite acceso directo'); //si la constante esta definida se ejecuta el resto del codigo, sino se detiene la ejecución y tira un mensaje

class recuperar_contramodel extends model //Creamos una clase llamada "recuperar_contramodel" con herencia "model"
{
	public function __construct() //función que se ejecuta al asignarle la clase a un objeto
    {
        parent::__construct(); //hereda o "copia" lo que está en el '__construct' de la clase padre, es decir, la clase 'model'
    }

	public function consulta() //función para devolver el correo de un usuario
	{
		$sql = "SELECT correo FROM usuario WHERE idusuario = '1'"; //armo la consulta para sacar el correo de la tabla 'usuario', del usuario con la id 1

    	return $this->db->query($sql); //hace la consulta en la base de datos y retorna la información al controlador
	}
}
?>