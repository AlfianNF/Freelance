

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Data Reagen</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel="stylesheet" href="/hasil_pemeriksaan_laboran.css" />
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
          <a href="/dashboard/laboran" class="btn-kiri-1">
            <img src="/gambar/btn-icon1.png" alt="Icon" class="btn-icon" />
            <span class="btn-text">Dashboard</span> </a
          ><br />
          <a href="/dashboard/laboran/halaman_pemeriksaan" class="btn-kiri-1">
            <img src="/gambar/clipboard-data.svg" alt="Icon" class="btn-icon" />
            <span class="btn-text">Pemeriksaan</span> </a
          ><br />
          <a href="/dashboard/laboran/riwayat" class="btn-kiri-1">
            <img src="/gambar/clock-history.svg" alt="Icon" class="btn-icon" />
            <span class="btn-text">Riwayat</span> </a
          ><br />
          <a href="/dashboard/laboran/stock_reagen" class="btn-kiri-1">
            <img src="/gambar/btn-icon7.png" alt="Icon" class="btn-icon" />
            <span class="btn-text">Stock Reagen</span> </a
          ><br />
          <a href="/dashboard/laboran/kalibrasi_alat" class="btn-kiri-1">
            <img src="/gambar/btn-icon6.png" alt="Icon" class="btn-icon" />
            <span class="btn-text">Kalibrasi Alat</span> </a
          ><br />
          <br /><br /><br />
          <br /><br /><br /><br /><br />
          <a href="/logout" class="btn-kiri-1">
            <img src="/gambar/btn-icon9.png" alt="Icon" class="btn-icon" />
            <span class="btn-text">Log Out</span> </a
          ><br />
        </div>
      </div>
      <div class="kanan">
        <div class="atas-kanan">
          <img class="logo-kanan-atas" src="/gambar/icon-kananatas.png" alt="" />
          <h1 class="teks-logo-kanan-atas">LABORAN</h1>
          <i class="bi bi-bell-fill"></i>
          <input type="text" class="search-input" placeholder="search..." />
          <span class="dokter">L</span>
        </div>
        <div class="bawah-kanan">
          <div class="konten">
            <div class="konten-bawah">
              <div class="isi">
                <form action="{{ route('dashboard.laboran.pemeriksaan',['id' => $id]) }}" method="post">
                  @csrf
                  <div class="border">
                    <div class="table-container">
                        
                      <table class="table1">
                        <tr>
                          <td><span class="text">No RM</span></td>
                          <td><span class="text">:</span><input type="text" class="input1" placeholder="" value="{{ $pemeriksaan->no_rm }}" readonly name="no_rm" id="no_rm"/></td>
                          <input type="hidden" name="no_rm" value="{{ $pemeriksaan->no_rm }}"/>
                        </tr>
                        <tr>
                          <td><span class="text">NIK</span></td>
                          <td><span class="text">:</span><input type="text" class="input1" placeholder="" value="{{ $data->nik }}" readonly name="nik" id="nik"/></td>
                          <input type="hidden" name="nik" value="{{ $data->nik }}"/>
                        </tr>
                        <tr>
                          <td><span class="text">Nama</span></td>
                          <td><span class="text">:</span><input type="text" class="input1" placeholder="" value="{{ $data->name }}" readonly name="name" id="name"/></td>
                          <input type="hidden" name="name" value="{{ $data->name }}"/>

                        </tr>
                        <tr>
                          <td><span class="text">Tanggal Lahir</span></td>
                          <td><span class="text">:</span><input type="text" class="input1" placeholder="" value="{{ \Carbon\Carbon::parse($data->tgl_lahir)->isoFormat('D MMMM YYYY') }}" readonly name="tgl_lahir" id="tgl_lahir"/></td>
                          <input type="hidden" name="tgl_lahir" value="{{ $data->tgl_lahir }}"/>

                        </tr>
                        
                      </table>
                      <table class="table2">
                        <!-- Isi tabel kedua -->
                        <tr>
                          <td><span class="text">Alamat </span></td>
                          <td><span class="titik">:</span><textarea name="" id="" cols="30" rows="10" class="textarea" readonly name="alamat" id="alamat">{{ $data->alamat }}</textarea></td>
                          <input type="hidden" name="alamat" value="{{ $data->alamat }}"/>

                        </tr>
                        <tr>
                          <td><span class="text">Pemeriksaan</span></td>
                          <td><span class="text">:</span><input type="text" class="input1" placeholder="" value="{{ $riwayatPemeriksaan->pemeriksaan }}" readonly name="pemeriksaan" id="pemeriksaan"/></td>
                          <input type="hidden" name="pemeriksaan" value="{{ $riwayatPemeriksaan->pemeriksaan }}"/>

                        </tr>
                        <tr>
                          <td></td>
                          
                        </tr>
                      </table>
                    </div>
                  </div>
                  <table style="width: 100%">
                    <tr>
                      <td>
                        <div class="checkbox">
                          <div class="checkbox-container">
                            <label for="checkbox" class="label">Pra Analitik</label>
                            <input type="checkbox" id="checkbox" name="checkbox" />
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="checkbox">
                          <div class="checkbox-container">
                            <label for="checkbox" class="label">Analitik</label>
                            <input type="checkbox" id="checkbox" name="checkbox" />
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="checkbox">
                          <div class="checkbox-container">
                            <label for="checkbox" class="label">Pasca Analitik</label>
                            <input type="checkbox" id="checkbox" name="checkbox" />
                          </div>
                        </div>
                      </td>
                    </tr>
                  </table>
                <div class="border2">
                  <div style="width: 100%">
                    <table class="table3">
                      <thead>
                        <tr>
                          <td><span class="text">Hasil</span></td>
                          <td><span class="text">Satuan</span></td>
                          <td><span class="text">Nilai Rujukan</span></td>
                        </tr>
                      </thead>
                      <tbody>
                          <input type="hidden" name="id_user" value="{{ $data->id }}">
                          <input type="hidden" name="id_pemeriksaan" value="{{ $pemeriksaan->id }}">
                          <input type="hidden" name="id_rincian_pemeriksaan" value="{{ $pemeriksaan_id }}">
                          <tr>
                              <td><input type="text" name="hasil_pemeriksaan" id="hasil_pemeriksaan" required></td>
                              <td><input type="text" name="satuan_pemeriksaan" id="satuan_pemeriksaan" required></td>
                              <td><input type="text" name="nilai_rujukan" id="nilai_rujukan" required></td>
                          </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="catatan">
                    <label for="textarea" class="text_area">Catatan :</label>
                    <textarea name="catatan_dokter" id="catatan_dokter" cols="120" rows="3" class="textarea_catatan"></textarea>                    
                  </div>
                </div>
              </div>
              <button type="submit" class="btn_simpan"><span class="text" class="">Simpan</span></button>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer"></div>
  </body>
</html>

    
