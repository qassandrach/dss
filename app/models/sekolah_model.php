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

    public function getSekolahById($id_sekolah){
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_sekolah=:id_sekolah');
        $this->db->bind('id_sekolah', $id_sekolah);
        return $this->db->single();
    }

    public function countSekolah() {
        $this->db->query('SELECT id_sekolahFROM ' . $this->table);
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

    public function hapusDataSekolah($id_sekolah) {
        $query = "DELETE data_sekolah, data_evaluasi FROM data_sekolah INNER JOIN data_evaluasi ON data_evaluasi.id_sekolah_alternatif = data_sekolah.id_sekolahWHERE data_sekolah.id_sekolah= :id_sekolah";
        $this->db->query($query);

        $this->db->bind('id_sekolah', $id_sekolah);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function tambahDataSekolah($data) {
        $id_sekolah = $data['id_sekolah'];
        $sekolah = $data['nama_sekolah'];
        $jumlah_siswa = $data['jumlah_siswa'];
        $kriteria = $data['id_sekolahkriteria'];
        $alamat = $data['alamat'];
        $jenis_penilaian = $data['nama_penilaian'];
        $jenis = $data['penilaian'];
        $nilai = $data['inphasil'];
       
        $jumlahkriteria = array();

        for ($i=0; $i < count($kriteria); $i++) { 
            $penilaian_array = array (
                'penilaian'.$i => $jenis_penilaian[$i],
                'jenis'.$i => $jenis[$i],
                'nilai'.$i => $nilai[$i]
            );

            array_push($jumlahkriteria, $penilaian_array);
        }

        $hasil_akhir = json_encode($jumlahkriteria);

        $query1 = "INSERT INTO data_sekolah (id_sekolah, nama, siswa, alamat, penilaian) VALUES (:id_sekolah, :nama, :siswa, :alamat, :penilaian)";
        $this->db->query($query1);

        $this->db->bind('id_sekolah', $id_sekolah);
        $this->db->bind('nama', $sekolah);
        $this->db->bind('siswa', $jumlah_siswa);
        $this->db->bind('alamat', $alamat);
        $this->db->bind('penilaian', $hasil_akhir);

        $this->db->execute();

        for ($i=0; $i < count($kriteria); $i++) {
            $query2    = "INSERT INTO data_evaluasi (id_sekolah_alternatif, id_sekolah_kriteria, nilai) VALUES (:id_sekolah_alternatif, :id_sekolah_kriteria, :nilai)";
            $this->db->query($query2);

            $this->db->bind('id_sekolah_alternatif', $id_sekolah);
            $this->db->bind('id_sekolah_kriteria', $kriteria[$i]);
            $this->db->bind('nilai', $nilai[$i]);

            $this->db->execute();

        }


        return $this->db->rowCount();
        exit();
    }

    public function editDataSekolah($data) {
        $id_sekolah = $data['id_sekolah'];
        $sekolah = $data['nama_sekolah'];
        $jumlah_siswa = $data['jumlah_siswa'];
        $kriteria = $data['id_sekolahkriteria'];
        $alamat = $data['alamat'];
        $jenis_penilaian = $data['nama_penilaian'];
        $jenis = $data['penilaian'];
        $nilai = $data['inphasil'];
        $jumlahkriteria = array();

        for ($i=0; $i < count($kriteria); $i++) { 
            $penilaian_array = array (
                'penilaian'.$i => $jenis_penilaian[$i],
                'jenis'.$i => $jenis[$i],
                'nilai'.$i => $nilai[$i]
            );

            array_push($jumlahkriteria, $penilaian_array);
        }

        $hasil_akhir = json_encode($jumlahkriteria);
        $query1 = "UPDATE data_sekolah SET nama = :nama, siswa = :siswa, alamat = :alamat, penilaian = :penilaian WHERE id_sekolah= :id_sekolah";
        $this->db->query($query1);

        $this->db->bind('id_sekolah', $id_sekolah);
        $this->db->bind('nama', $sekolah);
        $this->db->bind('siswa', $jumlah_siswa);
        $this->db->bind('alamat', $alamat);
        $this->db->bind('penilaian', $hasil_akhir);

        $this->db->execute();

        $affectedRow = 0;
        for ($i=0; $i < count($kriteria); $i++) {
            $query2    = "UPDATE data_evaluasi SET nilai = :nilai WHERE id_sekolah_alternatif = :id_sekolah_alternatif AND id_sekolah_kriteria = :id_sekolah_kriteria";
            $this->db->query($query2);

            $this->db->bind('id_sekolah_alternatif', $id_sekolah);
            $this->db->bind('id_sekolah_kriteria', $kriteria[$i]);
            $this->db->bind('nilai', $nilai[$i]);

            $this->db->execute();
            $affectedRow += $this->db->rowCount();
        
        }
        
        return $affectedRow;
        
        exit();
    }
}
