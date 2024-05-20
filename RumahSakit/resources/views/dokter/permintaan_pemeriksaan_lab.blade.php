


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Data Reagen</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel="stylesheet" href="/hasil_pemeriksaan_dokter.css" />
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
            <a href="/dashboard/dokter/daftarpasien" class="btn-kiri-1">
              <img src="/gambar/btn-icon2.png" alt="Icon" class="btn-icon" />
              <span class="btn-text">Daftar Pasien</span> </a
            ><br />
            <a href="/dashboard/dokter/hasil_pemeriksaan" class="aktif_btn">
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
              <h2 class="teks">DATA REAGEN</h2>
            </div>
            <div class="konten-bawah">
              @if (session('success'))
              <div class="alert alert-success">
                  {{ session('success') }}
              </div>
             @endif
              <div class="isi">
                <form action="{{ route('dashboard.dokter.hasil_pemeriksaan') }}" method="post">
                  @csrf
                  <div class="border">
                    <table class="table1">
                      <tr>
                        <td><span class="text">No RM</span></td>
                        <td><span class="text">:</span><input type="text" class="input1" placeholder="" name="no_rm" id="no_rm"/></td>
                        <td><span class="text">Nama Pasien</span></td>
                        <td><span class="text">:</span><select name="id_user" id="id_user" class="input1">
                          @foreach($users as $user)
                              @if($user->tingkatan_user === 'pasien')
                                  <option value="{{ $user->id }},{{ $user->name }}">{{ $user->name }}</option>
                              @endif
                          @endforeach
                      </select></td>
                      </tr>
                      <tr>
                        <td><span class="text">Nilai Rujukan</span></td>
                        <td><span class="text">:</span><input type="text" class="input1" placeholder="" name="nilai_rujukan" id="nilai_rujukan"/></td>
                        <td><span class="text">Jenis Pemeriksaan</span></td>
                        <td><span class="text">:</span><select name="id_pemeriksaan" id="id_pemeriksaan" class="input1">
                          @foreach($jenis_pemeriksaan as $pemeriksaan)
                              <option value="{{ $pemeriksaan->id }},{{ $pemeriksaan->jenis_pemeriksaan }}">{{ $pemeriksaan->jenis_pemeriksaan }}</option>
                          @endforeach
                      </select></td>
                      </tr>
                      <tr>
                        <td><span class="text">Satuan Pemeriksaan</span></td>
                        <td><span class="text">:</span><input type="text" class="input1" placeholder="" name="satuan_pemeriksaan" id="satuan_pemeriksaan" /></td>
                        <td><span class="text">Rincian Pemeriksaan</span></td>
                        <td><span class="text">:</span><select name="id_rincian_jenis_pemeriksaan" id="id_rincian_jenis_pemeriksaan" class="input1">
                          @foreach($rincian_jenis_pemeriksaan as $rincian)
                              <option value="{{ $rincian->id }},{{ $rincian->nama_jenis_pemeriksaan }}">{{ $rincian->nama_jenis_pemeriksaan }}</option>
                          @endforeach
                      </select></td>
                      </tr>
                      <tr>
                        <td><span class="text">Hasil Pemeriksaan</span></td>
                        <td><span class="text">:</span><input type="text" class="input1" placeholder="" name="hasil_pemeriksaan" id="hasil_pemeriksaan"/></td>
                        <td><span class="text">Status Pemeriksaan</span></td>
                        <td><span class="text">:</span>
                          <select name="status_pemeriksaan" id="status_pemeriksaan" class="input1">
                              <option value="pending">Pending</option>
                              <option value="selesai">Selesai</option>
                          </select><br>
                      </td>
                      </tr>
                    </table>
                    <input type="submit" name="kirim" class="btn_simpan">
                  </div>
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
