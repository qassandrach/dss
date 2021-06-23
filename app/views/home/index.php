<div id="dashboard">
<h4>Sistem Pendukung Keputusan (SPK) Universitas Trilogi</h4>
<p>Merupakan sistem pendukung untuk menentukan prioritas sekolah yang akan dikunjungi untuk pelaksanaan promosi.
SPK ini menggunakan metode <i>Technique for Order of Preference by Similarity to Ideal Solution</i> dalam perhitungannya.</p>

</div>

<div class="row">
    <div class="row-line">
        <div class="card">
            <?php
            $sekolah = count($data['sekolah']);


            echo "<h3>" . $sekolah . "</h3>
   <h4>Jumlah Sekolah</h4>"

            ?>
        </div>
    </div>
    <div class="row-line">
        <div class="card">
            <?php

            $kriteria = count($data['kriteria']);

            echo "<h3>" . $kriteria . "</h3>
   <h4>Jumlah Kriteria</h4>"

            ?>
        </div>
    </div>

</div>
