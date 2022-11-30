<?php
defined('BASEPATH') or exit('No se permite acceso directo'); //si la constante esta definida se ejecuta el resto del codigo, sino se detiene la ejecución y tira un mensaje

class chat_menumodel extends model //Creamos una clase llamada "chat_menumodel" con herencia "model"
{
	public function __construct() //función que se ejecuta al asignarle la clase a un objeto
    {
        parent::__construct(); //hereda o "copia" lo que está en el '__construct' de la clase padre, es decir, la clase 'model'
    }

	public function chats_publicos($rol, $cursos) //función que devuelve la información de los chats públicos segun el rol y cursos del usuario
	{
		//lo que hace esto es armar la consulta SQL segun el rol y la id de los cursos en los que esté el usuario

		if ($rol == 1) { //si el usuario es del rol 1(admin)
			$sql = "SELECT * FROM curso"; //se arma la consulta para obtener toda la información de todos los cursos
		} else {

			//sino se arma la consulta para obtener toda la información de los cursos en los que esté el usuario
			$array_cursos = explode('-', $cursos);
			$sql = 'SELECT * FROM curso WHERE ';
		
			for ($i=1; $i < 100; $i++) {
				if (isset($array_cursos[$i])) {

					$n = $array_cursos[$i];
					$sql .= 'idcurso = ' . '\'' . $n . '\'';

					if (isset($array_cursos[$i+1])) {
						$sql .= ' OR ';
					}
				} else {
					break;
				}
			}
		}
		
		return $this->db->query($sql); //hace la consulta en la base de datos y retorna la información al controlador
	}

	public function administradores($idusuario) //función que devuelve la información de los administradores
	{
		$sql = "SELECT nombre, idusuario FROM usuario WHERE rol = '1' AND NOT idusuario = '$idusuario'"; //armo la consulta SQL, pido 'nombre' e 'idusuario' de la tabla 'usuario' donde el rol sea 1 y la id de usuario no sea igual a la pasada por parámetro(la del mismo usuario)

		return $this->db->query($sql); //hace la consulta en la base de datos y retorna la información al controlador
	}

	public function profesores($idusuario, $rol, $cursos) //función que devuelve la información de los profesores
	{
		if ($rol != 3) { //si el rol es diferente de 3(alumno)
			$sql = "SELECT nombre, idusuario FROM usuario WHERE rol = '2' AND NOT idusuario = '$idusuario'"; //armo la consulta para sacar la información de la tabla 'usuario' donde el rol sea 2(profesor) y la id de usuario no sea igual a la pasada por parámetro(la del mismo usuario)
		} else {
			$sql = "SELECT nombre, idusuario FROM usuario WHERE rol = '2' AND cursos LIKE '%{$cursos}%'"; //sino armo la consulta para sacar la información de la tabla 'usuario' donde el rol sea 2(profesor) y el valor en la columna 'cursos' tenga lo que esté en la variable 'cursos' pasada por parámetro
		}

		return $this->db->query($sql); //hace la consulta en la base de datos y retorna la información al controlador
	}

	public function alumnos($idusuario, $rol, $cursos) //función que devuelve la información de los alumnos
	{
		if ($rol == 3) { //si el rol es igual a 3(alumno)
			$sql = "SELECT nombre, idusuario FROM usuario WHERE cursos LIKE '%{$cursos}%' AND rol = '3' AND NOT idusuario = '$idusuario'"; //armo la consulta para sacar la información de la tabla 'usuario' donde el rol sea 3(alumno), la id de usuario no sea igual a la pasada por parámetro(la del mismo usuario) y el valor en la columna 'cursos' tenga lo que esté en la variable 'cursos' pasada por parámetro
		} else if ($rol == 2){ //si el rol es igual a 2(profesores)

			//armo la consulta para sacar la información de la tabla 'usuario' donde el rol sea 3(alumno) y el valor en la columna 'cursos' tenga lo que esté en tal índice del array 'cursos_separados'
			$cursos_separados = explode('-', $cursos);
			$sql = "SELECT nombre, idusuario FROM usuario WHERE rol = '3' AND (";

			for ($i=1; $i < 15; $i++) {
				if (isset($cursos_separados[$i])) {
					$sql .= "cursos LIKE '%{$cursos_separados[$i]}%'";

					if (isset($cursos_separados[$i+1])) { 
						$sql .= " OR ";
					}
				} else {
					break;
				}
			}

			$sql .= ")";

		} else { //si el rol es 1(admin)
			$sql = "SELECT nombre, idusuario FROM usuario WHERE rol = '3'"; //armo la consulta para sacar información de la tabla 'usuario' donde el rol sea igual a 3(alumno)
		}

		return $this->db->query($sql); //hace la consulta en la base de datos y retorna la información al controlador
	}
}

?>