<h2>SPK Prioritas Sekolah</h2>

<form action="<?= BASEURL; ?>/hasil/tambah" method="POST">

    <div class="form-group">


        <div class="form-input">

            <input type="text" class="col-input" list="schools" name="schools" placeholder="Pilih Sekolah" id="school">
            <datalist id="schools">
                <?php foreach ($data['sekolah'] as $sekolah) { ?>
                    <option value="<?= $sekolah['nama_sekolah'] ?>"><?= $sekolah['id_sekolah'] ?> - <?= $sekolah['nama_sekolah'] ?></option>


                <?php

                }

                ?>

            </datalist>


        </div>

    </div>

    <div class="form-group">
       
        <div class="form-input">
            <button type="submit" class="btn">Tambah</button>
        </div>

    </div>


</form>

