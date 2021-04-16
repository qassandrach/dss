<main>
    <h1>Data Sekolah</h1>

    <table>
        <thead>
            <tr>
                <th>Id Sekolah</th>
                <th>Nama Sekolah</th>
                <th>Lokasi</th>
                <th>Jumlah Siswa</th>
                <th>Akreditasi</th>
            </tr>
        </thead>

    <tbody>
    
    </tbody>
    </table>

    <?php foreach ($data['sekolah'] as $sekolah) { ?>
        <ul>
            <li><?= $sekolah['nama']; ?></li>
            <li><?= $sekolah['lokasi']; ?></li>
            <li><?= $sekolah['siswa']; ?></li>
            <li><?= $sekolah['akreditasi']; ?></li>
        </ul>

    <?php } ?>

</main>