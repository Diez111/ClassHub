<?php
defined('BASEPATH') or exit('No se permite acceso directo'); //si la constante esta definida se ejecuta el resto del codigo, sino se detiene la ejecución y tira un mensaje

class loginmodel extends model //Creamos una clase llamada "loginmodel" con herencia "model"
{
	public function __construct() //función que se ejecuta al asignarle la clase a un objeto
    {
        parent::__construct(); //hereda o "copia" lo que está en el '__construct' de la clase padre, es decir, la clase 'model'
    }

	public function signIn($parametros) //función que verifica el usuario y la clave
	{
		$usuario = $this->db->real_escape_string($parametros['usuario']); //saca los caracteres especiales del usuario ingresado
		$clave = md5($this->db->real_escape_string($parametros['clave'])); //saca los caracteres especiales de la clave ingresada, y después la codifica
		$sql = "SELECT * FROM `usuario` WHERE usuario = '{$usuario}' AND clave = '{$clave}'"; //armo la consulta para verificar de que exista un usuario con esa clave
		return $this->db->query($sql); //hace la consulta en la base de datos y retorna la información al controlador
	}

	public function verif_bloqueo($parametros) //función que verifica si el usuario tiene la cuenta bloqueada
	{
		$usuario = $this->db->real_escape_string($parametros['usuario']); //saca los caracteres especiales del usuario ingresado
		$sql = "SELECT * FROM `usuario` WHERE usuario = '{$usuario}' AND estatus = 2"; //armo la consulta para saber si ese usuario tiene la cuenta bloqueada

		if ($this->db->query($sql)->num_rows) { //realizo la consulta y si devuelve algún dato entonces devuelve verdadero
			return true;
		}

		return false; //sino devuelve falso
	}

	public function bloquear($parametros) //función que bloquea la cuenta de un usuario
	{
		$usuario = $parametros['usuario']; //paso el usuario ingresado a una variable
		$sql = "SELECT `intentos` FROM `usuario` WHERE `usuario` = '$usuario'"; //armo la consulta para sacar los intento que tiene para iniciar sesión 
		$query = $this->db->query($sql); //hago la consulta en la base de datos
		
		$intentos = $query->fetch_assoc(); //convierto el resultado de la consulta en un array asociativo

		if ($intentos['intentos'] > 0) { //si los intentos son mayores a 0
			$sql = "UPDATE `usuario` SET `intentos` = {$intentos['intentos']} - 1 WHERE `usuario` = '{$usuario}'"; //armo la consulta para que reduzca en 1 los intentos de ese usuario
			$this->db->query($sql); //hago la consulta en la base de datos
			return false; //retorno falso
		} else { //si son iguales a 0
			$sql = "UPDATE usuario SET estatus = 2 WHERE `usuario` = '{$usuario}'"; //armo la consulta para que marque la cuenta como bloqueada
			$this->db->query($sql); //hago la consulta en la base de datos
			return true; //retorno verdadero
		}
	}

	public function reiniciar($parametros) //función que reinicia los intentos al iniciar sesión correctamente
	{
		$usuario = $this->db->real_escape_string($parametros['usuario']); //saca los caracteres especiales del usuario ingresado
		$sql = "UPDATE usuario SET intentos = 5 WHERE `usuario` = '{$usuario}'"; //armo la consulta para actualizar los intentos de nuevo a 5
		$this->db->query($sql); //hago la consulta en la base de datos
	}
}
?>