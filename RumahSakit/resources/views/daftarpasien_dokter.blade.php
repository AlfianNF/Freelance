<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>daftar pasien</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel="stylesheet" href="daftarpasien_dokter.css" />
    <style></style>
  </head>
  <body>
    <div class="Dasar">
      <div class="kiri">
        <div class="atas-kiri">
          <img class="logo-kiri-atas" src="../gambar/logo.png" alt="" />
          <h1 class="teks-logo-kiri-atas">RSUD Dr.Radjiman</h1>
        </div>
        <div class="bawah-kiri">
          <a href="dashboard_dokter.html" class="btn-kiri-1">
            <img src="../gambar/btn-icon1.png" alt="Icon" class="btn-icon" />
            <span class="btn-text">Dashboard</span> </a
          ><br />
          <a href="daftarpasien_dokter.html" class="aktif_btn">
            <img src="../gambar/btn-icon2.png" alt="Icon" class="btn-icon" />
            <span class="btn-text">Daftar Pasien</span> </a
          ><br />
          <a href="pemeriksaan_dokter.html" class="btn-kiri-1">
            <img src="../gambar/clipboard-data.svg" alt="Icon" class="btn-icon" />
            <span class="btn-text">Pemeriksaan</span> </a
          ><br />
          <a href="riwayat_dokter.html" class="btn-kiri-1">
            <img src="../gambar/clock-history.svg" alt="Icon" class="btn-icon" />
            <span class="btn-text">Riwayat</span> </a
          ><br />
          <a href="#" class="btn-kiri-1">
            <img src="../gambar/btn-icon8.png" alt="Icon" class="btn-icon" />
            <span class="btn-text">Setting</span> </a
          ><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
          <a href="#" class="btn-kiri-1">
            <img src="../gambar/btn-icon9.png" alt="Icon" class="btn-icon" />
            <span class="btn-text">Log Out</span> </a
          ><br />
          <a href="#" class="btn-kiri-1">
            <img src="../gambar/btn-icon10.png" alt="Icon" class="btn-icon" />
            <span class="btn-text">Help</span> </a
          ><br />
        </div>
      </div>
      <div class="kanan">
        <div class="atas-kanan">
          <img class="logo-kanan-atas" src="../gambar/icon-kananatas.png" alt="" />
          <h1 class="teks-logo-kanan-atas">PENDAFTARAN</h1>
          <i class="bi bi-bell-fill"></i>
          <input type="text" class="search-input" placeholder="search..." />
          <span class="dokter">D</span>
        </div>
        <div class="bawah-kanan">
          <div class="sampul">
            <div class="judul">
              <span class="desjudul">TABEL DAFTAR PASIEN</span>
              <span class="entry"> Tampilkan Entry</span>
            </div>
            <div class="konten">
              <!-- Elemen tambahan untuk garis vertikal -->
              <div class="vertical-line1"></div>
              <div class="vertical-line2"></div>
              <div class="vertical-line3"></div>
              <div class="vertical-line4"></div>
              <table class="table-bordered">
                <thead>
                  <tr class="thead">
                    <th style="width: 10%">Antrian</th>
                    <th style="width: 20%">NO RM</th>
                    <th style="width: 40%">Nama Pasien</th>
                    <th style="width: 10%">P/L</th>
                    <th style="width: 10%">Umur</th>
                    <th style="width: 15%">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <!-- Isi tabel disini -->
                  <tr>
                    <th>001</th>
                    <th>UM.001-0001</th>
                    <th>Muhammad Yusuf Abdurrahman</th>
                    <th>L</th>
                    <th>20</th>
                    <th>
                      <button class="button"><span class="font">Mulai</span></button>
                    </th>
                  </tr>
                  <tr>
                    <th>002</th>
                    <th>UM.001-0002</th>
                    <th>yusuf</th>
                    <th>L</th>
                    <th>20</th>
                    <a href="#">
                      <th>
                        <button class="button" type="submit"><span class="font">Mulai</span></button>
                      </th>
                    </a>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer"></div>
    <script></script>
  </body>
</html>
