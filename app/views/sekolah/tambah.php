<main>
    <div class="card">
        <h3>Tambah Sekolah</h3>
        <form action="<?= BASEURL; ?>/kriteria/tambah_aksi" method="post">

            <div class="form-group">
                <label for="id_kriteria">ID Sekolah</label>
                <div class="form-input">
                    <input type="text" class="col-input" id="id_kriteria" name="id_kriteria" value="<?= $data['no_sekolah']; ?>" readonly="readonly" required="required">
                </div>

            </div>
            <div class="form-group">
                <label for="kriteria">Nama Sekolah</label>
                <div class="form-input">
                    <input type="text" class="col-input" id="nama_sekolah" name="nama_sekolah" placeholder="Nama Sekolah">
                </div>

            </div>
            <div class="form-group">
                <label for="kriteria">Jumlah Siswa</label>
                <div class="form-input">
                    <input type="text" class="col-input" id="jumlah_siswa" name="jumlah_siswa" placeholder="Jumlah siswa">
                </div>

            </div>
            <?php
            foreach ($data['kriteria'] as $kriteria) { 
            $tampil = json_decode($kriteria['penilaian'], true); ?>
                <div class="form-group">
                    <label for="jenis_penilaian"><?= $kriteria['kriteria'] ?></label>
                    <div class="form-input">
                        <input type="hidden" name="nama_penilaian[]" value="<?= $kriteria['nama_fasilitas'] ?>" readonly="readonly" />
                        <select name="penilaian[]" class="form-control" required="required" id="penilaian">
                            <option>- Pilih <?php echo $kriteria['kriteria']; ?> -</option>
                            <?php foreach ($tampil as $key => $value) { ?>
                                <option value="<?= $value['nilai'] ?>"><?= $value['jenis'] ?></option>
                            <?php } ?>
                        </select>
                        <input type="text" name="inphasil[]" class="form-control form-control-sm" id="inphasil" value="0" required="required" readonly />

                    </div>


                </div>
            <?php }
            ?>
            <button id="simpan" type="submit">Simpan</button>
            <a class="batal" href="<?= BASEURL; ?>/kriteria/index" class="btn btn-light">Batal</a>

        </form>

    </div>
</main>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
    $('body').on('change', '#penilaian', function() {
		// mengambil nilai
		var hasil = $(this).val();
		// untuk megisi nilai pada total
		$(this).parent().parent().find("#inphasil").attr('value', hasil);
	});
</script>