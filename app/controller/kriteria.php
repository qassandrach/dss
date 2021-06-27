<?php
session_start();

class Kriteria extends Controller
{
    public function __construct()
    {
        if (!$_SESSION['username']) {
            header("Location: " . BASEURL . "/login/logout");
        }
    }

    public function index()
    {
        $data['judul'] = 'Data Kriteria';
        $data['kriteria'] = $this->model('kriteria_model')->getAllKriteria();
        $this->view('templates/header', $data);
        $this->view('kriteria/index', $data);
        $this->view('templates/footer');
    }


    public function tambah()
    {
        $data['judul'] = 'Tambah Data Kriteria';
        $data['kriteria'] = $this->model('kriteria_model')->getAllKriteria();
        $data['no_kriteria'] = $this->model('kriteria_model')->countKriteria();
        $this->view('templates/header', $data);
        $this->view('kriteria/tambah', $data);
        $this->view('templates/footer');
    }

    public function tambah_aksi()
    {
        if ($this->model('kriteria_model')->tambahDataKriteria($_POST) > 0) {
            header('Location: ' . BASEURL . '/kriteria');
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->model('kriteria_model')->hapusDataKriteria($id) > 0) {
            header('Location: ' . BASEURL . '/kriteria');
            exit;
        }
    }

    public function edit($id)
    {
        $data['judul'] = 'Ubah Data Kriteria';
        $data['kriteria'] = $this->model('kriteria_model')->getKriteriaById($id);
        $this->view('templates/header', $data);
        $this->view('kriteria/edit', $data);
        $this->view('templates/footer');
    }

    public function edit_aksi()
    {
        if ($this->model('kriteria_model')->editDataKriteria($_POST) > 0) {
            header('Location: ' . BASEURL . '/kriteria');
            exit;
        }
    }
}
