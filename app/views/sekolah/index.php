<main>

    <div class="card">
        <h1 id="sekolah">Data Sekolah</h1>
        <div class="section">
            <button><a href="<?= BASEURL; ?>/sekolah/tambah/">Tambah</a></button>
        </div>
        <div class="section">
            <table>
                <thead>
                    <tr>
                        <th>Nama Sekolah</th>
                        <th>Lokasi</th>
                        <th>Jumlah Siswa</th>
                        <th>Akreditasi</th>
                        <th>Aksi</t>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($data['sekolah'] as $sekolah) { ?>

                        <tr>
                            <td><?= $sekolah['nama']; ?></td>
                            <td><?= $sekolah['lokasi']; ?></td>
                            <td><?= $sekolah['siswa']; ?></td>
                            <td><?= $sekolah['akreditasi']; ?></td>
                            <td align="center" class="menu">
                                <a class="btn" id="detail" href="<?= BASEURL; ?>/sekolah/detail/<?= $sekolah['id'];?>">Detail</a>
                                <a class="btn" id="ubah" href="layout.php?content=data_hotel_ubah&id_hotel=<?php echo $row['id_hotel']; ?>">Ubah</a>
                                <a class="btn" id="hapus" href="<?= BASEURL; ?>/sekolah/hapus/<?= $sekolah['id'];?>" onclick="return confirm('Anda yakin ingin menghapus ini?')" />Hapus</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

    </div>


</main>