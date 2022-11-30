<?php
defined('BASEPATH') or exit('No se permite acceso directo'); //si la constante esta definida se ejecuta el resto del codigo, sino se detiene la ejecución y tira un mensaje

class iniciomodel extends model //Creamos una clase llamada "iniciomodel" con herencia "model"
{
	public function __construct() //función que se ejecuta al asignarle la clase a un objeto
    {
        parent::__construct(); //hereda o "copia" lo que está en el '__construct' de la clase padre, es decir, la clase 'model'
    }

	public function crearNoticia($parametros, $fecha, $nom_arch) //función para cargar los datos de una noticia a la base de datos
	{
		extract($parametros); //convierto los índices del array en variables independientes

		$sql = "INSERT INTO noticias(titulo, contenido, fecha_subido, nombre_archivo, idusuario) VALUES('$titulo', '$contenido', '$fecha', '$nom_arch', '$id_usuario')"; //armo la consulta para ingresar datos a la tabla 'noticias'

		$this->db->query($sql); //hago la consulta en la base de datos
	}

	public function noticias() //función para devolver la información de las noticias
	{
		$sql = "SELECT N.titulo, N.contenido, N.nombre_archivo, U.nombre FROM noticias AS N INNER JOIN usuario AS U ON N.idusuario = U.idusuario ORDER BY N.idnoticia DESC"; //armo la consulta para sacar la información de la tabla 'noticias', vinculada con la tabla 'usuario', ordenado por 'idnoticia' de forma descendente

		return $this->db->query($sql); //hace la consulta en la base de datos y retorna la información al controlador
	}

	public function cursos() //función para devolver información de los cursos
    {
        $sql = "SELECT * FROM curso"; //armo la consulta para sacar toda la información de la tabla 'curso'

        return $this->db->query($sql); //hace la consulta en la base de datos y retorna la información al controlador
    }
}
?>