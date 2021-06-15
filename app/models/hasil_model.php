<?php
class Hasil_model
{
    private $table = 'data_evaluasi';
    private $db;

    public function __construct(){
        $this->db = new Database;
    }


    public function decisionMatrix()
    {
        $query1 = 'SELECT * FROM data_evaluasi';
        $this->db->query($query1);
        $data = $this->db->resultSet();
        
        $result = array();

        for ($i=0; $i < count($data) ; $i++) { 

            $id_alternatif = $data[$i]['id_sekolah'];
            $id_kriteria = $data[$i]['id_kriteria'];
            $nilai = $data[$i]['nilai'];

            $result[$id_alternatif][$id_kriteria] = $nilai;
        }
        return $result;
    }

    public function normalizeMatrix($result){
        

    }
}
