<?php
class Kriteria_model {

    //database handler
    private $table = 'data_kriteria';
    private $db;

    public function __construct(){
        $this->db = new Database;
    }


    public function getAllKriteria(){
       $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getKriteriaById($id){
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }
}
?>
