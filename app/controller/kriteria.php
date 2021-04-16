<?php

class Kriteria extends Controller {
    public function index()
    {
        $data['judul'] = 'Data Kriteria';
        $this->view('templates/header', $data);
       $this->view('kriteria/index');
       $this->view('templates/footer');
    }
    
}