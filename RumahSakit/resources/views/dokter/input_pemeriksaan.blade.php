{{-- @extends('layouts.dokter')
@section('container')
    <form action="{{ route('dashboard.dokter.input_pemeriksaan') }}" method="POST">
        @csrf
        <label for="id_uer">Nama</label>
        <select name="id_user" id="id_user">
            @foreach ($user as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select><br>

        <label for="no_rm">NO RM</label>
        <input type="text" name="no_rm" id="no_rm"><br>

        <label for="riwayat_penyakit">Riwayat Penyakit</label>
        <input type="text" name="riwayat_penyakit" id="riwayat_penyakit"><br>

        <label for="alergi_obat">Alergi Obat</label>
        <input type="text" name="alergi_obat" id="alergi_obat"><br>

        <label for="tgl_pemeriksaan">Tanggal Pemeriksaan</label>
        <input type="date" name="tgl_pemeriksaan" id="tgl_pemeriksaan"><br>

        <label for="status_pemeriksaan">Tanggal Pemeriksaan</label>
        <select name="status_pemeriksaan" id="status_pemeriksaan">
            <option value="pending">Pending</option>
            <option value="selesai">Selesai</option>
        </select><br>

        <input type="submit" name="Kirim">
    </form>
@endsection --}}



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Data Reagen</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel="stylesheet" href="/input_pemeriksaan.css" />
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
            <a href="/dashboard/dokter/input_pemeriksaan" class="aktif_btn">
              <img src="/gambar/person-vcard-fill.svg" alt="Icon" class="btn-icon" />
              <span class="btn-text">Input Pemeriksaan</span> </a
            ><br />
            <a href="/dashboard/dokter/daftarpasien" class="btn-kiri-1">
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
          <span class="dokter">D</span>
        </div>
        <div class="bawah-kanan">
          <div class="konten">
            <div class="konten-atas">
              <h2 class="teks">INPUT DATA</h2>
            </div>
            <div class="konten-bawah">
              <div class="isi">
                <form action="{{ route('dashboard.dokter.input_pemeriksaan') }}" method="POST">
                  @csrf
                  <div class="border">
                    <table class="table1">
                      <tr>
                        <td><span class="text">Nama</span></td>
                        <td><span class="text">:</span><select name="id_user" id="id_user" class="input1">
                          @foreach ($user as $item)
                              <option value="{{ $item->id }}">{{ $item->name }}</option>
                          @endforeach
                      </select><br></td>
                        <td><span class="text">Alergi Obat</span></td>
                        <td><span class="text">:</span><input type="text" class="input1" placeholder="" name="alergi_obat" id="alergi_obat" /></td>
                      </tr>
                      <tr>
                        <td><span class="text">No RM</span></td>
                        <td><span class="text">:</span><input type="text" class="input1" placeholder="" name="no_rm" id="no_rm"/></td>
                        <td><span class="text">Tanggal Pemeriksaan</span></td>
                        <td><span class="text">:</span><input type="date" class="input1" placeholder="" name="tgl_pemeriksaan" id="tgl_pemeriksaan"/></td>
                      </tr>
                      <tr>
                        <td><span class="text">Riwayat Penyakit</span></td>
                        <td><span class="text">:</span><input type="text" class="input1" placeholder="" name="riwayat_penyakit" id="riwayat_penyakit" /></td>
                        <td><span class="text">Status</span></td>
                        <td><span class="text">:</span>
                            <select name="status_pemeriksaan" id="status_pemeriksaan" class="input1">
                                <option value="pending">Pending</option>
                                <option value="selesai">Selesai</option>
                            </select><br>
                        </td>
                      </tr>
                    </table>
                    <input type="submit" name="submit"  class="btn_simpan">
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
