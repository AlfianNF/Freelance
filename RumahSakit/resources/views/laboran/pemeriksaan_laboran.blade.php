<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pemeriksaan laboran</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel="stylesheet" href="/pemeriksaan_laboran.css" />
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
      .btn_gas {
    background-color: rgb(43, 43, 228);
    margin-top: 8px;
    border-radius: 6px;
    text-align: center;
    height: 25px;
    width: 60px;
    border: 2px solid rgb(53, 104, 232);
    transition: all ease-in 0.3s;
      }

      .btn_gas:hover {
        border: 2px solid rgb(53, 104, 232);
          transition: all ease-in 0.3s;
          transform: scale(1.1);
      }
    </style>
  </head>
@extends('layouts.laboran')
@section('container')
    
  <div class="kanan">
    <div class="atas-kanan">
      <img class="logo-kanan-atas" src="/gambar/icon-kananatas.png" alt="" />
      <h1 class="teks-logo-kanan-atas">LABORAN</h1>
      <i class="bi bi-bell-fill"></i>
      <form action="/dashboard/laboran/halaman_pemeriksaan" method="GET">
        <input type="search" name="search" class="search-input" placeholder="search..." />
      </form>
      <span class="dokter">L</span>
    </div>
    <div class="bawah-kanan">
      <div class="sampul">
        <div class="judul">
          <span class="desjudul">TABEL PEMERIKSAAN</span>
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
                <th style="width: 45%">Nama Pasien</th>
                <th style="width: 15%">Pemeriksaan</th>
                <th style="width: 15%">Action</th>
              </tr>
            </thead>
            <tbody>
              <!-- Isi tabel disini -->
              @foreach ($riwayatPemeriksaan as $pemeriksaan)
                  @if (!in_array($pemeriksaan->no_rm, $no_rm_terlihat))
                      <tr>
                          <td><center>{{ $loop->iteration }}</center></td>
                          <td><center>{{ $pemeriksaan->no_rm }}</center></td>
                          <td><center>{{ $pemeriksaan->name }}</center></td>
                          <td><center>{{ $pemeriksaan->pemeriksaan }}</center></td>
                          <td>
                              <center><a href="/dashboard/laboran/pemeriksaan/{{ $pemeriksaan->id_user }}" >
                                <button class="btn_gas"><span class="text">Mulai</span></button>
                              </a></center>
                          </td>
                      </tr>
                      <?php $no_rm_terlihat[] = $pemeriksaan->no_rm; ?> <!-- Tandai nomor RM ini sudah ditampilkan -->
                  @endif
              @endforeach

            </tbody>
          </table>
        </div>
        <div class="paginate">
          <ul class="pagination">
              <!-- Tombol "Previous" -->
              @if ($riwayatPemeriksaan ->currentPage() > 1)
                  <li><a href="{{ $riwayatPemeriksaan ->previousPageUrl() }}">Previous</a></li>
              @endif
      
              <!-- Nomor halaman 1-5 -->
              @php
                  // Hitung nomor halaman yang akan ditampilkan
                  $startPage = $riwayatPemeriksaan ->currentPage() >= 5 ? $riwayatPemeriksaan ->currentPage() - 3 : 1;
                  $endPage = min($riwayatPemeriksaan ->lastPage(), $startPage + 4);
              @endphp
              @for ($i = $startPage; $i <= $endPage; $i++)
                  <li class="{{ $riwayatPemeriksaan ->currentPage() == $i ? 'active' : '' }}">
                      <a href="{{ $riwayatPemeriksaan ->url($i) }}">{{ $i }}</a>
                  </li>
              @endfor
      
              <!-- Tombol "Next" jika halaman berikutnya ada -->
              @if ($riwayatPemeriksaan ->currentPage() < $riwayatPemeriksaan ->lastPage())
                  <li><a href="{{ $riwayatPemeriksaan ->nextPageUrl() }}">Next</a></li>
              @endif
          </ul>
      </div>
      </div>
    </div>
  </div>
</div>
<div class="footer"></div>
  <script></script>
@endsection
