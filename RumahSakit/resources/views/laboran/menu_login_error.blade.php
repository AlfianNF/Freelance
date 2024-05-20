<!DOCTYPE html>
<html lang="en">

<head>
    <title>Halaman_Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
  <body>
    <link rel="stylesheet" href="CSS_tampil_2.css">
</head>

<body>

    <style>
    body {
        margin: 0;
        padding: 0;
    }

    .container {
        background-image: url(/gambar/bg.png);
        background-size: cover;
        /* Mengatur gambar agar mengisi seluruh area */
        background-repeat: no-repeat;
        /* Menghindari pengulangan gambar */
        background-position: center;
        /* Posisi gambar di tengah-tengah */
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .content {
        width: 100%;
        height: 90%;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 10px;
        text-align: center;
    }

    .j1 {
        font-family: ROG Fonts;
        color: #555CB3;
        text-align: center;
        margin-left: 35px;
        font-weight: normal;
        font-size: 350%;
        margin-top: 2%;
        margin-bottom: 0%;
    }

    .j2 {
        font-family: ROG Fonts;
        color: #555CB3;
        text-align: center;
        font-weight: normal;
        font-size: 250%;
        margin-top: 2%;
        margin-bottom: 0%;
    }

    .Login {
        flex: 1;
        padding-right: 20px;
        text-align: left;
        /* Penambahan properti text-align */
    }

    .Login form {
        max-width: 300px;
        margin: 0 auto;
    }

    .gambar-container {
        flex: 1;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .gambar-container img {
        margin-left: 20px;
        max-width: 100%;
        height: auto;
    }

    .input-container {
        position: relative;
        width: 300px;
    }

    .input-container input[type="text"] {
        margin-bottom: 2%;
        width: 100%;
        padding: 10px;
        font-size: 16px;
        border: none;
        outline: none;
        background: url('/gambar/icon1.png') no-repeat 10px center;
        background-size: 20px 20px;
        border-radius: 20px;
        box-shadow: 0 0 0 5px #ccc inset;
        text-indent: 30px;
    }

    .input-container input[type="password"] {
        margin-bottom: 2%;
        width: 100%;
        padding: 10px;
        font-size: 16px;
        border: none;
        outline: none;
        background: url('/gambar/icon2.png') no-repeat 10px center;
        background-size: 20px 20px;
        border-radius: 20px;
        box-shadow: 0 0 0 5px #ccc inset;
        text-indent: 30px;
    }

    .input-container input[type="buka-password"] {
        margin-bottom: 2%;
        width: 100%;
        padding: 10px;
        font-size: 16px;
        border: none;
        outline: none;
        background: url('/gambar/icon4.png') no-repeat 10px center;
        background-size: 20px 20px;
        border-radius: 20px;
        box-shadow: 0 0 0 2px #ccc inset;
        text-indent: 30px;
    }

    .input-container input[type="text"]:focus,
    .input-container input[type="buka-password"]:focus,
    .input-container input[type="password"]:focus {
        box-shadow: 0 0 0 2px #007bff inset;
    }

    .eye-icon {
        position: absolute;
        top: 62%;
        left: 270px;
        transform: translateY(-50%);
        cursor: pointer;
    }

    .eye-icon img {
        width: 85%;
        height: auto;
        transition: transform 0.3s ease;
    }

    .eye-icon:hover img {
        transform: scale(1.1);
    }

    .password-toggle-checkbox {
        position: absolute;
        top: 50%;
        right: 0;
        transform: translateY(-50%);
        opacity: 0;
        cursor: pointer;
        z-index: -1;
    }

    .btn-login {
        display: inline-block;
        padding: 2% 10%;
        margin-left: 35%;
        margin-top: 25%;
        margin-bottom: 5%;
        /* Background Gradient */
        background-image: linear-gradient(to right, #8B55FE, #5DDDE7);
        /* Warna latar belakang */
        color: #fff;
        /* Warna teks */
        border: 2px solid #ffffff;
        /* Warna garis tepi */
        border-radius: 40px;
        /* Mengatur sudut melengkung */
        text-decoration: none;
        /* Menghapus dekorasi teks */
        font-family: Arial Rounded MT;
        font-weight: normal;
        font-size: 140%;
        /* Ukuran teks */
        cursor: pointer;
        /* Mengubah kursor saat diarahkan ke tombol */
    }

    .btn-login:hover {
        /* Warna latar belakang saat mouse hover */
        border-color: #555CB3;
        /* Warna garis tepi saat mouse hover */
    }

    /* Menghilangkan garis bawah dari tautan */
    .Login a {
        text-decoration: none;
    }

    .fitur-tambahan {
        color: rgb(0, 0, 0);

    }

    .fitur-tambahan:hover {
        color: #516FF6;
    }

    .fitur-buatAkun {
        color: #000000;

    }

    .fitur-buatAkun:hover {
        color: #516FF6;
    }

    .fitur-panduan {
        color: rgb(0, 0, 0);
        margin-left: 10px;
        margin-right: 90px;
    }

    .fitur-panduan:hover {
        color: #516FF6;
    }

    .fitur-bawah {
        margin-left: 25px;
    }
    </style>

    <div class="container">
        <div class="content">
            <div class="Login">
                <form class="form1" action="{{ route('login.laboran') }}" method="post">
                    @csrf
                    <h1 class="j1">RSUD</h1>
                    <h1 class="j2">Dr.Radjiman</h1>
                    <br>
                    <div class="input-container">
                        <input type="text" id="username" name="username" placeholder="Username" required>
                        <div class="password-container">
                            <input type="password" id="password" name="password" placeholder="Password" required>
                            <input type="checkbox" id="toggle-password" class="password-toggle-checkbox">
                            <label for="toggle-password" class="eye-icon" onmouseover="showPasswordText()"
                                onmouseout="hidePasswordText()"><img src="/gambar/icon_3.png" alt="Toggle Password"></label>

                        </div>
                        
                        <a id="" href="#" class="fitur-panduan">Panduan Login</a>
                        <a id="" href="#" class="fitur-tambahan">Lupa Password</a><br>
                    </div>
                    @if (session('failed'))
                        <div class="alert alert-danger">
                            {{ session('failed') }}
                        </div>
                    @endif
                    @if (session('message'))
                    <div class="alert alert-danger">
                        {{ session('message') }}
                    </div>
                @endif
                    <button class="btn-login" type="submit">Login</button>
                    <div class="fitur-bawah">
                        <p>Anda belum punya akun? <a id="" href="/register" class="fitur-buatAkun">Buat Akun Baru</a></p>
                    </div>
                </form>
                
            </div>
            <div class="gambar-container">
                <img src="/gambar/gambar3.png" alt="">
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script>
    function showPasswordText() {
        document.getElementById("password").setAttribute("type", "buka-password");
    }

    function hidePasswordText() {
        document.getElementById("password").setAttribute("type", "password");
    }
    </script>
</body>

</html>