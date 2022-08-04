<?php 
class examen_crear_pruebamodel extends model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function consulta (){
        $sql = "SELECT tema FROM `exam_subject`";

        return $this->db->query($sql);

    }

    public function agregarTest($parametros){
        extract($parametros);
        $sql = "SELECT idtema FROM `exam_subject` WHERE tema = '$nom_tema'";
        $query = $this->db->query($sql);
        $dato = $query->fetch_assoc();
        
        $idtema = $dato['idtema'];

        $sql = "INSERT INTO `exam_test`(idtema, test_name, total_que) VALUES ('$idtema', '$nom_prueba', '$cant_quest')";
        $this->db->query($sql);
    }
}
?>