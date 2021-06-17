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
                    for ($i=1; $i <= count($data['sekolah']); $i++) { 
                        $sekolah[$i] = $data['sekolah'][$i-1]['nama'];
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
                   
                    $matrix3 = $data['ideal_solution'];
                    foreach ($matrix3 as $key => $value) {
                        echo "<tr>";
                        echo "<td>" . $key . "</td>";
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