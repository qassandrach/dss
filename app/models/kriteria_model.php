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

    public function countKriteria(){
        $this->db->query('SELECT id_kriteria FROM ' . $this->table);
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

    public function tambahDataKriteria($data){

        $jumlah_penilaian = array();

        for ($i = 0; $i < count($data['nama_penilaian']); $i++) { 
            $array = array(
                'jenis' => $data['nama_penilaian'][$i],
                'nilai' => $data['penilaian'][$i]
            );

            array_push($jumlah_penilaian, $array);
        }

        $hasil = json_encode($jumlah_penilaian);

        $query = "INSERT INTO data_kriteria VALUES (:id_kriteria, :kriteria, :bobot, :penilaian)";
        $this->db->query($query);

        $this->db->bind('id_kriteria', $data['id_kriteria']);
        $this->db->bind('kriteria', $data['kriteria']);
        $this->db->bind('bobot', 0);
        $this->db->bind('penilaian', $hasil);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataKriteria($id) {
        $query = "DELETE FROM data_kriteria WHERE id_kriteria = :id_kriteria";
        $this->db->query($query);

        $this->db->bind('id_kriteria', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }
}
?>
