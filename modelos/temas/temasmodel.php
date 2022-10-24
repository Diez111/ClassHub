<?php 

class temasmodel extends model  //clase temasmodel con la herencia model
{
    
    public function __construct() //Este método se llama automáticamente cuando se crea un objeto
    {
        parent::__construct(); //pone automaticamente lo que este en el construct de la clase padre
    }

    public function Update($parametros, $id) //esta funcion solo actualiza los datos de la base de datos ya que no se pueden agregar los temas y por seguridad se le da esta propiedad enves de sobrescribir
    {
        extract($parametros); //descompongo los datos que solicito desde el controller

        $sql = "UPDATE usuario SET temavis = '{$temavis}' WHERE idusuario = '$id'"; //La consulta sql para actualizar en la tabla usuarios tema del id del usuario

        $this->db->query($sql); //La conexion con la bd
    }
}

?>