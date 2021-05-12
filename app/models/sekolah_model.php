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

    public function getSekolahById($id){
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function countSekolah() {
        $this->db->query('SELECT id FROM ' . $this->table);
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

    public function hapusDataSekolah($id) {
        $query = "DELETE FROM data_sekolah WHERE id = :id";
        $this->db->query($query);

        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function tambahDataSekolah($data) {
        // echo '<pre>';
        // var_dump($data);
        // echo '</pre>';
        $id_sekolah = $data['id_sekolah'];
        $sekolah = $data['nama_sekolah'];
        $jumlah_siswa = $data['jumlah_siswa'];
        $kriteria = $data['idkriteria'];
        $alamat = $data['alamat'];


        $jenis_penilaian = $data['nama_penilaian'];
        $jenis = $data['penilaian'];
        $nilai = $data['inphasil'];
       

        $jumlahkriteria = array();

        for ($i=0; $i < count($kriteria); $i++) { 
            $penilaian_array = array (
                'penilaian' => $jenis_penilaian[$i],
                'jenis'.$i => $jenis[$i],
                'nilai'.$i => $nilai[$i]
            );

            array_push($jumlahkriteria, $penilaian_array);
        }

        $hasil_akhir = json_encode($jumlahkriteria);

        $query1 = "INSERT INTO data_sekolah (id, nama, siswa, alamat, penilaian) VALUES (:id, :nama, :siswa, :alamat, :penilaian)";
        $this->db->query($query1);

        $this->db->bind('id', $id_sekolah);
        $this->db->bind('nama', $sekolah);
        $this->db->bind('siswa', $jumlah_siswa);
        $this->db->bind('alamat', $alamat);
        $this->db->bind('penilaian', $hasil_akhir);

        $this->db->execute();

        for ($i=0; $i < count($kriteria); $i++) {
            $query2    = "INSERT INTO data_evaluasi (id_alternatif, id_kriteria, nilai) VALUES (:id_alternatif, :id_kriteria, :nilai)";
            $this->db->query($query2);

            $this->db->bind('id_alternatif', $id_sekolah);
            $this->db->bind('id_kriteria', $kriteria[$i]);
            $this->db->bind('nilai', $nilai[$i]);

            $this->db->execute();

        }

        return $this->db->rowCount();
        exit();
    }
}
?>
