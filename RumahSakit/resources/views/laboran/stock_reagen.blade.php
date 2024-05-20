<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Stock Reagen</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel="stylesheet" href="/stock_reagen.css" />
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
      <div class="konten-atas">
        <h2 class="teks">DATA REAGEN</h2>
      </div>
      <div class="konten-bawah">
        <div class="isi">
          <form action="{{ route('dashboard.laboran.stock_reagen') }}" method="post">
            @csrf
            <div class="border">
              <table class="table1">
                <tr>
                  <td><span class="text">Penanggung Jawab</span></td>
                  <td><span class="text">:</span><input type="text" class="input1" placeholder="" name="penanggung_jawab" id="penanggung_jawab" /></td>
                  <td><span class="text">Masuk</span></td>
                  <td><span class="text">:</span><input type="text" class="input1" placeholder="" name="masuk" id="masuk"/></td>
                </tr>
                <tr>
                  <td><span class="text">Tanggal</span></td>
                  <td><span class="text">:</span><input type="date" name="tgl" id="tgl" class="input1"></td>
                  <td><span class="text">Keluar</span></td>
                  <td><span class="text">:</span><input type="text" class="input1" placeholder="" name="keluar" id="keluar"/></td>
                </tr>
                <tr>
                  <td><span class="text">Pemeriksaan</span></td>
                  <td><span class="text">:</span><input type="text" class="input1" placeholder="" name="pemeriksaan" id="pemeriksaan" /></td>
                  <td><span class="text">Stock</span></td>
                  <td><span class="text">:</span><input type="text" class="input1" placeholder="" name="stock" id="stock"/></td>
                </tr>
                <tr>
                  <td><span class="text">Satuan</span></td>
                  <td><span class="text">:</span><input type="text" class="input1" placeholder="" name="satuan" id="satuan"/></td>
                  <td><span class="text">Sisa Kit</span></td>
                  <td><span class="text">:</span><input type="text" class="input1" placeholder="" name="sisa_kit" id="sisa_kit" /></td>
                </tr>
              </table>
              <input type="submit" name="submit" class="btn_simpan">
            </div>
           
          </form>
          <a href="/dashboard/laboran/data_stock">
            <button type="submit" class="btn_lihat"><span class="text">Lihat Data Stock</span></button>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<div class="footer"></div>
@endsection

