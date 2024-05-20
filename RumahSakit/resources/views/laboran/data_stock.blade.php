


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Stock Reagen</title>
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
    </style>
  </head>
@extends('layouts.laboran')
@section('container')
    
  <div class="kanan">
    <div class="atas-kanan">
      <img class="logo-kanan-atas" src="/gambar/icon-kananatas.png" alt="" />
      <h1 class="teks-logo-kanan-atas">LABORAN</h1>
      <i class="bi bi-bell-fill"></i>
      <form action="/dashboard/laboran/data_stock" method="GET">
        <input type="search" name="search" class="search-input" placeholder="search..." />
      </form>
      <span class="dokter">L</span>
    </div>
    <div class="bawah-kanan">
      <div class="sampul">
        <div class="judul">
          <span class="desjudul">TABEL STOCK</span>
          <a href="/dashboard/laboran/stock_reagen"><button type="reset" class="btn_kembali"><span class="text">Kembali</span></a></button></a>
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
                <th style="width: 2%">NO</th>
                <th style="width: 15%">Penanggung Jawab</th>
                <th style="width: 12%">Tangal</th>
                <th>Pemeriksaan</th>
                <th>Satuan</th>
                <th>Masuk</th>
                <th>Keluar</th>
                <th>Stock</th>
                <th>Sisa Kit</th>
              </tr>
            </thead>
            <tbody>
              <!-- Isi tabel disini -->
              @foreach ($stock_reagen as $stock)            
        <tr>
            <td class="text-center"><center>{{ $loop->iteration + $stock_reagen->firstItem() - 1  }}</center></td>
            <td><center>{{ $stock->penanggung_jawab }}</center></td>
            <td><center>{{ Carbon\Carbon::parse($stock->tgl)->format('d F Y') }}</center></td>
            <td><center>{{ $stock->pemeriksaan }}</center></td>
            <td><center>{{ $stock->masuk }}</center></td>
            <td><center>{{ $stock->satuan }}</center></td>
            <td><center>{{ $stock->keluar }}</center></td>
            <td><center>{{ $stock->stock }}</center></td>
            <td><center>{{ $stock->sisa_kit }}</center></td>
        </tr>
        @endforeach

            </tbody>
          </table>
        </div>
        <div class="paginate">
          <ul class="pagination">
              <!-- Tombol "Previous" -->
              @if ($stock_reagen ->currentPage() > 1)
                  <li><a href="{{ $stock_reagen ->previousPageUrl() }}">Previous</a></li>
              @endif
      
              <!-- Nomor halaman 1-5 -->
              @php
                  // Hitung nomor halaman yang akan ditampilkan
                  $startPage = $stock_reagen ->currentPage() >= 5 ? $stock_reagen ->currentPage() - 3 : 1;
                  $endPage = min($stock_reagen ->lastPage(), $startPage + 4);
              @endphp
              @for ($i = $startPage; $i <= $endPage; $i++)
                  <li class="{{ $stock_reagen ->currentPage() == $i ? 'active' : '' }}">
                      <a href="{{ $stock_reagen ->url($i) }}">{{ $i }}</a>
                  </li>
              @endfor
      
              <!-- Tombol "Next" jika halaman berikutnya ada -->
              @if ($stock_reagen ->currentPage() < $stock_reagen ->lastPage())
                  <li><a href="{{ $stock_reagen ->nextPageUrl() }}">Next</a></li>
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



