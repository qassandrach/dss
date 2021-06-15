<?php

class Hasil extends Controller {
    public function index(){
        $data['judul'] = 'Prioritas Sekolah yang Dikunjungi';
        $data['kriteria'] = $this->model('kriteria_model')->getIdKriteria();
        $data['sekolah_prioritas'] = $this->model('hasil_model')->decisionMatrix();
        $data['normalized_mtrx'] = $this->model('hasil_model')->normalizeMatrix($data['sekolah_prioritas']);
        $this->view('templates/header', $data);
        $this->view('hasil/index', $data);
        $this->view('templates/footer');
    }

}

?>
