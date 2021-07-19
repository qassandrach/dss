<h2>SPK Prioritas Sekolah</h2>

<form action="<?= BASEURL; ?>/hasil/tambah" method="POST">

    <div class="form-group">


        <div class="form-input">

            <input type="text" class="col-input" list="schools" name="schools" placeholder="Pilih Sekolah" id="school">
            <datalist id="schools">
                <?php foreach ($data['sekolah'] as $sekolah) { ?>
                    <option value="<?= $sekolah['nama_sekolah'] ?>"><?= $sekolah['id_sekolah'] ?> - <?= $sekolah['nama_sekolah'] ?></option>


                <?php

                }

                ?>

            </datalist>


        </div>

        <div class="form-input">
            <button type="submit" class="btn">Tambah</button>
        </div>

    </div>

    <!-- <div class="form-group">

        <div class="form-input">
            <button type="submit" class="btn">Tambah</button>
        </div>

    </div> -->



    <div class="card">
        <?php
        $sekolah = array();
        for ($i = 1; $i <= count($data['sekolah']); $i++) {
            $sekolah[$i] = $data['sekolah'][$i - 1]['nama_sekolah'];
        }
        ?>
        <table>
            <h4>Ranking</h4>
            <thead>
                <tr>
                    <th>Ranking</th>
                    <th>Id Sekolah</th>
                    <th>Sekolah</th>
                    <th>Nilai Preferensi (V<sub>i</sub>)</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $k = 0;
                $matrix7 = $data['result'];
                arsort($matrix7);
                foreach ($matrix7 as $key => $value) {
                    echo "<tr>
                       <td>" . (++$k) . "</td>
                       <td>" . $key . "</td>
                       <td>" . $sekolah[$key] . "</td>
                       <td>" . $value . "</td>
                       </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>


</form>

<?php if ($_SESSION && $_SESSION['role'] === 'Administrator' && count($sekolah) > 0 ) { ?>

    <button><a href="<?= BASEURL; ?>/hasil/proses/">Lihat Proses</a></button>

<?php } ?>
<button id="simpan" type="submit">Simpan Data</button>
        <a class="batal" href="<?= BASEURL; ?>/sekolah/index" class="btn btn-light">Clear</a>

