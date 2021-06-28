<main>

    <div class="card">
        <h1 id="sekolah">Data Kriteria</h1>

        <?php if ($_SESSION && $_SESSION['role'] === 'Administrator') { ?>
            <div class="section">
                <button><a href="<?= BASEURL; ?>/kriteria/tambah">Tambah</a></button>
            </div>
        <?php } ?>

        <div class="section">
            <table>
                <thead>
                    <tr>
                        <th>Nama Kriteria</th>
                        <th>Bobot</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($data['kriteria'] as $kriteria) { ?>

                        <tr>
                            <td><?= $kriteria['kriteria']; ?></td>
                            <td><?= $kriteria['bobot']; ?></td>
                            <td align="center" class="menu">
                                <a class="btn" id="ubah" href="<?= BASEURL; ?>/kriteria/edit/<?= $kriteria['id_kriteria']; ?>">Ubah</a>
                                <a class="btn" id="hapus" href="<?= BASEURL; ?>/kriteria/hapus/<?= $kriteria['id_kriteria']; ?>" onclick="return confirm('Anda yakin ingin menghapus ini?')" />Hapus</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

    </div>


</main>