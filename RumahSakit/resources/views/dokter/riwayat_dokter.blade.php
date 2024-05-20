
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Riwayat</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel="stylesheet" href="/riwayat_dokter.css" />
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
          <a href="/dashboard/dokter/daftarpasien" class="btn-kiri-1">
            <img src="/gambar/btn-icon2.png" alt="Icon" class="btn-icon" />
            <span class="btn-text">Daftar Pasien</span> </a
          ><br />
          <a href="/dashboard/dokter/hasil_pemeriksaan" class="btn-kiri-1">
            <img src="/gambar/clipboard-data.svg" alt="Icon" class="btn-icon" />
            <span class="btn-text">Hasil Pemeriksaan</span> </a
          ><br />
          <a href="/dashboard/dokter/riwayat" class="aktif_btn">
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
          <form action="/dashboard/dokter/riwayat" method="GET">
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
                    <th style="width: 40%">Nama Pasien</th>
                    <th style="width: 15%">Jenis Pemeriksaan</th>
                    <th style="width: 15%">Status Pemeriksaan</th>
                    <th style="width: 15%">Tgl Pemeriksaan</th>
                  </tr>
                </thead>
                <tbody>
                  <!-- Isi tabel disini -->
                  @foreach ($riwayat as $item)                      
                  <tr>
                      <td><center>{{ $loop->iteration + $riwayat->firstItem() - 1  }}</center></td>
                      <td><center>{{ $item->no_rm }}</center></td>
                      <td><center>{{ $item->name }}</center></td>
                      <td><center>{{ $item->pemeriksaan }}</center></td>
                      <td><center>{{ $item->status_pemeriksaan }}</center></td>
                      <td><center>{{ $item->created_at->format('d F Y H:i:s') }}</center></td>
                    </tr>
                    @endforeach
                  
                </tbody>
              </table>
            </div>
            <div class="paginate">
              <ul class="pagination">
                  <!-- Tombol "Previous" -->
                  @if ($riwayat ->currentPage() > 1)
                      <li><a href="{{ $riwayat ->previousPageUrl() }}">Previous</a></li>
                  @endif
          
                  <!-- Nomor halaman 1-5 -->
                  @php
                      // Hitung nomor halaman yang akan ditampilkan
                      $startPage = $riwayat ->currentPage() >= 5 ? $riwayat ->currentPage() - 3 : 1;
                      $endPage = min($riwayat ->lastPage(), $startPage + 4);
                  @endphp
                  @for ($i = $startPage; $i <= $endPage; $i++)
                      <li class="{{ $riwayat ->currentPage() == $i ? 'active' : '' }}">
                          <a href="{{ $riwayat ->url($i) }}">{{ $i }}</a>
                      </li>
                  @endfor
          
                  <!-- Tombol "Next" jika halaman berikutnya ada -->
                  @if ($riwayat ->currentPage() < $riwayat ->lastPage())
                      <li><a href="{{ $riwayat ->nextPageUrl() }}">Next</a></li>
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
