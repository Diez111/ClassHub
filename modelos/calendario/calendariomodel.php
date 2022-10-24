<?php 

class calendariomodel extends model   //clase calendariomodel con la herencia model
{
    public function __construct() // le pone automaticamente lo que este en el construct de la clase padre
    {
        parent::__construct();  //pone automaticamente lo que este en el construct de la clase padre
    }

    public function crearevento($parametros)
    {
        extract($parametros); //descompongo los datos de la variable parametros

        $sql = "INSERT INTO eventos(titulo, contenido) VALUES('$titulo', '$contenido')"; //cargo en la bd en la tabla eventos el titulo y conetenido nuevos

        $this->db->query($sql);
    }

    public function eventos()
    {
        $sql = "SELECT * FROM eventos ORDER BY ideventos DESC"; //Todos los eventos se muestran en orden desendente 

        return $this->db->query($sql); //Manda estos datos a la variable sql para mostrarlos
    }
}

?>