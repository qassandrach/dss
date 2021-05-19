<?php

class Sekolah extends Controller{

    public function index(){
        $data['judul'] = 'Data Sekolah';
        $data['sekolah'] = $this->model('sekolah_model')->getAllSekolah();
        $this->view('templates/header', $data);
        $this->view('sekolah/index', $data);
        $this->view('templates/footer');
    }

    public function detail($id){
        $data['judul'] = 'Detail Sekolah';
        $data['sekolah'] = $this->model('sekolah_model')->getSekolahByID($id);
        $this->view('templates/header', $data);
        $this->view('sekolah/detail', $data);
        $this->view('templates/footer');
    }

    public function tambah(){
        $data['judul'] = 'Tambah Daftar Sekolah';
        $data['no_sekolah'] = $this->model('sekolah_model')->countSekolah();
        $data['kriteria'] = $this->model('kriteria_model')->getAllKriteria();
        $this->view('templates/header', $data);
        $this->view('sekolah/tambah', $data);
        $this->view('templates/footer');
    }

    public function tambah_aksi(){
        if ($this->model('sekolah_model')->tambahDataSekolah($_POST) > 0){
            header('Location: ' . BASEURL . '/sekolah');
            echo "success";
        }
    }

    public function page() {
        $data['judul'] = 'Pages';
        $this->view('templates/header', $data);
        $this->view('sekolah/page');
        $this->view('templates/footer');

    }

    public function hapus($id){
        if ($this->model('sekolah_model')->hapusDataSekolah($id) > 0){
            header('Location: ' . BASEURL . '/sekolah');
            exit;
        }
    }

    public function edit($id){
        $data['judul'] = 'Edit Detail Sekolah';
        $data['sekolah'] = $this->model('sekolah_model')->getSekolahByID($id);
        $data['kriteria'] = $this->model('kriteria_model')->getAllKriteria();
        $this->view('templates/header', $data);
        $this->view('sekolah/edit', $data);
        $this->view('templates/footer');
    }

    public function edit_aksi(){
        if ($this->model('sekolah_model')->editDataSekolah($_POST) > 0){
            header('Location: ' . BASEURL . '/sekolah');
            echo "success";
        }
    }
}