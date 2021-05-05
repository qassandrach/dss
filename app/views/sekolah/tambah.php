<main>
    <div class="card">
        <h3>Tambah Sekolah</h3>
        <form action="<?= BASEURL; ?>/sekolah/tambah_aksi" method="post">

            <div class="form-group">
                <label for="id_sekolah">ID Sekolah</label>
                <div class="form-input">
                    <input type="text" class="col-input" id="id_sekolah" name="id_sekolah" value="<?= $data['no_sekolah']; ?>" readonly="readonly" required="required">
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
                    <input type="hidden" name="idkriteria[]" value="<?= $kriteria['id_kriteria'] ?>" readonly="readonly" />
                    <input type="hidden" name="nama_penilaian[]" value="<?= $kriteria['kriteria'] ?>" readonly="readonly" />
                    <div class="form-input"> 
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
            <div class="form-group">
                <label for="alamt">Alamat</label>
                <div class="form-input">
                <textarea class="form-control" name="alamat" rows="8" cols="25" placeholder="Alamat sekolah" required="required"></textarea>
                </div>

            </div>
            <button id="simpan" type="submit">Simpan</button>
            <a class="batal" href="<?= BASEURL; ?>/sekolah/index" class="btn btn-light">Batal</a>

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