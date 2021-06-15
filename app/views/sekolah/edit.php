<main>
    <? $sekolah = $data['sekolah'];
    $penilaian = json_decode($sekolah['penilaian'], true);

    ?>
    <div class="card">
        <form action="<?= BASEURL; ?>/sekolah/edit_aksi" method="post">
            <h3>Ubah Data Sekolah</h3>
            <div class="form-group">
                <label for="id_sekolah">Id Sekolah</label>
                <div class="form-input">
                    <input type="text" name="id_sekolah" value="<?= $sekolah['id_sekolah']; ?>" readonly="readonly" required="required" />
                </div>
            </div>
            <div class="form-group">
                <label for="id_sekolah">Nama Sekolah</label>
                <div class="form-input">
                    <input type="text" name="nama_sekolah" value="<?= $sekolah['nama']; ?>" required="required" />
                </div>
            </div>

            <div class="form-group">
                <label for="id_sekolah">Jumlah Siswa</label>
                <div class="form-input">
                    <input type="text" name="jumlah_siswa" value="<?= $sekolah['siswa']; ?>" required="required" />
                </div>
            </div>

            <?php

            for ($i = 0; $i < count($data['kriteria']); $i++) {
                $kriteria = $data['kriteria'][$i];
                $tampil = json_decode($kriteria['penilaian'], true);
            ?>

                <div class="form-group">
                    <label for="jenis_penilaian"><?= $kriteria['kriteria'] ?></label>
                    <input type="hidden" name="idkriteria[]" value="<?= $kriteria['id_kriteria'] ?>" readonly="readonly" />
                    <input type="hidden" name="nama_penilaian[]" value="<?= $kriteria['kriteria'] ?>" readonly="readonly" />
                    <input type="hidden" name="penilaian[]" id="penilaianText" value="<?= $penilaian[$i]['jenis' . $i]; ?>"/>
                    <div class="form-input">
                        <!-- dari sini udah untuk input lokasi dan kawan2nya -->
                        <select class="form-control" required="required" id="penilaian">
                            <option value="<?= $penilaian[$i]['nilai' . $i]; ?>"><?php echo $penilaian[$i]['jenis' . $i]; ?></option>
                            <?php foreach ($tampil as $key => $value) { ?>
                                <!-- mau ngambil value jenis nya juga -->
                                <option value="<?= $value['nilai'] ?>"><?= $value['jenis'] ?></option>
                            <?php } ?>
                        </select>
                        <!-- value optionnya ditaro disini via javascript -->
                        <input type="text" name="inphasil[]" value="<?= $penilaian[$i]['nilai' . $i]; ?>" class="form-control form-control-sm" id="inphasil" required="required" readonly />

                    </div>

                </div>
            <?php

            }
            ?>
            <div class="form-group">
                <label for="alamt">Alamat</label>
                <div class="form-input">
                    <textarea class="form-control" name="alamat" rows="8" cols="25" placeholder="Alamat sekolah" required="required"><?= $sekolah['alamat']; ?></textarea>
                </div>

            </div>
            <button id="simpan" type="submit">Simpan</button>
            <a class="batal" href="<?= BASEURL; ?>/sekolah/index" class="btn btn-light">Batal</a>

        </form>

    </div>
</main>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
    // ini javascriptnya
    $('body').on('change', '#penilaian', function() {
        var hasil = $(this).val();
        var label = $(this).children('option:selected').text();
        $(this).parent().parent().find("#inphasil").attr('value', hasil);
        // $('#penilaianText').val(label);
        $(this).parent().parent().find('#penilaianText').val(label);
    });
</script>