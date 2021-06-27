
    <div class="login">
        <h3>Login</h3>
        <form action="<?= BASEURL; ?>/login/login_aksi" method="post">

    
            <div class="form-group">
                <label for="username">Username</label>
                <div class="form-input">
                    <input type="text" class="col-input" id="username" name="username" placeholder="Username">
                </div>

            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <div class="form-input">
                    <input type="password" class="col-input" id="password" name="password" placeholder="Password" required="required">
                </div>

            </div>
              
                <button id="simpan" type="submit">Masuk</button>
                <a class="batal" href="<?= BASEURL; ?>/kriteria/index" class="btn btn-light">Forgot Password?</a>

        </form>

    </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</body>
