
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>daftar pasien</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel="stylesheet" href="/daftarpasien_dokter.css" />
    <style>
       .pagination {
    display: flex;
    justify-content: center;
    list-style: none;
    padding: 0;
    
}

/* Gaya untuk setiap item pagination */
.pagination li {
    margin-right: 5px;
}

/* Gaya untuk tautan pagination */
.pagination li a {
    display: block;
    padding: 5px 10px;
    text-decoration: none;
    color: #333;
    background-color: #eee;
    border: 1px solid #ccc;
    border-radius: 3px;
}

/* Gaya untuk pagination yang aktif */
.pagination li.active a {
    z-index: 1;
    color: #fff;
    background-color: #3bd9f1; /* Warna latar belakang */
    border-color: #3bd9f1; /* Warna border */
    font-size: 16px; /* Ukuran font */
    padding: 5px 10px;
    border-radius: 3px; /* Radius border */
}

/* Gaya untuk tautan pagination yang dinonaktifkan */
.pagination li.disabled a {
    opacity: 0.5;
    pointer-events: none;
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
          <form action="/dashboard/dokter/daftarpasien" method="GET">
            <input type="search" name="search" class="search-input" placeholder="search..." />
          </form>
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
                    <th style="width: 30%">Nama Pasien</th>
                    <th style="width: 15%">P/L</th>
                    <th style="width: 15%">Tanggal Lahir</th>
                    <th style="width: 15%">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <!-- Isi tabel disini -->
                  
                  @foreach ($data as $item)                  
                  <tr>
                      <td><center>{{ $loop->iteration + $data->firstItem() - 1  }}</center></td>
                      <td><center>{{ $item->pemeriksaans->where('no_rm', '!=', null)->first()->no_rm ?? '-' }}</center></td>
                      <td><center>{{ $item->name }}</center></td>
                      <td><center>{{ $item->jenis_kelamin === 1 ? 'laki-laki' : 'perempuan' }}</center> </td>
                      <td><center>{{ $item->tgl_lahir }} </center></td>
                      <td>
                        <a href="{{ route('dashboard.dokter.pemeriksaan', ['id' => $item->id]) }}">
                            <center><button class="button"><span class="font">Mulai</span></button></center>
                        </a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <div class="paginate">
              <ul class="pagination">
                  <!-- Tombol "Previous" -->
                  @if ($data ->currentPage() > 1)
                      <li><a href="{{ $data ->previousPageUrl() }}">Previous</a></li>
                  @endif
          
                  <!-- Nomor halaman 1-5 -->
                  @php
                      // Hitung nomor halaman yang akan ditampilkan
                      $startPage = $data ->currentPage() >= 5 ? $data ->currentPage() - 3 : 1;
                      $endPage = min($data ->lastPage(), $startPage + 4);
                  @endphp
                  @for ($i = $startPage; $i <= $endPage; $i++)
                      <li class="{{ $data ->currentPage() == $i ? 'active' : '' }}">
                          <a href="{{ $data ->url($i) }}">{{ $i }}</a>
                      </li>
                  @endfor
          
                  <!-- Tombol "Next" jika halaman berikutnya ada -->
                  @if ($data ->currentPage() < $data ->lastPage())
                      <li><a href="{{ $data ->nextPageUrl() }}">Next</a></li>
                  @endif
              </ul>
          </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer"></div>
    <script></script>
  </body>
</html>
