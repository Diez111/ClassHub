<?php
defined('BASEPATH') or exit('No se permite acceso directo'); //si la constante esta definida se ejecuta el resto del codigo, sino se detiene la ejecución y tira un mensaje

class calendariomodel extends model //Creamos una clase llamada "calendariomodel" con herencia "model"
{
    public function __construct() //función que se ejecuta al asignarle la clase a un objeto
    {
        parent::__construct(); //hereda o "copia" lo que está en el '__construct' de la clase padre, es decir, la clase 'model'
    }

    public function crear_evento($parametros) //función que sube los datos de un evento a la base de datos
    {
        extract($parametros); //convierto los índices del array en variables independientes

        $sql = "INSERT INTO eventos(titulo, contenido, idusuario) VALUES('$titulo', '$contenido', '$id_usuario')"; //armo la consulta SQL, voy a ingresar valores a las columnas 'titulo' y 'contenido' de la tabla 'eventos'

        $this->db->query($sql); //hago la consulta en la base de datos
    }

    public function eventos() //función que devuelve la información de los eventos en la base de datos
    {
        $sql = "SELECT E.titulo, E.contenido, U.nombre FROM eventos AS E INNER JOIN usuario AS U ON E.idusuario = U.idusuario ORDER BY E.ideventos DESC"; //armo la consulta SQL, pido los datos de la tabla 'eventos', vinculada con la tabla 'usuario', ordenados de forma descendente por los valores de la columna 'ideventos'

        return $this->db->query($sql); //hace la consulta en la base de datos y retorna la información al controlador
    }
}
?>