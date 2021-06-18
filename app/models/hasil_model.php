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

  public function weightedmatrix($data)
  {
    $query = 'SELECT id_kriteria, bobot FROM data_kriteria';
    $this->db->query($query);
    $bobot = $this->db->resultSet();

    $kriteria = array();

    foreach ($bobot as $b) {
      $kriteria[$b['id_kriteria']] = floatval($b['bobot']);
    }

    $W = array();
    $alternative = '';
    foreach ($data as $i => $x) {
      if ($alternative != $i) {
        $alternative = $i;
        $W[$i] = array();
      }
      foreach ($x as $j => $value) {
        $W[$i][$j] = round($value * $kriteria[$j], 4);
      }
    }
    return $W;
  }

  public function idealSolution($data)
  {
    $positiveSolution = array();
    $negativeSolution = array();
    foreach ($data as $i => $x) {

      foreach ($x as $j => $value) {

        $positiveSolution[$j] = (isset($positiveSolution[$j]) ? $positiveSolution[$j] : $value);
        if ($positiveSolution[$j] < $value) {
          $positiveSolution[$j] = $value;
        }
      }
    }

    foreach ($data as $i => $x) {

      foreach ($x as $j => $value) {

        $negativeSolution[$j] = (isset($negativeSolution[$j]) ? $negativeSolution[$j] : $value);
        if ($negativeSolution[$j] > $value) {
          $negativeSolution[$j] = $value;
        }
      }
    }

    return array(
      'A<sup>+</sup>' => $positiveSolution,
      'A<sup>-</sup>' => $negativeSolution
    );
  }

  public function solutionDistance($matrix4, $matrix2)
  {
    $idealSolution = array();
    $m = 1;
    foreach ($matrix4 as $key => $value) {
      $idealSolution[$m] = $value;
      ++$m;
    }
    $i_positive = array();
    $i_negative = array();
    $positiveDistance = array();
    $negativeDistance = array();
    $alternative = '';
    foreach ($matrix2 as $i => $x) {
      if ($alternative != $i) {
        $alternative = $i;
        $i_positive[$i] = array();
      }
      foreach ($x as $j => $value) {
        $i_positive[$i][$j] = pow(($value - $idealSolution[1][$j]), 2);
      }
    }

    foreach ($i_positive as $i => $x) {
      $positiveDistance[$i] = (isset($positiveDistance[$i]) ? $positiveDistance[$i] : 0) + round(sqrt(array_sum($i_positive[$i])), 4);
    }

    foreach ($matrix2 as $i => $x) {
      if ($alternative != $i) {
        $alternative = $i;
        $i_negative[$i] = array();
      }
      
      foreach ($x as $j => $value) {
        $i_negative[$i][$j] = pow(($value - $idealSolution[2][$j]), 2);
      }
    }

    foreach ($i_negative as $i => $x) {
      $negativeDistance[$i] = (isset($negativeDistance[$i]) ? $negativeDistance[$i] : 0) + round(sqrt(array_sum($i_negative[$i])), 4);
    }

    return array(
      'positiveDistance' => $positiveDistance,
      'negativeDistance' => $negativeDistance
    );
  }
}
