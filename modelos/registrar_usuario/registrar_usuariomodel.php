<?php
defined('BASEPATH') or exit('No se permite acceso directo'); //si la constante esta definida se ejecuta el resto del codigo, sino se detiene la ejecución y tira un mensaje
 
class registrar_usuariomodel extends model //Creamos una clase llamada "registrar_usuariomodel" con herencia "model"
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

	public function nuevo_usuario($datos, $cursos) //función para agregar los datos de un nuevo usuario
	{ 
		extract($datos); //convierto los índices del array en variables independientes

		$clave = md5($clave); //codificamos la clave ingresada

		$sql = "INSERT INTO usuario(nombre, correo, usuario, clave, rol, cursos) VALUES('$nombre','$correo','$usuario','$clave','$rol','$cursos')"; //armo la consulta para ingresar los datos a la tabla 'usuario'

		$this->db->query($sql); //hago la consulta en la base de datos
	}

	public function ultimo_curso() //función que me devuelve la cantidad de cursos
	{
		$sql = "SELECT idcurso FROM curso ORDER BY idcurso DESC LIMIT 1"; //armo la consulta para que ordene las IDs de los cursos de forma descendente y que agarre solo el primero, siendo ese el número de cursos

		return $this->db->query($sql); //hace la consulta en la base de datos y retorna la información al controlador
	}
}

?>