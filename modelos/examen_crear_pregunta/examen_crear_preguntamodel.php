<?php 
class examen_crear_preguntamodel extends model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function consulta(){
        $sql = "SELECT test_name FROM `exam_test`";

        return $this->db->query($sql);
    }
    public function agregarPregunta($parametros){
        extract($parametros);

        $sql = "SELECT test_id FROM `exam_test` WHERE test_name = '$nom_tema'";
        $query = $this->db->query($sql);
        $dato = $query->fetch_assoc();

        $test_id = $dato['test_id'];

        $sql = "INSERT INTO exam_question(test_id, quest_desc, ans1, ans2, ans3, ans4, res_correct) VALUES('$test_id', '$nom_pregunta', '$nom_respuesta1', '$nom_respuesta2', '$nom_respuesta3', '$nom_respuesta4', '$res_correct')";
        
        $this->db->query($sql);
    }
}
?>