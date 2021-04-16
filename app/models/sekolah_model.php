<?php
class Sekolah_model {

    //database handler
    private $table = 'data_sekolah';
    private $db;

    public function __construct(){
        $this->db = new Database;
    }


    public function getAllSekolah(){
       $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }
}
?>
