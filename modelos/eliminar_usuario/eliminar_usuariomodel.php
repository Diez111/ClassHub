<?php
defined('BASEPATH') or exit('No se permite acceso directo'); //si la constante esta definida se ejecuta el resto del codigo, sino se detiene la ejecución y tira un mensaje

class eliminar_usuariomodel extends model //Creamos una clase llamada "elimiar_usuariomodel" con herencia "model"
{
	 
	public function __construct() //función que se ejecuta al asignarle la clase a un objeto
    {
        parent::__construct(); //hereda o "copia" lo que está en el '__construct' de la clase padre, es decir, la clase 'model'
    }

	public function consulta($id) //función que devuelve la información de un usuario
	{
		$sql = "SELECT U.idusuario, U.nombre, U.usuario, R.rol FROM `usuario` AS U INNER JOIN rol AS R ON U.rol = R.idrol WHERE U.idusuario = '$id'"; //armo la consulta para sacar información de la tabla 'usuario' y la tabla vinculada 'rol' donde 'idusuario' sea igual a la id pasada por parámetro

    	return $this->db->query($sql); //hace la consulta en la base de datos y retorna la información al controlador
	}

	public function Eliminar_usuario($parametros) //función que elimina la información de un usuario
	{
		extract($parametros); //convierto los índices del array en variables independientes

		$sql = "DELETE FROM `usuario` WHERE idusuario = '$idusuario'"; //eliminamos la información de la tabla 'usuario' donde 'idusuario' sea igual a la id pasada por parámetro

		$this->db->query($sql); //hago la consulta en la base de datos
	}
}

?>