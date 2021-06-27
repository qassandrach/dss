<h2>Hasil SPK Prioritas Sekolah</h2>

<?php if ($_SESSION && $_SESSION['role'] === 'Administrator') { ?>
    <button><a href="<?= BASEURL; ?>/hasil/proses/">Lihat Proses</a></button>
<?php } ?>

<div class="card">
    <?php
    $sekolah = array();
    for ($i = 1; $i <= count($data['sekolah']); $i++) {
        $sekolah[$i] = $data['sekolah'][$i - 1]['nama'];
    }
    ?>
    <table>
        <h4>Ranking</h4>
        <thead>
            <tr>
                <th>Ranking</th>
                <th>Sekolah</th>
                <th>Nilai Preferensi (V<sub>i</sub>)</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $k = 0;
            $matrix7 = $data['result'];
            $matrix8 = array();
            arsort($matrix8);
            foreach ($matrix7 as $key => $value) {
                $matrix8[$sekolah[$key]] = $value;
            }
            foreach ($matrix8 as $key => $value) {
                echo "<tr>
                       <td>" . (++$k) . "</td>
                       <td>" . $key . "</td>
                       <td>" . $value . "</td>
                       </tr>";
            }
            ?>
        </tbody>
    </table>
</div>