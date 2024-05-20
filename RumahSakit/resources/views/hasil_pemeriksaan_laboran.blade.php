<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Data Reagen</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel="stylesheet" href="hasil_pemeriksaan_laboran.css" />
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
          <a href="dashboard_laboran.html" class="btn-kiri-1">
            <img src="../gambar/btn-icon1.png" alt="Icon" class="btn-icon" />
            <span class="btn-text">Dashboard</span> </a
          ><br />
          <a href="pemeriksaan_laboran.html" class="btn-kiri-1">
            <img src="../gambar/clipboard-data.svg" alt="Icon" class="btn-icon" />
            <span class="btn-text">Pemeriksaan</span> </a
          ><br />
          <a href="riwayat_laboran.html" class="btn-kiri-1">
            <img src="../gambar/clock-history.svg" alt="Icon" class="btn-icon" />
            <span class="btn-text">Riwayat</span> </a
          ><br />
          <a href="stock_reagen.html" class="aktif_btn">
            <img src="../gambar/btn-icon7.png" alt="Icon" class="btn-icon" />
            <span class="btn-text">Stock Reagen</span> </a
          ><br />
          <a href="kalibrasi_alat.html" class="btn-kiri-1">
            <img src="../gambar/btn-icon6.png" alt="Icon" class="btn-icon" />
            <span class="btn-text">Kalibrasi Alat</span> </a
          ><br />
          <a href="#" class="btn-kiri-1">
            <img src="../gambar/btn-icon8.png" alt="Icon" class="btn-icon" />
            <span class="btn-text">Setting</span> </a
          ><br /><br /><br />
          <br /><br /><br /><br /><br />
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
          <span class="dokter">L</span>
        </div>
        <div class="bawah-kanan">
          <div class="konten">
            <div class="konten-bawah">
              <div class="isi">
                <form action="" method="post">
                  <div class="border">
                    <div class="table-container">
                      <table class="table1">
                        <tr>
                          <td><span class="text">No RM</span></td>
                          <td><span class="text">:</span><input type="text" class="input1" placeholder="" /></td>
                        </tr>
                        <tr>
                          <td><span class="text">NIK</span></td>
                          <td><span class="text">:</span><input type="text" class="input1" placeholder="" /></td>
                        </tr>
                        <tr>
                          <td><span class="text">Nama</span></td>
                          <td><span class="text">:</span><input type="text" class="input1" placeholder="" /></td>
                        </tr>
                        <tr>
                          <td><span class="text">Tanggal Lahir</span></td>
                          <td><span class="text">:</span><input type="text" class="input1" placeholder="" /></td>
                        </tr>
                        <tr>
                          <td><span class="text">Umur</span></td>
                          <td><span class="text">:</span><input type="text" class="input1" placeholder="" /></td>
                        </tr>
                      </table>
                      <table class="table2">
                        <!-- Isi tabel kedua -->
                        <tr>
                          <td><span class="text">Alamat </span></td>
                          <td><span class="titik">:</span><textarea name="" id="" cols="30" rows="10" class="textarea"></textarea></td>
                        </tr>
                        <tr>
                          <td><span class="text">Pemeriksaan</span></td>
                          <td><span class="text">:</span><input type="text" class="input1" placeholder="" /></td>
                        </tr>
                        <tr>
                          <td></td>
                          <td>
                            <button type="submit" class="btn_sop"><span class="textt">SOP</span></button>
                          </td>
                        </tr>
                      </table>
                    </div>
                  </div>
                  <div class="checkbox">
                    <div class="checkbox-container">
                      <label for="checkbox" class="label">Pra Analitik</label>
                      <input type="checkbox" id="checkbox" name="checkbox" />
                    </div>
                    <details>
                      <summary></summary>
                      <p>ini adalah halaman login</p>
                    </details>
                  </div>
                </form>
                <div class="border2">
                  <div style="width: 100%">
                    <table class="table3">
                      <thead>
                        <tr>
                          <td><span class="text">Parameter</span></td>
                          <td><span class="text">Hasil</span></td>
                          <td><span class="text">Satuan</span></td>
                          <td><span class="text">Nilai Rujukan</span></td>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td><span class="text">Hasil</span></td>
                          <td><span class="text">Hasil</span></td>
                          <td><span class="text">Hasil</span></td>
                          <td><span class="text">Hasil</span></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="catatan">
                    <form action="" method="post">
                      <label for="textarea" class="text_area">Catatan :</label>
                      <textarea name="" id="" cols="120" rows="3" class="textarea_catatan"></textarea>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer"></div>
  </body>
</html>
