<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kalibrasi Alat</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel="stylesheet" href="/kalibrasi_alat.css" />
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
        <h2 class="teks">KALIBRASI</h2>
      </div>
      <div class="konten-bawah">
        <div class="isi">
          <form action="{{ route('dashboard.laboran.kalibrasi_alat') }}" method="post">
            @csrf
            <div class="border">
              <table class="table1">
                <tr>
                  <td style="width: 15%"><span class="text">Penanggung Jawab</span></td>
                  <td style="width: 30%"><span class="text">:</span><input type="text" class="input1" placeholder="" name="penanggung_jawab" id="penanggung_jawab"/></td>
                  <td style="width: 15%"><span class="text">Tanggal Kalibrasi Selanjutnya</span></td>
                  <td style="width: 30%"><span class="text">:</span><input type="date" class="input1" placeholder="" name="kalibrasi_selanjutnya" id="kalibrasi_selanjutnya"/></td>
                </tr>
                <tr>
                  <td><span class="text">Nama Alat</span></td>
                  <td><span class="text">:</span><input type="text" class="input1" placeholder="" name="nama_alat" id="nama_alat"/></td>
                  <td><span class="text">Tanggal Kalibrasi Sebelumnya</span></td>
                  <td><span class="text">:</span><input type="date" class="input1" placeholder="" name="kalibrasi_sebelumnya" id="kalibrasi_sebelumnya"/></td>
                </tr>
                <tr>
                  <td><span class="text">Nomor Seri</span></td>
                  <td><span class="text">:</span><input type="text" class="input1" placeholder="" name="nomor_alat" id="nomor_alat"/></td>
                  <td><span class="text">Keterangan</span></td>
                  <td><span class="text">:</span><input type="text" class="input1" placeholder="" name="keterangan" id="keterangan"/></td>
                </tr>
              </table>
              <a href="">
                <button type="submit" class="btn_simpan"><span class="text">Simpan</span></button>
              </a>
            </div>
          </form>
          <a href="/dashboard/laboran/data_kalibrasi_alat">
            <button type="submit" class="btn_lihat"><span class="text">Lihat Data Kalibrasi Alat</span></button>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>

</div>
<div class="footer"></div>
@endsection

