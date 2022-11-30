<?php
defined('BASEPATH') or exit('No se permite acceso directo'); //si la constante esta definida se ejecuta el resto del codigo, sino se detiene la ejecución y tira un mensaje

class chat_privadomodel extends model //Creamos una clase llamada "chat_privadomodel" con herencia "model"
{

    public function __construct() //función que se ejecuta al asignarle la clase a un objeto
    {
        parent::__construct(); //hereda o "copia" lo que está en el '__construct' de la clase padre, es decir, la clase 'model'
    }

    public function mensajes($usuario_id1, $usuario_id2) //función que devuelve los mensajes de un chat entre 2 personas
    {

        $sql = "SELECT C.mensaje, U.nombre FROM chat_privado AS C INNER JOIN usuario AS U ON C.emisor_id = U.idusuario WHERE (C.emisor_id = '{$usuario_id1}' AND C.receptor_id = '{$usuario_id2}') OR (C.emisor_id = '{$usuario_id2}' AND C.receptor_id = '{$usuario_id1}')ORDER BY C.mensaje_id DESC"; //armo la consulta para sacar información de la tabla 'chat privado' y de la tabla vinculada 'usuario' donde en la tabla 'chat_privado' el 'emisor_id' sea igual al primer id recibido por parámetro y el 'receptor_id' sea igual al segundo id recibido por parámetro, o viceversa, y ordenado por 'mensaje id' de forma descendente

        return $this->db->query($sql); //hace la consulta en la base de datos y retorna la información al controlador
    }

    public function enviar_mensaje($parametros) //función que sube los datos de un mensaje a la base de datos
    {
        extract($parametros); //convierto los índices del array en variables independientes

        $sql = "INSERT INTO chat_privado(mensaje, emisor_id, receptor_id) VALUES('$mensaje', '$emisor_id', '$receptor_id')"; //armo la consulta para ingresar valores a las columnas 'mensaje', 'emisor_id' y 'receptor_id' de la tabla 'chat_privado'

        $this->db->query($sql); //hago la consulta en la base de datos
    }

}

?>