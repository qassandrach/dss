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
                    var_dump($data['normalized_mtrx']);
                    ?>
                </tbody>
            </table>
            <table>
                <thead>
                    <tr>
                        <th>Ranking</th>
                        <th>Nama Sekolah</th>
                        <th>Nilai Preferensi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>


                    <tr>
                        <td><?= $hasil['id_alternatif']; ?></td>
                        <td><?= $hasil['id_kriteria']; ?></td>
                        <td><?= $hasil['nilai']; ?></td>
                        <td align="center" class="menu">
                            <a class="btn" id="detail" href="<?= BASEURL; ?>/sekolah/detail/<?= $sekolah['id_sekolah']; ?>">Detail</a>
                            <a class="btn tampilModalUbah" id="ubah" href="<?= BASEURL; ?>/sekolah/edit/<?= $sekolah['id_sekolah']; ?>">Ubah</a>
                            <a class="btn" id="hapus" href="<?= BASEURL; ?>/sekolah/hapus/<?= $sekolah['id_sekolah']; ?>" onclick="return confirm('Anda yakin ingin menghapus ini?')" />Hapus</a>
                        </td>
                    </tr>
                    <?php ?>
                </tbody>
            </table>


        </div>

    </div>


</main>