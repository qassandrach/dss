<?php

class Sekolah extends Controller{

    public function index($nama='Qassie', $pekerjaan='Professional eater'){
        $data['nama'] = $nama;
        $data['pekerjaan'] = $pekerjaan;
        $data['judul'] = 'Data Sekolah';
        $this->view('templates/header', $data);
        $this->view('sekolah/index', $data);
        $this->view('templates/footer');
    }
    public function page() {
        $data['judul'] = 'Pages';
        $this->view('templates/header', $data);
        $this->view('sekolah/page');
        $this->view('templates/footer');

    }
}