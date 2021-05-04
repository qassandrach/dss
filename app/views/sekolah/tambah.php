<main>
    <div class="card">
        <h3>Tambah Kriteria</h3>
        <form action="<?= BASEURL; ?>/kriteria/tambah_aksi" method="post">

            <div class="form-group">
                <label for="id_kriteria">ID Kriteria</label>
                <div class="form-input">
                    <input type="text" class="col-input" id="id_kriteria" name="id_kriteria" value="<?= $data['no_sekolah']; ?>" readonly="readonly" required="required">
                </div>

            </div>
            <div class="form-group">
                <label for="kriteria">Nama Sekolah</label>
                <div class="form-input">
                    <input type="text" class="col-input" id="kriteria" name="kriteria" placeholder="Nama Kriteria">
                </div>

            </div>
            <?php
            foreach ($data['kriteria'] as $kriteria) { ?>
                <div class="form-group">
                    <label for="jenis_penilaian"><?= $kriteria['kriteria'] ?></label>
                    <input type="hidden" name="jenis_penilaian[]" value="<?= $row['jenis_fasilitas'] ?>" readonly="readonly" />
                    <select name="penilaian[]" class="form-control" required="required" id="inpnilai">
                    <option>- Pilih <?php echo $row['jenis_fasilitas']; ?> -</option>

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
    $(document).ready(function() {
        var el = `<div class="after-add-more">
                    <div class="form-group">
                        <label for="">Jenis Penilaian</label>
                        <div class="form-input">
                            <input type="text" id="jenis_penilaian" name="jenis_penilaian">
                            <input type="number" id="penilaian" name="penilaian">
                        </div>
                    </div>
                </div>`
        $(".tambah").click(function() {

            $(".after-add-more-wrapper").append(el);
        });

        // untuk menghapus field
        $("body").on("click", ".hapus", function() {
            $(this).parents(".control-group").remove();
        });

    });
</script>