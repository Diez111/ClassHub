<?php
defined('BASEPATH') or exit('No se permite acceso directo'); //si la constante esta definida se ejecuta el resto del codigo, sino se detiene la ejecución y tira un mensaje

class editar_usuariomodel extends model //Creamos una clase llamada "editar_usuariomodel" con herencia "model"
{
	public function __construct() //función que se ejecuta al asignarle la clase a un objeto
    {
        parent::__construct(); //hereda o "copia" lo que está en el '__construct' de la clase padre, es decir, la clase 'model'
    }

	public function consulta($id_usuario) //función que devuelve datos de los usuarios de la base de datos
	{
		$sql = "SELECT nombre, correo, usuario, rol, cursos, idusuario, estatus FROM `usuario` WHERE idusuario = '$id_usuario'"; //armo la consulta para sacar información de la tabla 'usuario' donde 'idusuario' sea igual a la id recibida por parámetro

    	return $this->db->query($sql); //hace la consulta en la base de datos y retorna la información al controlador
	}

	public function cursos() //función que devuelve la información de los cursos
	{
		$sql = "SELECT * FROM curso"; //armo la consulta para sacar toda la información de la tabla 'curso'

    	return $this->db->query($sql); //hace la consulta en la base de datos y retorna la información al controlador
	}

	public function Update($parametros, $cursos) //función que actualiza los datos de un usuario
	{
		extract($parametros); //convierto los índices del array en variables independientes
		
		if ($clave == '') { //si no se paso ninguna clave nueva
			$sql = "UPDATE `usuario` SET nombre = '$nombre', correo = '$correo', usuario = '$usuario', rol = '$rol', cursos = '$cursos', estatus = '$estado', intentos = '5' WHERE idusuario = '$id_usuario'"; //armo la consulta para actualizar los datos de la tabla 'usuario' donde la 'idusuario' sea igual a la id pasada por parámetro
		} else {
			$clave = md5($clave); //si se pasó una clave nueva, la codifico antes de subirla a la base
			$sql = "UPDATE `usuario` SET nombre = '$nombre', correo = '$correo', usuario = '$usuario', clave = '$clave', rol = '$rol', cursos = '$cursos', estatus = '$estado', intentos = '5' WHERE idusuario = '$id_usuario'"; //armo la misma consulta pero agrego la clave en los datos a actualizar
		}

		$this->db->query($sql); //hago la consulta en la base de datos
	}

	public function ultimo_curso() //función que me devuelve la cantidad de cursos
	{
		$sql = "SELECT idcurso FROM curso ORDER BY idcurso DESC LIMIT 1"; //armo la consulta para que ordene las IDs de los cursos de forma descendente y que agarre solo el primero, siendo ese el número de cursos

		return $this->db->query($sql); //hace la consulta en la base de datos y retorna la información al controlador
	}
}

?>