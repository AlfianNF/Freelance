
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Stock Reagen</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel="stylesheet" href="/pemeriksaan_laboran.css" />
    <style>.pagination {
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
  }</style>
  </head>
@extends('layouts.laboran')
@section('container')
    
  <div class="kanan">
    <div class="atas-kanan">
      <img class="logo-kanan-atas" src="/gambar/icon-kananatas.png" alt="" />
      <h1 class="teks-logo-kanan-atas">LABORAN</h1>
      <i class="bi bi-bell-fill"></i>
      <form action="/dashboard/laboran/data_kalibrasi_alat" method="GET">
        <input type="search" name="search" class="search-input" placeholder="search..." />
      </form>
      <span class="dokter">L</span>
    </div>
    <div class="bawah-kanan">
      <div class="sampul">
        <div class="judul">
          <span class="desjudul">TABEL ALAT</span>
          <a href="/dashboard/laboran/kalibrasi_alat"><button type="reset" class="btn_kembali"><span class="text">Kembali</span></a></button></a> 
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
                <th style="width: 5%">NO</th>
                <th style="width: 15%">Penanggung Jawab</th>
                <th>Nama Alat</th>
                <th>Nomor Seri</th>
                <th>Kalibrasi Sebelumnya</th>
                <th>Kalibrasi Selanjutnya</th>
                <th>Keterangan</th>
              </tr>
            </thead>
            <tbody>
              <!-- Isi tabel disini -->
              @foreach ($kalibrasi_alat as $item)
              <tr>
                  <td><center>{{ $loop->iteration + $kalibrasi_alat->firstItem() - 1  }}</center></td>
                  <td><center>{{ $item->penanggung_jawab }}</center></td>
                  <td><center>{{ $item->nama_alat }}</center></td>
                  <td><center>{{ $item->nomor_alat }}</center></td>
                  <td><center>{{ $item->kalibrasi_sebelumnya }}</center></td>
                  <td><center>{{ $item->kalibrasi_selanjutnya }}</center>
                  <td><center>{{ $item->keterangan }}</center></td>
              </tr>
          @endforeach

            </tbody>
          </table>
        </div>
        <div class="paginate">
          <ul class="pagination">
              <!-- Tombol "Previous" -->
              @if ($kalibrasi_alat ->currentPage() > 1)
                  <li><a href="{{ $kalibrasi_alat ->previousPageUrl() }}">Previous</a></li>
              @endif
      
              <!-- Nomor halaman 1-5 -->
              @php
                  // Hitung nomor halaman yang akan ditampilkan
                  $startPage = $kalibrasi_alat ->currentPage() >= 5 ? $kalibrasi_alat ->currentPage() - 3 : 1;
                  $endPage = min($kalibrasi_alat ->lastPage(), $startPage + 4);
              @endphp
              @for ($i = $startPage; $i <= $endPage; $i++)
                  <li class="{{ $kalibrasi_alat ->currentPage() == $i ? 'active' : '' }}">
                      <a href="{{ $kalibrasi_alat ->url($i) }}">{{ $i }}</a>
                  </li>
              @endfor
      
              <!-- Tombol "Next" jika halaman berikutnya ada -->
              @if ($kalibrasi_alat ->currentPage() < $kalibrasi_alat ->lastPage())
                  <li><a href="{{ $kalibrasi_alat ->nextPageUrl() }}">Next</a></li>
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



