<?php

class Home extends Controller {
    public function index()
    {
        $data['judul'] = 'Home';
        $data['nama'] = $this->model('user_model')->getUser();
        $data['sekolah'] = $this->model('sekolah_model')->getAllSekolah();
        $data['kriteria'] = $this->model('kriteria_model')->getAllKriteria();
        
        $this->view('home/jumbotron', $data);
       $this->view('templates/header', $data);
       $this->view('home/index', $data);
       $this->view('templates/footer');
    }
    
}