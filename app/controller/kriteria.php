<?php

class Kriteria extends Controller {
    // public function index()
    // {
    //     $data['judul'] = 'Data Kriteria';
    //     $data['kriteria'] = $this->model('kriteria_model')->getAllKriteria();
    //     $this->view('templates/header', $data);
    //    $this->view('kriteria/index');
    //    $this->view('templates/footer');
    // }

    public function index(){
        $data['judul'] = 'Data Sekolah';
        $data['kriteria'] = $this->model('kriteria_model')->getAllKriteria();
        $this->view('templates/header', $data);
        $this->view('kriteria/index', $data);
        $this->view('templates/footer');
    }


    public function tambah(){
        $data['kriteria'] = $this->model('kriteria_model')->getAllKriteria();
        $data['no_kriteria'] = $this->model('kriteria_model')->countKriteria();
        $this->view('templates/header', $data);
        $this->view('kriteria/tambah', $data);
        $this->view('templates/footer');
    }

    public function tambah_aksi(){
        if ($this->model('kriteria_model')->tambahDataKriteria($_POST) > 0){
            header('Location: ' . BASEURL . '/kriteria');
            exit;
        }
    }
    
}