
<main>

    <div class="card">
        <h1 id="sekolah">Data Kriteria</h1>
        <div class="section">
            <button><a href="<?= BASEURL; ?>/kriteria/tambah">Tambah</a></button>
        </div>
        <div class="section">
            <table>
                <thead>
                    <tr>
                        <th>Nama Kriteria</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($data['kriteria'] as $kriteria) { ?>

                        <tr>
                            <td><?= $kriteria['kriteria']; ?></td>
                            <td align="center" class="menu">
                                <a class="btn" id="ubah" href="<?= BASEURL; ?>/kriteria/ubah/<?= $kriteria['id'];?>">Ubah</a>
                                <a class="btn" id="hapus" href="layout.php?content=data_hotel_hapus&id_hotel=<?php echo $row['id_hotel']; ?>" onclick="return confirm('Anda yakin ingin menghapus ini?')" />Hapus</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

    </div>


</main>