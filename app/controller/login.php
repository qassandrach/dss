<?php
class Login extends Controller
{
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
            if ($user['role'] == 'Administrator') {
                $_SESSION["username"] = $user['username'];
                $_SESSION["role"]    = 'Administrator';
                header("Location: " . BASEURL . "/home");
                exit;
            } elseif ($user['role'] == 'Viewer') {
                $_SESSION["username"] = $user['username'];
                $_SESSION["role"]    = 'Viewer';
                header("Location: " . BASEURL . "/home");
                exit;
            }
        }
            
    }
}
