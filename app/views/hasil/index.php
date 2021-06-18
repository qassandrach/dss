<main>

    <div class="card">
        <h1 id="sekolah">Prioritas Sekolah untuk Promosi</h1>
        <div class="section">
        </div>
        <div class="section">
            <table>
                <h4>Matriks Keputusan</h4>
                <thead>
                    <tr>
                        <?php
                        $kriteria = $data['kriteria'];
                        foreach ($kriteria as $key) {
                            echo "<th>" . $key['kriteria'] . "</th>";
                        }
                        ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $matrix = $data['sekolah_prioritas'];
                    foreach ($matrix as $key => $value) {
                        echo "<tr>";
                        for ($i = 1; $i <= count($value); $i++) {
                            echo "<td>" . $value[$i] . "</td>";
                        }
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
            <table>
                <h4>Matriks Keputusan Ternormalisasi</h4>
                <thead>
                    <tr>
                        <th>Sekolah</th>
                        <?php
                        $kriteria = $data['kriteria'];
                        foreach ($kriteria as $key) {
                            echo "<th>" . $key['kriteria'] . "</th>";
                        }
                        ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sekolah = array();
                    for ($i = 1; $i <= count($data['sekolah']); $i++) {
                        $sekolah[$i] = $data['sekolah'][$i - 1]['nama'];
                    }

                    $matrix2 = $data['normalized_mtrx'];
                    foreach ($matrix2 as $key => $value) {
                        echo "<tr>";
                        echo "<td>" . $sekolah[$key] . "</td>";
                        for ($i = 1; $i <= count($value); $i++) {
                            echo "<td>" . $value[$i] . "</td>";
                        }
                        echo "</tr>";
                    }

                    ?>
                </tbody>
            </table>
            <table>
                <h4>Matriks Keputusan Ternormalisasi Terbobot</h4>
                <thead>
                    <tr>
                        <th>Sekolah</th>
                        <?php
                        foreach ($kriteria as $key) {
                            echo "<th>" . $key['kriteria'] . "</th>";
                        }
                        ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sekolah = array();
                    for ($i = 1; $i <= count($data['sekolah']); $i++) {
                        $sekolah[$i] = $data['sekolah'][$i - 1]['nama'];
                    }

                    $matrix3 = $data['weighted_mtrx'];
                    foreach ($matrix3 as $key => $value) {
                        echo "<tr>";
                        echo "<td>" . $sekolah[$key] . "</td>";
                        for ($i = 1; $i <= count($value); $i++) {
                            echo "<td>" . $value[$i] . "</td>";
                        }
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
            <table>
                <h4>Matriks Solusi Ideal</h4>
                <thead>
                    <tr>
                        <th></th>
                        <?php
                        foreach ($kriteria as $key) {
                            echo "<th>" . $key['kriteria'] . "</th>";
                        }
                        ?>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $matrix4 = $data['ideal_solution'];
                    foreach ($matrix4 as $key => $value) {
                        echo "<tr>";
                        echo "<td>" . $key . "</td>";
                        for ($i = 1; $i <= count($value); $i++) {
                            echo "<td>" . $value[$i] . "</td>";
                        }
                        echo "</tr>";
                    } ?>
                </tbody>
            </table>
            <table>
                <h4>Jarak Solusi Ideal Positif (D<sub>i</sub><sup>+</sup>)</h4>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Sekolah</th>
                        <th>D<suo>+</sup></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 0;
                    $matrix5 = $data['sol_distance'][1];
                    foreach ($matrix5 as $key => $value) {
                        echo "<tr>
                        <td>" . (++$i) . "</td>
                        <td>" . $sekolah[$key] . "</td>
                        <td>" . $value . "</td>
                        </tr>";
                    }
                    ?>
                </tbody>
            </table>
            <table>
                <h4>Jarak Solusi Ideal Degatif (D<sub>i</sub><sup>-</sup>)</h4>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Sekolah</th>
                        <th>D<suo>-</sup></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $j = 0;
                    $matrix6 = $data['sol_distance'][2];
                    foreach ($matrix6 as $key => $value) {
                        echo "<tr>
                       <td>" . (++$j) . "</td>
                       <td>" . $sekolah[$key] . "</td>
                       <td>" . $value . "</td>
                       </tr>";
                    }
                     ?>
                </tbody>
            </table>
            <table>
                <h4>Nilai Preferensi(V<sub>i</sub>)</h4>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Sekolah</th>
                        <th>V<sub>i</sub></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $k = 0;
                    $matrix7 = $data['result'];
                    foreach ($matrix7 as $key => $value) {
                        echo "<tr>
                       <td>" . (++$k) . "</td>
                       <td>" . $sekolah[$key] . "</td>
                       <td>" . $value . "</td>
                       </tr>";
                    }
                   ?>
                </tbody>
            </table>
        </div>

    </div>


</main>