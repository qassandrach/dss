<div class="card">
    <h1 id="sekolah">Data Sekolah</h1>
    <?php if ($_SESSION && $_SESSION['role'] === 'Administrator') { ?>
        <div class="section">
            <button><a href="<?= BASEURL; ?>/sekolah/tambah/">Tambah</a></button>
        </div>
    <?php } ?>

    <div class="section">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Sekolah</th>
                    <th class="alamat">Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($data['sekolah'] as $sekolah) {
                ?>

                    <tr>
                        <td><?= $sekolah['id_sekolah']; ?></td>
                        <td><?= $sekolah['nama']; ?></td>
                        <td><?= $sekolah['alamat']; ?></td>
                        <td align="center" class="menu">
                            <a class="btn" id="detail" href="<?= BASEURL; ?>/sekolah/detail/<?= $sekolah['id_sekolah']; ?>">Detail</a>
                            <a class="btn tampilModalUbah" id="ubah" href="<?= BASEURL; ?>/sekolah/edit/<?= $sekolah['id_sekolah']; ?>">Ubah</a>
                            <a class="btn" id="hapus" href="<?= BASEURL; ?>/sekolah/hapus/<?= $sekolah['id_sekolah']; ?>" onclick="return confirm('Anda yakin ingin menghapus ini?')" />Hapus</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</div>