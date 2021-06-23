<?php
Class Profile extends Controller {
    public function index() {
        $data['judul'] = 'User';
        $data['user'] = $this->model('user_model')->getAllUsers();
        $this->view('templates/header', $data);
        $this->view('profile/index', $data);
        $this->view('templates/footer');
    }
}

?>