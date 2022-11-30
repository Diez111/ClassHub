<?php
defined('BASEPATH') or exit('No se permite acceso directo'); //si la constante esta definida se ejecuta el resto del codigo, sino se detiene la ejecución y tira un mensaje

class lista_usuariosmodel extends model //Creamos una clase llamada "lista_usuariosmodel" con herencia "model"
{
	public function __construct() //función que se ejecuta al asignarle la clase a un objeto
    {
        parent::__construct(); //hereda o "copia" lo que está en el '__construct' de la clase padre, es decir, la clase 'model'
    }

	public function consulta() //función para devolver la información de los usuarios
	{
		$sql = "SELECT U.idusuario, U.nombre, U.correo, U.usuario, R.rol FROM `usuario` AS U INNER JOIN `rol` AS R ON U.rol = R.idrol ORDER BY U.rol ASC"; //armo la consulta para sacar información de la tabla 'usuario' vinculada con la tabla 'rol', ordenado por 'rol' de forma ascendente

    	return $this->db->query($sql); //hace la consulta en la base de datos y retorna la información al controlador
	}
}
?>