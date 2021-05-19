<main>
    <? $kriteria = $data['kriteria'];
    $penilaian = json_decode($kriteria['penilaian'], true);


    ?>
    <div class="card">
        <h3>Ubah Data Kriteria</h3>
        <form action="<?= BASEURL; ?>/kriteria/edit_aksi" method="post">

            <div class="form-group">
                <label for="id_kriteria">ID Kriteria</label>
                <div class="form-input">
                    <input type="text" class="col-input" id="id_kriteria" name="id_kriteria" value="<?= $kriteria['id_kriteria']; ?>" readonly="readonly" required="required">
                </div>

            </div>
            <div class="form-group">
                <label for="kriteria">Nama Kriteria</label>
                <div class="form-input">
                    <input type="text" class="col-input" id="kriteria" name="kriteria" value="<?= $kriteria['kriteria']; ?>" required="required">
                </div>

            </div>
            <?
            foreach ($penilaian as $key => $value) {
            
            ?>
                <div class="after-add-more">
                    <div class="form-group">
                        <label for="">Jenis Penilaian</label>
                        <div class="form-input">
                            <input type="text" id="nama_penilaian" name="nama_penilaian[]" placeholder="Nama Penilaian" value="<?= $value['jenis']; ?>">
                            <input type="number" id="penilaian" name="penilaian[]" value="<?= $value['nilai']; ?>" equired="required">
                            <button id="hapus" class="hapus"><a>Hapus</a></button>
                        </div>
                    </div>
                </div>

            <?
            }
            ?>

            <div class="after-add-more-wrapper"></div>

            <div class="form-group">
                <label for=""></label>
                <div class="form-input">
                    <button class="tambah" type="button">Tambah</button>
                </div>

            </div>


            <button id="simpan" type="submit">Simpan</button>
            <a class="batal" href="<?= BASEURL; ?>/kriteria/index" class="btn btn-light">Batal</a>

        </form>

    </div>
</main>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var el = `
                    <div class="form-group">
                        <label for="">Jenis Penilaian</label>
                        <div class="form-input">
                            <input type="text" id="jenis_penilaian" name="nama_penilaian[]" placeholder="Nama Penilaian">
                            <input type="number" id="penilaian" name="penilaian[]" placeholder="Nilai">
                            <button id="hapus" class="hapus"><a>Hapus</a></button>
                        </div>
                    </div>
                <div class="after-add-more-wrapper"></div>`
        $(".tambah").click(function() {

            $(".after-add-more-wrapper").replaceWith(el);
        });

        // untuk menghapus field
        $("body").on("click", ".hapus", function() {
            $(this).parents(".form-group").remove();
        });

    });
</script>