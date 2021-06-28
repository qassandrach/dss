<main>
    <? $user = $data['user'];

    ?>
    <div class="card">
        <form action="<?= BASEURL; ?>/profile/edit_aksi" method="post">
            <h3>Ubah Data User</h3>
            <div class="form-group">
                <label for="id_user">Id user</label>
                <div class="form-input">
                    <input type="text" name="id_user" value="<?= $user['id_user']; ?>" readonly="readonly" required="required" />
                </div>
            </div>
            <div class="form-group">
                <label for="id_user">Nama</label>
                <div class="form-input">
                    <input type="text" name="nama" value="<?= $user['nama']; ?>" required="required" />
                </div>
            </div>

            <div class="form-group">
                <label for="id_user">Email</label>
                <div class="form-input">
                    <input type="text" name="email" value="<?= $user['email']; ?>" required="required" />
                </div>
            </div>

            <div class="form-group">
                <label for="role">Role</label>
                <div class="form-input">
                    <select name="role" id="role" class="form-control">
                        <option><?= $user['role']; ?></option>
                        <option value="Administrator">Administrator</option>
                        <option value="Viewer">Viewer</option>
                    </select>
                </div>


            </div>

            <button id="simpan" type="submit">Simpan</button>
            <a class="batal" href="<?= BASEURL; ?>/user/index" class="btn btn-light">Batal</a>

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