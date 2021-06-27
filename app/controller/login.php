<?php
session_start();
class Login extends Controller
{
    public function __construct()
    {
        if ($_SESSION && $_SESSION['username']) {
            header("Location: " . BASEURL . "/home");
        }
    }

    public function index()
    {
        $data['judul'] = 'Login';
        $data['user'] = $this->model('user_model')->getAllUsers();
        $this->view('templates/login', $data);
        $this->view('login/index', $data);
    }

    public function login_aksi()
    {
        $user = $this->model('user_model')->cekUser($_POST);
        if (count($user) > 0) {
            $_SESSION["username"] = $user['username'];
            $_SESSION["role"]    = $user['role'];

            if ($user['role'] == 'Administrator') {
                header("Location: " . BASEURL . "/home");
                exit;
            } elseif ($user['role'] == 'Viewer') {
                header("Location: " . BASEURL . "/home");
                exit;
            }
        }
    }

    public function logout()
    {
        session_destroy();
        header("Location: " . BASEURL);
    }
}
