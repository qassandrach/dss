<?php

class Hasil extends Controller {
    public function index(){
        $data['judul'] = 'Prioritas Sekolah yang Dikunjungi';
        $data['kriteria'] = $this->model('kriteria_model')->getIdKriteria();
        $data['sekolah'] = $this->model('sekolah_model')->getSekolah();
        $data['sekolah_prioritas'] = $this->model('hasil_model')->decisionMatrix();
        $data['normalized_mtrx'] = $this->model('hasil_model')->normalizeMatrix($data['sekolah_prioritas']);
        $data['weighted_mtrx'] = $this->model('hasil_model')->weightedMatrix($data['normalized_mtrx']);
        $data['ideal_solution'] = $this->model('hasil_model')->idealSolution($data['weighted_mtrx']);
        $data['sol_distance'] = $this->model('hasil_model')->solutionDistance($data['ideal_solution'], $data['weighted_mtrx']);
        $this->view('templates/header', $data);
        $this->view('hasil/index', $data);
        $this->view('templates/footer');
    }

}

?>
