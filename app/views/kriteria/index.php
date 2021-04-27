
<main>

    <div class="card">
        <h1 id="sekolah">Data Kriteria</h1>
        <div class="section">
            <button>Tambah</button>
        </div>
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
                            <td align="center">
                                <a class="btn" id="detail" href="<?= BASEURL; ?>/sekolah/detail/<?= $kriteria['id'];?>">Detail</a>
                                <a class="btn" id="ubah" href="layout.php?content=data_hotel_ubah&id_hotel=<?php echo $row['id_hotel']; ?>">Ubah</a>
                                <a class="btn" id="hapus" href="layout.php?content=data_hotel_hapus&id_hotel=<?php echo $row['id_hotel']; ?>" onclick="return confirm('Anda yakin ingin menghapus ini?')" />Hapus</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

    </div>


</main>