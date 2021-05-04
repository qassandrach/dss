<main>
    <div class="card">
        <h3>Tambah Kriteria</h3>
        <form action="<?= BASEURL; ?>/kriteria/tambah_aksi" method="post">

            <div class="form-group">
                <label for="id_kriteria">ID Kriteria</label>
                <div class="form-input">
                    <input type="text" class="col-input" id="id_kriteria" name="id_kriteria" value="<?= $data['no_kriteria']; ?>" readonly="readonly" required="required">
                </div>

            </div>
            <div class="form-group">
                <label for="kriteria">Nama Kriteria</label>
                <div class="form-input">
                    <input type="text" class="col-input" id="kriteria" name="kriteria" placeholder="Nama Kriteria">
                </div>

            </div>
            <div class="after-add-more-wrapper" id="after-add-more-wrapper">
                <div class="after-add-more">
                    <div class="form-group">
                        <label for="">Jenis Penilaian</label>
                        <div class="form-input">
                            <input type="text" id="nama_penilaian" name="nama_penilaian[]" placeholder="Nama Penilaian">
                            <input type="number" id="penilaian" name="penilaian[]" placeholder="Nilai">
                        </div>
                    </div>
                </div>
                

            </div>
            <div class="copy-wrapper">
                    <div class="copy" id="copy">
                        <div class="control-group">
                            <div class="form-group">
                                <label for="">Jenis Penilaian</label>
                                <div class="form-input">
                                    <input type="text" name="nama_penilaian[]" placeholder="Nama Penilaian">
                                    <input type="number" name="penilaian[]" placeholder="Nilai">
                                    <button id="hapus" class="hapus"><a>Hapus</a></button>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>


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