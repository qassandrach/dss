<?php
class Hasil_model
{
    private $table = 'data_evaluasi';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }


    public function decisionMatrix()
    {
        $query1 = 'SELECT * FROM data_evaluasi';
        $this->db->query($query1);
        $data = $this->db->resultSet();

        $result = array();

        for ($i = 0; $i < count($data); $i++) {

            $id_alternatif = $data[$i]['id_sekolah'];
            $id_kriteria = $data[$i]['id_kriteria'];
            $nilai = $data[$i]['nilai'];

            $result[$id_alternatif][$id_kriteria] = $nilai;
        }
        return $result;
    }

    public function normalizeMatrix($result)
    {

        $x_rata = array();
        foreach ($result as $i => $x) {
            foreach ($x as $j => $value) {
                // $x_rata[$j] = (isset($x_rata[$j]) ? $x_rata[$j] : 0) + pow($value, 2);
                $x_rata[$j] = (isset($x_rata[$j]) ? $x_rata[$j] : 0) + pow($value, 2);
      
            }
                
        }
        for ($j = 1; $j <= count($x_rata); $j++) {
            $x_rata[$j] = sqrt($x_rata[$j]);
        }

        $R = array();
        $alternative = '';
        foreach ($result as $i => $x) {
          if ($alternative != $i) {
            $alternative = $i;
            $R[$i] = array();
          }
          foreach ($x as $j => $value) {
            $R[$i][$j] = round($value / $x_rata[$j], 4);
          }
        }

        return $R;
    }
}
