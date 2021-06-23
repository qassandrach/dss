<?php

class Hasil extends Controller {
    

    public function count(){
        
        $data['kriteria'] = $this->model('kriteria_model')->getIdKriteria();
        $data['sekolah'] = $this->model('sekolah_model')->getSekolah();
        $data['sekolah_prioritas'] = $this->model('hasil_model')->decisionMatrix();
        $data['normalized_mtrx'] = $this->model('hasil_model')->normalizeMatrix($data['sekolah_prioritas']);
        $data['weighted_mtrx'] = $this->model('hasil_model')->weightedMatrix($data['normalized_mtrx']);
        $data['ideal_solution'] = $this->model('hasil_model')->idealSolution($data['weighted_mtrx']);
        $data['sol_distance'] = $this->model('hasil_model')->solutionDistance($data['ideal_solution'], $data['weighted_mtrx']);
        $data['result'] = $this->model('hasil_model')->preferenceValue($data['sol_distance']);
 
        return $data;
    }
    public function index(){
        $this->hasil = new Hasil;
        $data['judul'] = 'Hasil SPK';
        $data['sekolah'] = $this->model('sekolah_model')->getSekolah();
       $result = $this->hasil->count();
       $data['result'] = $result['result'];
        $this->view('templates/header', $data);
        $this->view('hasil/index', $data);
        $this->view('templates/footer');
    }
    public function proses(){
        
        $this->hasil = new Hasil;
        $title['judul'] = 'Proses SPK';
       $data = $this->hasil->count();
        $this->view('templates/header', $title);
        $this->view('hasil/proses', $data);
        $this->view('templates/footer');
        
    }

}

?>
