<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard laboran</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel="stylesheet" href="/dashboard_laboran.css" />
    <style></style>
  </head>
@extends('layouts.laboran')
@section('container') 
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
      <div class="isi">
        <span class="description1">Halo, Laboran!</span>
        <span class="description2">Selamat Bekerja!</span>
      </div>
    </div>
  </div>
</div>
</div>
<div class="footer"></div>
@endsection

