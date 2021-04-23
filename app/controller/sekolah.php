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
    public function page() {
        $data['judul'] = 'Pages';
        $this->view('templates/header', $data);
        $this->view('sekolah/page');
        $this->view('templates/footer');

    }
}