<?php
session_start();
class Profile extends Controller
{
    public function __construct()
    {
        if (!$_SESSION['username']) {
            header("Location: " . BASEURL . "/login/logout");
        }
    }

    public function index()
    {
        $data['judul'] = 'User';
        $data['user'] = $this->model('user_model')->getAllUsers();
        $this->view('templates/header', $data);
        $this->view('profile/index', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        $data['judul'] = 'Tambah User';
        $data['no_user'] = $this->model('user_model')->countUsers();
        $data['users'] = $this->model('user_model')->getAllUsers();
        $this->view('templates/header', $data);
        $this->view('profile/tambah', $data);
        $this->view('templates/footer');
    }

    public function tambah_aksi()
    {

        if ($this->model('user_model')->tambahDataUser($_POST) > 0) {
            header('Location: ' . BASEURL . '/profile');
        }
    }
    public function edit($id)
    {
        $data['judul'] = 'Edit User';
        $data['user'] = $this->model('user_model')->getUserById($id);
        $this->view('templates/header', $data);
        $this->view('profile/edit', $data);
        $this->view('templates/footer');
    }

    public function edit_aksi()
    {

        if ($this->model('user_model')->editDataUser($_POST) > 0) {
            header('Location: ' . BASEURL . '/profile');
        }
    }

    public function hapus()
    {
        if ($this->model('user_model')->hapusDataUser($_POST) > 0) {
            header('Location: ' . BASEURL . '/profile');
        }
    }
}
