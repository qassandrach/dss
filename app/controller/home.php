<?php
session_start();

class Home extends Controller
{
    public function __construct()
    {
        if (!$_SESSION['username']) {
            header("Location: " . BASEURL . "/login/logout");
        }
    }

    public function index()
    {
        $data['judul'] = 'Home';
        $data['sekolah'] = $this->model('sekolah_model')->getAllSekolah();
        $data['kriteria'] = $this->model('kriteria_model')->getAllKriteria();

        $this->view('home/jumbotron', $data);
        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }
}
