<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pemeriksaan Dokter</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel="stylesheet" href="pemeriksaan_dokter.css" />
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
          <a href="daftarpasien_dokter.html" class="btn-kiri-1">
            <img src="../gambar/btn-icon2.png" alt="Icon" class="btn-icon" />
            <span class="btn-text">Daftar Pasien</span> </a
          ><br />
          <a href="pemeriksaan_dokter.html" class="aktif_btn">
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
          <div class="konten">
            <div class="konten-atas">
              <h2 class="teks">PEMERIKSAAN PASIEN</h2>
            </div>
            <div class="konten-bawah">
              <div class="isi">
                <form action="" method="post">
                  <table class="table1">
                    <tr>
                      <td><span class="text">No Antrian Pasien</span></td>
                      <td><span class="text">No Rekam Medis</span></td>
                    </tr>
                    <tr>
                      <td><input type="text" class="input1" placeholder="" /></td>
                      <td><input type="text" class="input1" placeholder="" /></td>
                    </tr>
                  </table>
                  <table class="table2">
                    <tr>
                      <td><span class="text">Keluhan Pasien</span></td>
                      <td><span class="text">Pemeriksaan Fisik</span></td>
                    </tr>
                    <tr>
                      <td><textarea name="" id="" cols="30" rows="10" class="input2"></textarea></td>
                      <td><textarea name="" id="" cols="30" rows="10" class="input2"></textarea></td>
                    </tr>
                  </table>
                  <table class="table3">
                    <tr>
                      <td><span class="text">Catatan Dokter</span></td>
                    </tr>
                    <tr>
                      <td><textarea name="" id="" cols="30" rows="10" class="input3"></textarea></td>
                    </tr>
                  </table>
                  <table class="table4">
                    <tr>
                      <td><a href="#">
                        <button type="submit" class="btn"><span class="text">Lab</span></button>
                      </td></a>
                      <td><a href="#">
                        <button type="submit" class="btn"><span class="text">Resep</span></button>
                      </td></a>
                      <td><a href="#">
                        <button type="submit" class="btn"><span class="text">Simpan</span></button>
                      </td></a>
                    </tr>
                  </table>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer"></div>
  </body>
</html>
