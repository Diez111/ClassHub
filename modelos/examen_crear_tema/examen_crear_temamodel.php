<?php 
class examen_crear_temamodel extends model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function agregarTema ($tema){
        $sql = "INSERT INTO `exam_subject`(tema) VALUES ('$tema')";
        $this->db->query($sql);

    }
}
?>