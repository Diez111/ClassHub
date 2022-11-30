<?php
defined('BASEPATH') or exit('No se permite acceso directo'); //si la constante esta definida se ejecuta el resto del codigo, sino se detiene la ejecución y tira un mensaje

class eliminar_basemodel extends model //Creamos una clase llamada "elimiar_basemodel" con herencia "model"
{
	 
	public function __construct() //función que se ejecuta al asignarle la clase a un objeto
    {
        parent::__construct(); //hereda o "copia" lo que está en el '__construct' de la clase padre, es decir, la clase 'model'
    }

	public function eliminar_base() //función que elimina la información de un usuario
	{
		$sql = "DROP DATABASE classhub"; //eliminamos completamente la base de datos

		$this->db->query($sql); //hago la consulta en la base de datos
	}
}

?>