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

    
}