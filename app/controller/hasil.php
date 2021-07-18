<?php
session_start();
class Hasil extends Controller
{
    public function __construct()
    {
        if (!$_SESSION['username']) {
            header("Location: " . BASEURL . "/login/logout");
        }
    }

    public function tambah()
    {
        $data['judul'] = 'Tambah Daftar Sekolah';
        $data['schools'] = $this->model('sekolah_model')->getSekolahByName($_POST);
        $data['kriteria'] = $this->model('kriteria_model')->getAllKriteria();
        $this->view('templates/header', $data);
        $this->view('hasil/tambah', $data);
        $this->view('templates/footer');
    }

    public function tambah_aksi()
    {
        if ($this->model('sekolah_model')->tambahPenilaianSekolah($_POST) > 0) {
            header('Location: ' . BASEURL . '/hasil');
        }
    }

    public function count()
    {

        $data['kriteria'] = $this->model('kriteria_model')->getIdKriteria();
        $data['sekolah'] = $this->model('sekolah_model')->getAllSchool();
        $data['sekolah_prioritas'] = $this->model('hasil_model')->decisionMatrix();
        $data['normalized_mtrx'] = $this->model('hasil_model')->normalizeMatrix($data['sekolah_prioritas']);
        $data['weighted_mtrx'] = $this->model('hasil_model')->weightedMatrix($data['normalized_mtrx']);
        $data['ideal_solution'] = $this->model('hasil_model')->idealSolution($data['weighted_mtrx']);
        $data['sol_distance'] = $this->model('hasil_model')->solutionDistance($data['ideal_solution'], $data['weighted_mtrx']);
        $data['result'] = $this->model('hasil_model')->preferenceValue($data['sol_distance']);

        return $data;
    }
    public function index()
    {
        $data['judul'] = 'Hasil SPK';
        $data['sekolah'] = $this->model('sekolah_model')->getAllSchool();
        $result = $this->count();
        $data['result'] = $result['result'];
        $this->view('templates/header', $data);
        $this->view('hasil/index', $data);
        $this->view('templates/footer');
    }

    public function daftar()
    {
        $data['judul'] = 'Hasil SPK';
        $data['sekolah'] = $this->model('sekolah_model')->getAllSchool();
        $result = $this->count();
        $data['result'] = $result['result'];
        $this->view('templates/header', $data);
        $this->view('hasil/daftar', $data);
        $this->view('templates/footer');
    }
    public function proses()
    {
        $title['judul'] = 'Proses SPK';
        $data = $this->count();
        $this->view('templates/header', $title);
        $this->view('hasil/proses', $data);
        $this->view('templates/footer');
    }
}
