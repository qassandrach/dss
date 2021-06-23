<?php

class User_model {
    private $table = 'data_users';
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getAllUsers() {
        $query = 'SELECT id, nama, username, role FROM ' . $this->table;
        $this->db->query($query);
        return $this->db->resultSet();
    }
}