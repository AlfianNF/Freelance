
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pemeriksaan laboran</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel="stylesheet" href="/pemeriksaan_laboran.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script></head>
    <style>


.tbl{
  margin-left: 10px;
  justify-content: center
}


.txt1{
  color: white;
}
.input1 {
    width: 300px;
    height: 35px;
    border-radius: 20px;
    border: none;
    padding-left: 10px;
    margin-left: 10px;
    font-family: "Poppins", sans-serif;
    font-size: 14px;
    margin-top: 10px
}

.input2 {
    width: 310px;
    height: 35px;
    border-radius: 20px;
    border: none;
    padding-left: 10px;
    margin-left: 10px;
    font-family: "Poppins", sans-serif;
    font-size: 14px;
    margin-top: 10px
}

.txtarea{
  width: 280px;
    height: 100px;
    border-radius: 20px;
    border: none;
    padding: 15px;
    margin-left: 10px;
    font-family: "Poppins", sans-serif;
    font-size: 14px;
    margin-top: 10px
}
 /* Style untuk modal */
 .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.5);
      }

      /* Style untuk konten modal */
      .modal-content {
        background-color: #2d7a8f;
        margin:5% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 65%;
        border-radius: 20px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.5);
      }

      /* Style untuk tombol close */
      .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
      }

      .close:hover,
      .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
      }

      .btn_close {
        background-color: rgb(24, 182, 222);
        width: 60px;
        height: 30px;
        border: solid 2px white;
        border-radius: 5px;
      }

      .text1 {
          color: white;
          font-size: 20px
      }

      .isi_modals {
        margin-bottom: 20px;
      }

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
    height: 30px;
    width: 60px;
    border: 2px solid rgb(53, 104, 232);
    transition: all ease-in 0.3s;
      }

      .btn_gas:hover {
        border: 2px solid rgb(53, 104, 232);
          transition: all ease-in 0.3s;
          transform: scale(1.1);
      }

      .btn_tutup{
    background-color: rgb(255, 0, 0);
    margin-top: 8px;
    border-radius: 6px;
    text-align: center;
    height: 30px;
    width: 60px;
    border: 2px solid rgb(255, 255, 255);
    transition: all ease-in 0.3s;
      }

      .btn_tutup:hover {
        border: 2px solid rgb(255, 255, 255);
          transition: all ease-in 0.3s;
          transform: scale(1.1);
      }

      .btn_simpan {
    background-color: rgb(30, 93, 220);
    margin-top: 8px;
    border-radius: 6px;
    text-align: center;
    height: 30px;
    width: 200px;
    border: 2px solid rgb(247, 247, 247);
    transition: all ease-in 0.3s;
      }

      .btn_simpan:hover {
        border: 2px solid rgb(255, 255, 255);
          transition: all ease-in 0.3s;
          transform: scale(1.1);
      }

      .btn_print {
    background-color: rgb(6, 112, 4);
    margin-top: 8px;
    border-radius: 6px;
    text-align: center;
    height: 30px;
    width: 60px;
    border: 2px solid rgb(247, 247, 247);
    transition: all ease-in 0.3s;
      }

      .btn_print:hover {
        border: 2px solid rgb(255, 255, 255);
          transition: all ease-in 0.3s;
          transform: scale(1.1);
      }
    </style>
  </head>
@extends('layouts.laboran')
@section('container')
    
<div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title" id="modalLabel"><span class="text">Pemeriksaan Pasien</span></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="examination-form" method="POST" action="{{ route('dashboard.laboran.daftar_laboratorium') }}">
          @csrf
          <input type="hidden" id="id" name="id">
          <input type="hidden" id="id_user" name="id_user">
          <div class="row">
            <table class="tbl">
              <thead>
                <tr>
                  <td style="width: 50%"></td>
                  <td style="width: 50%"></td>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><label for="no_rm" class="form-label"><span class="text1">No RM</span></label></td>
                  <td><input type="text" class="input1" id="no_rm" name="no_rm" required></td>
                  <td><label for="dokter_pengirim" class="form-label"><span class="text1">Dokter Pengirim</span></label></td>
                  <td>
                    <select name="dokter_pengirim" id="dokter_pengirim" class="input2">
                      @foreach ($dokter as $item)    
                      <option value="{{ $item->name }}-{{ $item->id }}">{{ $item->name }}</option>
                      @endforeach
                    </select> 
                  </td>
                </tr>
                <tr>
                  <td><label for="name" class="form-label"><span class="text1">Nama Pasien</span></label></td>
                  <td> <input type="text" class="input1" id="name" name="name" required readonly></td>
                   <td><label for="nama_pemeriksaan" class="form-label"><span class="text1">Pemeriksaan</span></label></td>
                  <td>
                    <select name="nama_pemeriksaan" id="nama_pemeriksaan" class="input2">
                      @foreach ($pemeriksaan as $item)    
                      <option value="{{ $item->jenis_pemeriksaan }}-{{ $item->id }}">{{ $item->jenis_pemeriksaan }}</option>
                      @endforeach
                    </select>
                  </td>
                </tr>
                <tr>
                  <td><label for="tgl_lahir" class="form-label"><span class="text1">Tanggal Lahir</span></label></td>
                  <td><input type="date" class="input1" id="tgl_lahir" name="tgl_lahir" required readonly></td>
                  <td><label for="jenis_pemeriksaan" class="form-label"><span class="text1">Jenis Pemeriksaan</span></label></td>
                  <td>
                    <select name="jenis_pemeriksaan" id="jenis_pemeriksaan" class="input2">
                      @foreach ($rincian_pemeriksaan as $item)    
                      <option value="{{ $item->nama_jenis_pemeriksaan }}-{{ $item->id }}">{{ $item->nama_jenis_pemeriksaan }}</option>
                      @endforeach
                    </select>
                  </td>
                </tr>
                <tr>
                  <td><label for="umur" class="form-label"><span class="text1">Umur</span></label></td>
                  <td><input type="text" class="input1" id="umur" name="umur" required readonly></td>
                  <td> <label for="jaminan" class="form-label"><span class="text1">Jaminan</span></label></td>
                  <td> <input type="text" class="input1" id="jaminan" name="jaminan" required></td>
                </tr>
                <tr>
                  <td><label for="jenis_kelamin" class="form-label"><span class="text1">Jenis Kelamin</span></label></td>
                  <td><input type="text" class="input1" id="jenis_kelamin" name="jenis_kelamin" required readonly></td>
                  <td> <label for="diagnosa" class="form-label"><span class="text1">Diagnosa</span></label></td>
                  <td><input type="text" class="input1" id="diagnosa" name="diagnosa" required></td>
                </tr>
                <tr>
                  <td> <label for="alamat" class="form-label"><span class="text1">Alamat</span></label></td>
                  <td><textarea class="txtarea" id="alamat" name="alamat" rows="3" required readonly></textarea></td>
                  <td><label for="keluhan" class="form-label"><span class="text1">Keluhan Pasien</span></label></td>
                  <td><textarea class="txtarea" id="keluhan" name="keluhan" rows="3" required></textarea></td>
                </tr>
              </tbody>
            </table>
          </div> 
          <br><br>    
          <button type="submit" class="btn_simpan"><span class="text">Simpan Pemeriksaan</span></button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn_tutup" data-bs-dismiss="modal"><span class="text">Tutup</span></button>
        <button type="button" class="btn_print" onclick="printForm()"><span class="text">Print</span></button>
      </div>
    </div>
  </div>
</div>

  <div class="kanan">
    <div class="atas-kanan">
      <img class="logo-kanan-atas" src="/gambar/icon-kananatas.png" alt="" />
      <h1 class="teks-logo-kanan-atas">LABORAN</h1>
      <i class="bi bi-bell-fill"></i>
      <form action="/dashboard/laboran/daftar_laboratorium" method="GET">
        <input type="search" name="search" class="search-input" placeholder="search..." />
      </form>
      <span class="dokter">L</span>
    </div>
    <div class="bawah-kanan">
      <div class="sampul">
        <div class="judul">
          <span class="desjudul">TABEL PENDAFTARAN LABORATORIUM</span>
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
                <th style="width: 10%">No</th>
                <th>Nama Pasien</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th style="width: 15%">Action</th>
              </tr>
            </thead>
            <tbody>
              <!-- Isi tabel disini -->
              @foreach ($user as $item)
                <tr>
                  <td><center>{{ $loop->iteration}}</center></td>
                  <td><center>{{ $item->name }}</center></td>
                  <td>
                  <center>
                    @if($item->jenis_kelamin == 0)
                      Perempuan
                    @else
                      Laki-laki
                    @endif
                  </center>
                  </td>
                  <td><center>{{ $item->alamat }}</center></td>
                  <td>
                  <center>
                    <button type="button" class="btn_gas" data-bs-toggle="modal" data-bs-target="#modal" data-user-id="{{ $item->id }}">
                      <span class="text">Periksa</span>
                    </button>
                  </center>
                  </td>
                </tr>
              @endforeach

            </tbody>
          </table>
          
        </div>
        <div class="paginate">
          <ul class="pagination">
              <!-- Tombol "Previous" -->
              @if ($user ->currentPage() > 1)
                  <li><a href="{{ $user ->previousPageUrl() }}">Previous</a></li>
              @endif
      
              <!-- Nomor halaman 1-5 -->
              @php
                  // Hitung nomor halaman yang akan ditampilkan
                  $startPage = $user ->currentPage() >= 5 ? $user ->currentPage() - 3 : 1;
                  $endPage = min($user ->lastPage(), $startPage + 4);
              @endphp
              @for ($i = $startPage; $i <= $endPage; $i++)
                  <li class="{{ $user ->currentPage() == $i ? 'active' : '' }}">
                      <a href="{{ $user ->url($i) }}">{{ $i }}</a>
                  </li>
              @endfor
      
              <!-- Tombol "Next" jika halaman berikutnya ada -->
              @if ($user ->currentPage() < $user ->lastPage())
                  <li><a href="{{ $user ->nextPageUrl() }}">Next</a></li>
              @endif
          </ul>
      </div>
      </div>
    </div>
  </div>
</div>
<div class="footer"></div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRg1x0l3/h5Q24EXA5Bq/FEExZV/Sl5yT1QebW1F1" crossorigin="anonymous"></script>
<script>
  $(document).ready(function() {
    $('.btn_gas').on('click', function(event) {
      const userId = $(this).data('user-id'); // Mengambil userId dari atribut data 'user-id'    
      // Fetch patient data using AJAX
      console.log(userId);
      $.ajax({
        url: `/laboran/pasien/${userId}`,
        method: 'GET',
        success: function(data) {
          // Populate the form fields with patient data
          $('#id').val(data.id);
          $('#user_id').val(userId);
          $('#id_user').val(data.id_user);
          $('#name').val(data.name);
          $('#tgl_lahir').val(data.tgl_lahir);
          $('#umur').val(data.umur);
          $('#alamat').val(data.alamat);
          if (data.jenis_kelamin == 0) {
              $('#jenis_kelamin').val('Perempuan');
          } else {
              $('#jenis_kelamin').val('Laki-laki');
          }     
        },
        error: function() {
          alert('Failed to fetch patient data.');
        }
      });
    });
  });

  function printForm() {
  const form = document.getElementById('examination-form');
  let printContents = '<div>';

  // Add custom styles for printing
  printContents += `
      <style>
          body {
              font-family: Arial, sans-serif;
          }
          .print-header {
              text-align: center;
              margin-bottom: 20px;
          }
          .print-section {
              margin-bottom: 10px;
          }
          .print-section label {
              font-weight: bold;
          }
          .print-section p {
              margin: 0;
          }
      </style>
  `;

  // Add header
  printContents += `
      <div class="print-header">
          <h2>Form Pemeriksaan Pasien</h2>
      </div>
      <br>
  `;

  // Add form data
  $(form).find('input:not([type=hidden]), select, textarea').each(function() {
      const label = $(this).closest('td').prev('td').find('label.form-label').text();
      let value = $(this).val();
      if (this.tagName === 'SELECT') {
          value = $(this).find('option:selected').text().split('-')[0];
      } else if (label) {
          // Split the value by hyphen and take the first part
          value = value.split('-')[0];
      }
      // Print section only if value exists
      if (value.trim() !== '') {
          printContents += `
              <div class="print-section">
                  <label>${label}:</label>
                  <p>${value}</p>
              </div><br>
          `;
      }
  });

  printContents += '</div>';

  const originalContents = document.body.innerHTML;
  document.body.innerHTML = printContents;
  window.print();
  document.body.innerHTML = originalContents;
  
  // Redirect to the homepage after printing
  window.location.href = 'http://127.0.0.1:8000/dashboard/laboran/daftar_laboratorium';
}


  </script>
  <script></script>
@endsection
