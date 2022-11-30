<?php
defined('BASEPATH') or exit('No se permite acceso directo'); //si la constante esta definida se ejecuta el resto del codigo, sino se detiene la ejecución y tira un mensaje

class temasmodel extends model //Creamos una clase llamada "temasmodel" con herencia "model"
{
    public function __construct() //función que se ejecuta al asignarle la clase a un objeto
    {
        parent::__construct(); //hereda o "copia" lo que está en el '__construct' de la clase padre, es decir, la clase 'model'
    }

    public function Update($parametros, $id) //función para actualizar el tema de fondo del usuario
    {
        extract($parametros); //convierto los índices del array en variables independientes

        $sql = "UPDATE usuario SET temavis = '{$temavis}' WHERE idusuario = '$id'"; //armo la consulta para actualizar el dato 'temavis' en 'usuario' que tenga la id pasada por parámetro

        $this->db->query($sql); //hago la consulta en la base de datos
    }
}

?>