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
                    for ($i=1; $i <= count($data['sekolah']); $i++) { 
                        $sekolah[$i] = $data['sekolah'][$i-1]['nama'];
                    }

                    $matrix = $data['normalized_mtrx'];
                    foreach ($matrix as $key => $value) {
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

        </div>

    </div>


</main>