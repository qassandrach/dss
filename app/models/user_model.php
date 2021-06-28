<?php

class User_model {
    private $table = 'data_users';
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getAllUsers() {
        $query = 'SELECT id_user, nama, username, role FROM ' . $this->table;
        $this->db->query($query);
        return $this->db->resultSet();
    }
    public function getUserById($id) {
        $query = 'SELECT id_user, nama, email, role FROM ' . $this->table . ' WHERE id_user=:id_user';
        $this->db->query($query);
        $this->db->bind('id_user', $id);
        return $this->db->single();
    }

    public function countUsers(){
        $this->db->query('SELECT id_user FROM ' . $this->table);

        $this->db->resultSet();
        $jumlah = $this->db->rowCount();

        if ($jumlah != 0) {
            $kode    = $jumlah + 1;
            $kodeotomatis = str_pad($kode, 1, "0", STR_PAD_LEFT);
        } else {
            $kodeotomatis = "1";
        }

        return $kodeotomatis;
    }

    public function tambahDataUser($data)
    {
        $id_user = $data['id_user'];
        $nama = $data['nama_user'];
        $email = $data['email'];
        $username  = $data['username'];
        $password = password_hash($data['password'], PASSWORD_DEFAULT);
        $role = $data['role'];

        $query = 'INSERT INTO data_users (id_user, nama, email, username, password, role) VALUES (:id_user, :nama, :email, :username, :password, :role)';
        $this->db->query($query);

        $this->db->bind('id_user', $id_user);
        $this->db->bind('nama', $nama);
        $this->db->bind('email', $email);
        $this->db->bind('username', $username);
        $this->db->bind('password', $password);
        $this->db->bind('role', $role);
        $this->db->execute();
        return $this->db->rowCount();
        exit();
    }

    public function cekUser($data)
    {
        $username = $data['username'];
        $pass = $data['password'];

        $query = 'SELECT * FROM data_users WHERE username=:username';
        $this->db->query($query);
        $this->db->bind('username', $username);
        $this->db->execute();

        $result = $this->db->resultSet();

        if (count($result) > 0) {
            foreach ($result as $key => $value) {
                if (password_verify($pass, $value['password'])) {
                    return array(
                        'username' => $value['username'],
                        'role' => $value['role']
                    );
                } else {
                    return $valid_password = false;
                }
            }
            
        } else {
            return $valid_username = false;
        }
        

        // return $this->db->resultSet();
    }

    public function editDataUser($data)
    {
        $id_user = $data['id_user'];
        $nama = $data['nama'];
        $email = $data['email'];
        $role = $data['role'];
        $query = 'UPDATE data_users SET nama=:nama, email=:email, role=:role WHERE id_user=:id_user';
        $this->db->query($query);
        $this->db->bind('nama', $nama);
        $this->db->bind('email', $email);
        $this->db->bind('role', $role);
        $this->db->bind('id_user', $id_user);

        $this->db->execute();
        // $this->db->resultSet();

        $affectedRow = 0;
        $affectedRow += $this->db->rowCount();

        return $affectedRow;
    }

    public function hapusDataUser($id)
    {
        $query = "DELETE FROM data_users WHERE id_user = :id_user";
        $this->db->query($query);

        $this->db->bind('id_user', $id);

        $this->db->execute();

        $affectedRow = 0;
        $affectedRow =+ $this->db->rowCount();

        return $affectedRow;

    }
}