<main>
    <div class="card">
        <h3>Tambah User</h3>
        <form action="<?= BASEURL; ?>/profile/tambah_aksi" method="post">

            <div class="form-group">
                <label for="id_user">ID User</label>
                <div class="form-input">
                    <input type="text" class="col-input" id="id_user" name="id_user" value="<?= $data['no_user']; ?>" readonly="readonly" required="required">
                </div>

            </div>
            <div class="form-group">
                <label for="nama">Nama</label>
                <div class="form-input">
                    <input type="text" class="col-input" id="nama_user" name="nama_user" placeholder="Nama user">
                </div>

            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <div class="form-input">
                    <input type="text" class="col-input" id="email" name="email" placeholder="Email">
                </div>

            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <div class="form-input">
                    <input type="text" class="col-input" id="username" name="username" placeholder="Username">
                </div>

            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <div class="form-input">
                    <input type="password" class="col-input" id="password" name="password" placeholder="Password">
                </div>

            </div>
            
            <div class="form-group">
                <label for="role">Role</label>
                <div class="form-input">
                    <select name="role" id="role" class="form-control">
                        <option>- Pilih Role -</option>
                        <option value="Administrator">Administrator</option>
                        <option value="Viewer">Viewer</option>
                    </select>
                </div>


            </div>

    </div>
    <button id="simpan" type="submit">Simpan</button>
    <!-- <input type="submit" name="simpan" value="Simpan" id="simpan" class="btn btn-primary" /> -->
    <a class="batal" href="<?= BASEURL; ?>/profile/index" class="btn btn-light">Batal</a>

    </form>

    </div>
</main>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
    document.getElementById("simpan").disabled = false;

    function cekPass() {
        var passnm = $('#password2').val();
        var passwd = $('#password').val();

        if (passnm != passwd) {
            document.getElementById("simpan").disabled = false;
            $('.pesan').html('Password tidak sesuai!');
            return true;
        } else {
            document.getElementById("simpan").disabled = false;
            $('.pesan').html('Password sesuai!');
            return true;
        }
    }

    $('.form-checkbox').click(function() {
        if ($(this).is(':checked')) {
            $('.form-password').attr('type', 'text');
        } else {
            $('.form-password').attr('type', 'password');
        }
    });
</script>