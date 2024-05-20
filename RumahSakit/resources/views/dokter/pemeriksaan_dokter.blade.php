

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Data Reagen</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel="stylesheet" href="/pemeriksaan_dokter2.css" />
    <style></style>
  </head>
  <body>
    <div class="Dasar">
      <div class="kiri">
        <div class="atas-kiri">
          <img class="logo-kiri-atas" src="/gambar/logo.png" alt="" />
          <h1 class="teks-logo-kiri-atas">RSUD Dr.Radjiman</h1>
        </div>
        <div class="bawah-kiri">
          <a href="/dashboard/dokter" class="btn-kiri-1">
            <img src="/gambar/btn-icon1.png" alt="Icon" class="btn-icon" />
            <span class="btn-text">Dashboard</span> </a
          ><br />
          <a href="/dashboard/dokter/input_pemeriksaan" class="btn-kiri-1">
            <img src="/gambar/person-vcard-fill.svg" alt="Icon" class="btn-icon" />
            <span class="btn-text">Input Pemeriksaan</span> </a
          ><br />
          <a href="/dashboard/dokter/daftarpasien" class="aktif_btn">
            <img src="/gambar/btn-icon2.png" alt="Icon" class="btn-icon" />
            <span class="btn-text">Daftar Pasien</span> </a
          ><br />
          <a href="/dashboard/dokter/hasil_pemeriksaan" class="btn-kiri-1">
            <img src="/gambar/clipboard-data.svg" alt="Icon" class="btn-icon" />
            <span class="btn-text">Hasil Pemeriksaan</span> </a
          ><br />
          <a href="/dashboard/dokter/riwayat" class="btn-kiri-1">
            <img src="/gambar/clock-history.svg" alt="Icon" class="btn-icon" />
            <span class="btn-text">Riwayat</span> </a
          ><br />
          <br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
          <a href="/logout" class="btn-kiri-1">
            <img src="/gambar/btn-icon9.png" alt="Icon" class="btn-icon" />
            <span class="btn-text">Log Out</span> </a
          ><br />
          <a href="#" class="btn-kiri-1">
            <img src="/gambar/btn-icon10.png" alt="Icon" class="btn-icon" />
            <span class="btn-text">Help</span> </a
          ><br />
        </div>
      </div>
      <div class="kanan">
        <div class="atas-kanan">
          <img class="logo-kanan-atas" src="/gambar/icon-kananatas.png" alt="" />
          <h1 class="teks-logo-kanan-atas">DOKTER</h1>
          <i class="bi bi-bell-fill"></i>
          <input type="text" class="search-input" placeholder="search..." />
          <span class="dokter">L</span>
        </div>
        <div class="bawah-kanan">
          <div class="konten">
            <div class="konten-atas">
              <h2 class="teks">DATA PASIEN</h2>
            </div>
            <div class="konten-bawah">
              <div class="isi">
                <form  action="{{ route('dashboard.dokter.pemeriksaan', ['id' => $id]) }}" method="POST">
                  @csrf
                  <div class="border">
                    <table class="table1">
                      <tr>
                        <td><span class="text">NIK</span></td>
                        <td><span class="text">:</span> <input class="input1" type="text" id="nik" name="nik" value="{{ $user->nik }}" readonly></td>
                        <td><span class="text">Nama</span></td>
                        <td><span class="text">:</span><input class="input1" type="text" id="name" name="name" value="{{ $user->name }}" readonly></td>
                      </tr>
                      <tr>
                        <td><span class="text">Tanggal Lahir</span></td>
                        <td><span class="text">:</span><input class="input1" type="text" id="tgl_lahir" name="tgl_lahir" value="{{ $user->tgl_lahir }}" readonly></td>
                        <td><span class="text">Alamat</span></td>
                        <td><span class="text">:</span><input class="input1" type="text" id="alamat" name="alamat" value="{{ $user->alamat }}" readonly></td>
                      </tr>
                      <tr>
                        <td><span class="text">Umur</span></td>
                        <td><span class="text">:</span><input class="input1"type="text" id="umur" name="umur" value="{{ $umur }}" readonly></td>
                        <td><span class="text">No RM</span></td>
                        <td><span class="text">:</span><input class="input1" type="text" id="no_rm" name="no_rm" value="{{ $pemeriksaan->no_rm }}"></td>
                      </tr>
                      <tr>
                        <td><span class="text">Keluhan Pasien</span></td>
                        <td><span class="text">:</span><input class="input1" type="text" id="keluhan_pasien" name="keluhan_pasien" value="{{ $pemeriksaan->keluhan_pasien }}"></td>
                        <td><span class="text">Hasil Pemeriksaan</span></td>
                        <td><span class="text">:</span><input class="input1" type="text" id="hasil_pemeriksaan" name="hasil_pemeriksaan" value="{{ $hasilPemeriksaan['hasil_pemeriksaan'] }}"></td>
                      </tr>
                      <tr>
                        <td><span class="text">Satuan Pemeriksaan</span></td>
                        <td><span class="text">:</span><input class="input1" type="text" id="satuan_pemeriksaan" name="satuan_pemeriksaan" value="{{ $hasilPemeriksaan['satuan_pemeriksaan'] }}"></td>
                      </tr>
                    </table>
                    <input class="btn_simpan" type="submit" value="Kirim">
                  </div>
                </form>
                <a href="/dashboard/dokter/daftarpasien">
                  <button type="submit" class="btn_lihat"><span class="text">Kembali</span></button>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer"></div>
  </body>
</html>
