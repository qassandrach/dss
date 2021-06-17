<?php
/*
Metode Technique for Order of Preference by Similarity to Ideal Solution (TOPSIS)

TOPSIS adalah metode pengambilan keputusan multikriteria yang pertama kali diper
kenalkan oleh Yoon dan Hwang tahun 1981. Menurut Hwang dan Zeleny (Kusumadewi,dkk.
, 2006), TOPSIS didasarkan pada konsep dimana alternatif terpilih yang terbaik ti
dak hanya memiliki jarak terpendek dari solusi ideal positif, namun juga memiliki
jarak terpanjang dari solusi ideal negatif.

Solusi ideal positif didefinisikan sebagai jumlah dari seluruh nilai terbaik yang
dapat dicapai untuk setiap atribut, sedangkan solusi ideal negatif terdiri dari
seluruh nilai terburuk yang dicapai untuk setiap atribut (Meliana, 2011). 

Konsep ini banyak digunakan pada beberapa model MADM untuk menyelesaikan masalah 
keputusan secara praktis (Hwang, 1993; Liang,1999; Yeh, 2000). Hal ini disebabkan 
konsepnya sederhana dan, mudah dipahami, komputasinya efisien, dan memiliki kemam
puan untuk mengukur kinerja relatif dari alternatif-alternatif keputusan dalam 
bentuk matematis yang sederhana (Kusumadewi, dkk., 2006: 88). 

3.2.1 Prosedur TOPSIS
Secara umum, prosedur TOPSIS mengikuti langkah-langkah sebagai berikut:
1. Membuat matriks keputusan yang ternormalisasi 
TOPSIS membutuhkan rating kinerja setiap alternatif Ai pada setiap kriteria Cj yang 
ternormalisasi, yaitu:
 
                         2  0.5
r  = x   /(    sigma   x   )
 ij   ij    i=1     m   ij

dengan 
    i = 1, 2, ... , m; 
dan 
    j = 1, 2, 3, ... , n;

2. Membuat matriks keputusan yang ternormalisasi terbobot
Solusi ideal positif A+  dan solusi ideal negatif A- 
dapat ditentukan berdasarkan rating bobot ternormalisasi (y  ) sebagai:
                                                           ij
y  = w r
 ij   i ij
  
dengan 
  i = 1, 2, ... , m; 
dan 
  j = 1, 2, 3, ... , n;  

dimana:

r  = matriks ternormalisasi terbobot
 ij
w  = vektor bobot ke-i
 i
 
3. Menentukan matriks solusi ideal positif dan matriks solusi ideal negatif 
Solusi ideal positif dihitung berdasarkan:

 +    +   +       +
A = (y , y , ... y )
      1   2       n
Solusi ideal negatif  dihitung berdasarkan:

 -    -   -       -
A = (y , y , ... y )
      1   2       n

dengan 

      max y   ; jika j adalah atribut keuntungan
 +     i   ij
y = {  
 j    min y   ; jika j adalah atribut biaya
       i   ij
 
 
      min y   ; jika j adalah atribut keuntungan
 -     i   ij
y = {  
 j    max y   ; jika j adalah atribut biaya
       i   ij
 
dengan
 j=1,2,...,n
 
4. Menentukan jarak antara nilai setiap alternatif dengan matriks solusi 
positif dan matriks solusi ideal negatif

Jarak antara alternatif  Ai dengan solusi ideal positif dirumuskan sebagai: 

 +            +      2  0.5
D =(  sigma (y - y  )  )      ; i= 1,2,...,m
 i   j=1   n  i   ij

Jarak antara alternatif Ai dengan solusi ideal negatif dirumuskan sebagai

 -                 - 2  0.5
D =(  sigma (y  - y )  )      ; i= 1,2,...,m
 i   j=1   n  ij   i


5.Menentukan nilai preferensi untuk setiap alternatif
Nilai preferensi untuk setiap alternatif (Vi) diberikan sebagai:
     -   -    +
V = D /(D  + D )              ; i=1,2,...,m
 i   i   i    i

Nilai yang lebih besar menunjukkan bahwa alternatif Ai lebih dipilih.
//----------------

CREATE DATABASE IF NOT EXISTS db_dss;
USE db_dss;

DROP TABLE IF EXISTS topsis_criterias;
CREATE TABLE IF NOT EXISTS topsis_criterias(
  id_criteria TINYINT(3) UNSIGNED NOT NULL,
  criteria VARCHAR(100) NOT NULL,
  weight FLOAT NOT NULL,
  attribute SET('benefit','cost'),
  PRIMARY KEY(id_criteria)
)ENGINE=MyISAM;

INSERT INTO topsis_criterias(id_criteria,criteria,weight,attribute)
VALUES
(1,'Pengalaman Kerja',0.3,'benefit'),
(2,'Pendidikan',0.2,'benefit'),
(3,'Usia',0.2,'benefit'),
(4,'Status Perkawinan',0.15,'cost'),
(5,'Alamat',0.15,'cost');

SELECT * FROM topsis_criterias;
+-------------+-------------------+--------+-----------+
| id_criteria | criteria          | weight | attribute |
+-------------+-------------------+--------+-----------+
|           1 | Pengalaman Kerja  |   0.3  | benefit   |
|           2 | Pendidikan        |   0.2  | benefit   |
|           3 | Usia              |   0.2  | benefit   |
|           4 | Status Perkawinan |  0.15  | cost      |
|           5 | Alamat            |  0.15  | cost      |
+-------------+-------------------+--------+-----------+
5 rows in set (0.01 sec)

DROP TABLE IF EXISTS topsis_alternatives;
CREATE TABLE IF NOT EXISTS topsis_alternatives(
  id_alternative SMALLINT(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  name VARCHAR(30) NOT NULL,
  PRIMARY KEY(id_alternative)
) ENGINE=MyISAM;

INSERT INTO topsis_alternatives(name)
VALUES
('Alfian'),
('Bella'),
('Carlie'),
('Dewi'),
('Enrico');

SELECT * FROM topsis_alternatives;
+----------------+--------+
| id_alternative | name   |
+----------------+--------+
|              1 | Alfian |
|              2 | Bella  |
|              3 | Carlie |
|              4 | Dewi   |
|              5 | Enrico |
+----------------+--------+
5 rows in set (0.00 sec)

DROP TABLE IF EXISTS topsis_evaluations;
CREATE TABLE IF NOT EXISTS topsis_evaluations(
  id_alternative SMALLINT(5) UNSIGNED NOT NULL,
  id_criteria TINYINT(3) UNSIGNED NOT NULL,
  value FLOAT NOT NULL,
  PRIMARY KEY (id_alternative,id_criteria)
)ENGINE=MyISAM;

INSERT INTO topsis_evaluations(id_alternative,id_criteria,value)
VALUES
(1,1,0.5),
(1,2,1),
(1,3,0.7),
(1,4,0.7),
(1,5,0.8),
(2,1,0.8),
(2,2,0.7),
(2,3,1),
(2,4,0.5),
(2,5,1),
(3,1,1),
(3,2,0.3),
(3,3,0.4),
(3,4,0.7),
(3,5,1),
(4,1,0.2),
(4,2,1),
(4,3,0.5),
(4,4,0.9),
(4,5,0.7),
(5,1,1),
(5,2,0.7),
(5,3,0.4),
(5,4,0.7),
(5,5,1);

*/
$dbhost='localhost';
$dbuser='root';
$dbpass='';
$dbname='db_dss';
$db=new mysqli($dbhost,$dbuser,$dbpass,$dbname);
$sql="
      SELECT 
        b.name,c.criteria,a.value,c.weight,c.attribute
      FROM 
        topsis_evaluations a
        JOIN 
          topsis_alternatives b USING(id_alternative)
        JOIN 
          topsis_criterias c USING(id_criteria)
";
$result=$db->query($sql);
$data=array();
$kriterias=array();
$bobot=array();
$atribut=array();
$nilai_kuadrat=array();
while($row=$result->fetch_object()){
  if(!isset($data[$row->name])){
    $data[$row->name]=array();
  }
  if(!isset($data[$row->name][$row->criteria])){
    $data[$row->name][$row->criteria]=array();
  }
  if(!isset($nilai_kuadrat[$row->criteria])){
    $nilai_kuadrat[$row->criteria]=0;
  }
  $bobot[$row->criteria]=$row->weight;
  $atribut[$row->criteria]=$row->attribute;
  $data[$row->name][$row->criteria]=$row->value;
  $nilai_kuadrat[$row->criteria]+=pow($row->value,2);
  $kriterias[]=$row->criteria;
}
$kriteria=array_unique($kriterias);
$jml_kriteria=count($kriteria);
?>
<!doctype html>
<html>
  <head>
    <title>TOPSIS</title>
  </head>
  <body>
    <table border='1'>
      <caption>Evaluation Matrix (x<sub>ij</sub>)</caption>
      <thead>
        <tr>
          <th rowspan='3'>No</th>
          <th rowspan='3'>Alternatif</th>
          <th rowspan='3'>Nama</th>
          <th colspan='<?php echo $jml_kriteria;?>'>Kriteria</th>
        </tr>
        <tr>
          <?php
          foreach($kriteria as $k)
            echo "<th>{$k}</th>\n";
          ?>
        </tr>
        <tr>
          <?php
          for($n=1;$n<=$jml_kriteria;$n++)
            echo "<th>C{$n}</th>";
          ?>
        </tr>
      </thead>
      <tbody>
        <?php
        $i=0;
        foreach($data as $nama=>$krit){
          echo "<tr>
            <td>".(++$i)."</td>
            <th>A{$i}</th>
            <td>{$nama}</td>";
          foreach($kriteria as $k){  
            echo "<td align='center'>{$krit[$k]}</td>";
          }
          echo
           "</tr>\n";
        }
        ?>
      </tbody>
    </table>
    <table border='1'>
      <caption>Rating Kinerja Ternormalisasi (r<sub>ij</sub>)</caption>
      <thead>
        <tr>
          <th rowspan='3'>No</th>
          <th rowspan='3'>Alternatif</th>
          <th rowspan='3'>Nama</th>
          <th colspan='<?php echo $jml_kriteria;?>'>Kriteria</th>
        </tr>
        <tr>
          <?php
          foreach($kriteria as $k)
            echo "<th>{$k}</th>\n";
          ?>
        </tr>
        <tr>
          <?php
          for($n=1;$n<=$jml_kriteria;$n++)
            echo "<th>C{$n}</th>";
          ?>
        </tr>
      </thead>
      <tbody>
        <?php
        $i=0;
        foreach($data as $nama=>$krit){
          echo "<tr>
            <td>".(++$i)."</td>
            <th>A{$i}</th>
            <td>{$nama}</td>";
          foreach($kriteria as $k){  
            echo "<td align='center'>".round(($krit[$k]/sqrt($nilai_kuadrat[$k])),4)."</td>";
          }
          echo
           "</tr>\n";
        }
        ?>
      </tbody>
    </table>
    <table border='1'>
      <caption>Rating Bobot Ternormalisasi(y<sub>ij</sub>)</caption>
      <thead>
        <tr>
          <th rowspan='3'>No</th>
          <th rowspan='3'>Alternatif</th>
          <th rowspan='3'>Nama</th>
          <th colspan='<?php echo $jml_kriteria;?>'>Kriteria</th>
        </tr>
        <tr>
          <?php
          foreach($kriteria as $k)
            echo "<th>{$k}</th>\n";
          ?>
        </tr>
        <tr>
          <?php
          for($n=1;$n<=$jml_kriteria;$n++)
            echo "<th>C{$n}</th>";
          ?>
        </tr>
      </thead>
      <tbody>
        <?php
        $i=0;
        $y=array();
        foreach($data as $nama=>$krit){
          echo "<tr>
            <td>".(++$i)."</td>
            <th>A{$i}</th>
            <td>{$nama}</td>";
          foreach($kriteria as $k){  
            $y[$k][$i-1]=round(($krit[$k]/sqrt($nilai_kuadrat[$k])),4)*$bobot[$k];
            echo "<td align='center'>".$y[$k][$i-1]."</td>";
          }
          echo
           "</tr>\n";
        }
        ?>
      </tbody>
    </table>
    <table border='1'>
      <caption>Solusi Ideal positif (A<sup>+</sup>)</caption>
      <thead>
        <tr>
          <th colspan='<?php echo $jml_kriteria;?>'>Kriteria</th>
        </tr>
        <tr>
          <?php
          foreach($kriteria as $k)
            echo "<th>{$k}</th>\n";
          ?>
        </tr>
        <tr>
          <?php
          for($n=1;$n<=$jml_kriteria;$n++)
            echo "<th>y<sub>{$n}</sub><sup>+</sup></th>";
          ?>
        </tr>
      </thead>
      <tbody>
        <tr>
          <?php
          $yplus=array();
          foreach($kriteria as $k){
            $yplus[$k]=($atribut[$k]=='benefit'?max($y[$k]):min($y[$k]));
            echo "<th>{$yplus[$k]}</th>";
          }
          ?>
        </tr>
      </tbody>
    </table>
    <table border='1'>
      <caption>Solusi Ideal negatif (A<sup>-</sup>)</caption>
      <thead>
        <tr>
          <th colspan='<?php echo $jml_kriteria;?>'>Kriteria</th>
        </tr>
        <tr>
          <?php
          foreach($kriteria as $k)
            echo "<th>{$k}</th>\n";
          ?>
        </tr>
        <tr>
          <?php
          for($n=1;$n<=$jml_kriteria;$n++)
            echo "<th>y<sub>{$n}</sub><sup>-</sup></th>";
          ?>
        </tr>
      </thead>
      <tbody>
        <tr>
          <?php
          $ymin=array();
          foreach($kriteria as $k){
            $ymin[$k]=$atribut[$k]=='cost'?max($y[$k]):min($y[$k]);
            echo "<th>{$ymin[$k]}</th>";
          }
          ?>
        </tr>
      </tbody>
    </table>
    <table border='1'>
      <caption>Jarak positif (D<sub>i</sub><sup>+</sup>)</caption>
      <thead>
        <tr>
          <th>No</th>
          <th>Alternatif</th>
          <th>Nama</th>          
          <th>D<suo>+</sup></th>
        </tr>
      </thead>
      <tbody>
        <?php
        $i=0;
        $dplus=array();
        foreach($data as $nama=>$krit){
          echo "<tr>
            <td>".(++$i)."</td>
            <th>A{$i}</th>
            <td>{$nama}</td>";
          foreach($kriteria as $k){  
            if(!isset($dplus[$i-1])) $dplus[$i-1]=0;
            $dplus[$i-1]+=pow($yplus[$k]-$y[$k][$i-1],2);
          }
          echo "<td>".round(sqrt($dplus[$i-1]),6)."</td>
           </tr>\n";
        }
        ?>
      </tbody>
    </table>
    <table border='1'>
      <caption>Jarak negatif (D<sub>i</sub><sup>-</sup>)</caption>
      <thead>
        <tr>
          <th>No</th>
          <th>Alternatif</th>
          <th>Nama</th>          
          <th>D<suo>+</sup></th>
        </tr>
      </thead>
      <tbody>
        <?php
        $i=0;
        $dmin=array();
        foreach($data as $nama=>$krit){
          echo "<tr>
            <td>".(++$i)."</td>
            <th>A{$i}</th>
            <td>{$nama}</td>";
          foreach($kriteria as $k){  
            if(!isset($dmin[$i-1]))$dmin[$i-1]=0;
            $dmin[$i-1]+=pow($ymin[$k]-$y[$k][$i-1],2);
          }
          echo "<td>".round(sqrt($dmin[$i-1]),6)."</td>
           </tr>\n";
        }
        ?>
      </tbody>
    </table>
    <table border='1'>
      <caption>Nilai Preferensi(V<sub>i</sub>)</caption>
      <thead>
        <tr>
          <th>No</th>
          <th>Alternatif</th>
          <th>Nama</th>
          <th>V<sub>i</sub></th>
        </tr>
      </thead>
      <tbody>
        <?php
        $i=0;
        $V=array();
        foreach($data as $nama=>$krit){
          echo "<tr>
            <td>".(++$i)."</td>
            <th>A{$i}</th>
            <td>{$nama}</td>";
          foreach($kriteria as $k){  
            $V[$i-1]=$dmin[$i-1]/($dmin[$i-1]+$dplus[$i-1]);
          }
          echo "<td>{$V[$i-1]}</td></tr>\n";
        }
        ?>
      </tbody>
    </table>
  </body>
</html>