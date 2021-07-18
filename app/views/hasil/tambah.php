<?php $sekolah = $data['schools'];
?>
<div class="card">
        <form action="<?= BASEURL; ?>/hasil/tambah_aksi" method="post">
            <h3>Penilaian Sekolah</h3>
            <div class="form-group">
                <label for="id_sekolah">Id Sekolah</label>
                <div class="form-input">
                    <input type="text" name="id_sekolah" value="<?= $sekolah['id_sekolah']; ?>" readonly="readonly" required="required" />
                </div>
            </div>
            <div class="form-group">
                <label for="id_sekolah">Nama Sekolah</label>
                <div class="form-input">
                    <input type="text" name="nama_sekolah" value="<?= $sekolah['nama_sekolah']; ?>" readonly="readonly" required="required" />
                </div>
            </div>

            <div class="form-group">
                <label for="id_sekolah">Kota</label>
                <div class="form-input">
                    <input type="text" name="nama_sekolah" value="<?= $sekolah['kota_sekolah']; ?>" readonly="readonly" required="required" />
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
                    <input type="hidden" name="penilaian[]" id="penilaianText" value=""/>
                    <div class="form-input">
                        <!-- dari sini udah untuk input lokasi dan kawan2nya -->
                        <select class="form-control" required="required" id="penilaian">
                            <option>- Pilih <?php echo $kriteria['kriteria']; ?> -</option>
                            <?php foreach ($tampil as $key => $value) { ?>
                                <!-- mau ngambil value jenis nya juga -->
                                <option value="<?= $value['nilai'] ?>"><?= $value['jenis'] ?></option>   
                            <?php } ?>
                        </select>
                        <!-- value optionnya ditaro disini via javascript -->
                        <input type="text" name="inphasil[]" value="0" class="form-control form-control-sm" id="inphasil" required="required" readonly />

                    </div>

                </div>
            <?php

            }
            ?>
            <div class="form-group">
                <label for="alamt">Alamat</label>
                <div class="form-input">
                    <textarea class="form-control" name="alamat" rows="8" cols="25" placeholder="Alamat sekolah" readonly="readonly" required="required"><?php if ($sekolah['alamat'] == NULL) { echo "Alamat belum tersedia";} else { echo $sekolah['alamat']; } ?></textarea>
                </div>

            </div>
            <button id="simpan" type="submit">Simpan</button>
            <a class="batal" href="<?= BASEURL; ?>/sekolah/index" class="btn btn-light">Batal</a>

        </form>

    </div>