<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PENDAFTARAN PASIEN</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet" />
    <style>
      body {
        margin: 0;
        padding: 0;
        height: 100vh;
      }
      .Dasar {
        display: flex;
        height: 97vh;
        font-family: "Poppins", sans-serif;
        font-weight: bold;
      }

      .kiri {
        flex: 2.5;
        background-image: url(/gambar/kiri-1.png);
        background-size: cover; /* Mengatur agar gambar ditampilkan sepenuhnya tanpa terpotong */
        background-repeat: no-repeat; /* Menghindari pengulangan gambar */
        background-position: center; /* Posisi gambar di tengah-tengah */
        display: flex;
        flex-direction: column;
      }

      .atas-kiri {
        flex: 1.5;
        display: flex; /* Mengatur tata letak menjadi flex */
        align-items: center;
      }

      .bawah-kiri {
        flex: 8.5;
      }

      .kanan {
        flex: 7.5;
        display: flex;
        flex-direction: column;
      }

      .atas-kanan {
        flex: 1.5;
        display: flex;
        align-items: center;
        background-color: #e8e8e8;
      }

      .bawah-kanan {
        flex: 8.5;
        background-color: white;
        display: flex;
        justify-content: center;
        align-items: center;
      }

      .konten {
        width: 95%;
        height: 90%;
        display: flex;
        flex-direction: column;
        align-items: center;
        background-color: #555cb3;
        border-bottom-left-radius: 20px;
        border-bottom-right-radius: 20px;
      }

      .konten-atas {
        width: 100%;
        display: flex;
        flex: 1;
        background-image: linear-gradient(to right, #8b55fe, #5ddde7);
      }

      

      .konten-bawah {
        width: 100%;
        flex: 9;
        display: flex;
        background-color: #555cb3;
        border-bottom-left-radius: 20px;
        border-bottom-right-radius: 20px;
      }

      .konten-bawah-kiri,
      .konten-bawah-kanan {
        width: 50%;
      }

      .konten-bawah-kiri div,
      .konten-bawah-kanan div {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        padding: 10px;
      }

      .konten-bawah-kiri label,
      .konten-bawah-kanan label {
        color: white;
        margin-bottom: 5px;
        margin-top: 10px;
        margin-left: 40px;
      }

      .konten-bawah-kiri input,
      .konten-bawah-kanan input {
        width: 80%;
        height: 2.5px;
        padding: 12px;
        margin-bottom: 5px;
        margin-left: 30px;
        border: 2px solid #fff;
        outline: none;
        border-radius: 20px;
        transition: border-color 0.3s; /* Efek transisi saat hover */
      }

      select {
        width: 85%;
        margin-bottom: 5px;
        margin-left: 30px;
        border: 2px solid #fff;
        outline: none;
        padding: 7px;
        border-radius: 5px;
        border-radius: 20px;
      }
      option {
          width: 80%;
          margin: 2px;
          border: none;
          outline: none;
          padding: 8px;
          border-radius: 5px;
          border: 1px solid gray;
      }

      .konten-bawah-kiri input:focus,
      .konten-bawah-kanan input:focus {
        border-color: white; /* Warna border saat input di-tekan */
      }

      .konten-bawah-kanan .daftar {
        margin-right: 47px;
        margin-top: 20px; 
        align-self: flex-end; 
        padding: 10px 30px; 
        font-weight: bold;
        font-size: 16px; 
        border-radius: 10px; 
        background-color: black; 
        color: white; 
        border: none; 
        cursor: pointer; 
        transition: background-color 0.3s, color 0.3s; 
      }

      .konten-bawah-kanan .daftar:hover {
        background-color: red; 
        color: white; 
      }



      .logo-kiri-atas {
        margin-left: 20px;
        margin-right: 10px;
        width: 40px;
        height: 40px;
      }

      .teks-logo-kiri-atas {
        height: 30px;
        font-size: 28px;
        color: white;
      }

      .logo-kanan-atas {
        margin-left: 40px;
        margin-right: 20px;
        width: 40px;
        height: 40px;
      }

      .teks-logo-kanan-atas {
        height: 30px;
        font-size: 28px;
        color: black;
      }

      .btn-kiri-1 {
        margin-left: 25px;
        margin-top: 2px;
        display: inline-block;
        padding: 10px 20px;
        font-size: 20px;
        border-radius: 20px;
        background-color: transparent;
        color: white;
        border: none;
        cursor: pointer;
        text-decoration: none;
        overflow: hidden;
        position: relative;
        transition: all ease-in 0.3s;
      }

      .btn-kiri-1:hover {
        background-color: #555cb3;
        transition: all ease-in 0.3s;
        transform: scale(1.05);
      }

      .btn-kiri-1 .btn-icon {
        width: 30px;
        height: auto;
        vertical-align: middle;
        margin-right: 10px;
        margin-top: -4px;
      }

      .btn-kiri-1 .btn-text {
        vertical-align: middle;
      }

      .search-input {
        margin-left: 15px;
        background: url("/gambar/icon-search.png") no-repeat 240px center;
        background-size: 20px 20px;
        background-color: #555cb3;
        border: none;
        border-radius: 20px;
        padding: 6px 13px;
        font-size: 16px;
        width: 250px;
        outline: none;
        transition: background-color 0.3s, color 0.3s;
      }

      .search-input::placeholder {
        color: white;
      }

      .search-input:focus {
        background-color: white;
        color: black;
      }

      .konten-atas .teks {
        margin-left: 20px;
        font-size: 22px;
        color: white;
      }

      .footer {
        background-image: linear-gradient(90deg, rgb(137, 91, 252), rgb(93, 225, 230));
        height: 3vh;
      }

      
    </style>
  </head>
  <body>
    <div class="Dasar">
      <div class="kiri">
        <div class="atas-kiri">
          <img class="logo-kiri-atas" src="/gambar/logo.png" alt="" />
          <h1 class="teks-logo-kiri-atas">RSUD Dr.Radjiman</h1>
        </div>
        <div class="bawah-kiri">
          <a href="#" class="btn-kiri-1">
            <img src="/gambar/btn-icon1.png" alt="Icon" class="btn-icon" />
            <span class="btn-text">Terbuka setelah login</span> </a
          ><br />
          <a href="#" class="btn-kiri-1">
            <img src="/gambar/btn-icon2.png" alt="Icon" class="btn-icon" />
            <span class="btn-text">Terbuka setelah login</span> </a
          ><br />
          <a href="#" class="btn-kiri-1">
            <img src="/gambar/btn-icon3.png" alt="Icon" class="btn-icon" />
            <span class="btn-text">Terbuka setelah login</span> </a
          ><br />
          <a href="#" class="btn-kiri-1">
            <img src="/gambar/btn-icon4.png" alt="Icon" class="btn-icon" />
            <span class="btn-text">Terbuka setelah login</span> </a
          ><br />
          <a href="#" class="btn-kiri-1">
            <img src="/gambar/btn-icon5.png" alt="Icon" class="btn-icon" />
            <span class="btn-text">Terbuka setelah login</span> </a
          ><br />
          <a href="#" class="btn-kiri-1">
            <img src="/gambar/btn-icon6.png" alt="Icon" class="btn-icon" />
            <span class="btn-text">Terbuka setelah login</span> </a
          ><br />
          <a href="#" class="btn-kiri-1">
            <img src="/gambar/btn-icon7.png" alt="Icon" class="btn-icon" />
            <span class="btn-text">Terbuka setelah login</span> </a
          ><br />
          <br /><br /><br />
          <a href="#" class="btn-kiri-1">
            <img src="/gambar/btn-icon9.png" alt="Icon" class="btn-icon" />
            <span class="btn-text">Terbuka setelah login</span> </a
          ><br />
          ><br />
        </div>
      </div>
      <div class="kanan">
        <div class="atas-kanan">
          <img class="logo-kanan-atas" src="/gambar/icon-kananatas.png" alt="" />
          <h1 class="teks-logo-kanan-atas">PENDAFTARAN</h1>

          <input type="text" class="search-input" placeholder="search..." />
        </div>
        <div class="bawah-kanan">
          <div class="konten">
            <div class="konten-atas">
              <h2 class="teks">PENDAFTARAN PENGGUNA BARU</h2>
            </div>
            <form class="konten-bawah" action="/register" method="POST" class="d-inline">
              @csrf

                <div class="konten-bawah-kiri">
                  <div>
                    <label for="">Nomer NIK</label>
                    <input class="konten-bawah-input" type="text" id="nik" name="nik" autofocus required>
                    <label for="">Nama Lengkap</label>
                    <input class="konten-bawah-input" type="text" id="name" name="name" required>
                    <label for="">Username</label>
                    <input class="konten-bawah-input" type="text" id="username" name="username" required>
                    <label for="">Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="jenis_kelamin">
                      <option value="1">Laki-Laki</option>
                      <option value="0">Perempuan</option>
                    </select>
                    <label for="">Tanggal Lahir</label>
                    <input class="konten-bawah-input" type="date" id="tgl_lahir" name="tgl_lahir" required>
                  </div>
                </div>
                <div class="konten-bawah-kanan">
                  <div>
                    <label for="">Nomor Telepon</label>
                    <input class="konten-bawah-input" type="text" id="no_hp" name="no_hp" required>
                    <label for="">Alamat</label>
                    <input class="konten-bawah-input" type="text" id="alamat" name="alamat" required>
                    <label for="">Tingkatan User</label>
                    <select name="tingkatan_user" id="tingkatan_user">
                      <option value="pasien">Pasien</option>
                    </select>
                    <label for="">Password Akun</label>
                    <input class="konten-bawah-input" type="text" id="password" name="password" required>
                    <button class="daftar" type="submit">KIRIM</button>
                  </div>
                </div>
              
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="footer"></div>
  </body>
</html>
