


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pemeriksaan Laboran</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel="stylesheet" href="/pemeriksaan_admin.css" />
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
        margin: 15% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 50%;
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
    </style>
  </head>
  <body>
    <!--Modals-->
    @foreach ($jenis_pemeriksaan as $pemeriksaan)
    <div id="modal_{{ $pemeriksaan->id }}" class="modal">
      <div class="modal-content">
        <span id="closeModalBtn" class="close">&times;</span>
        <div class="isi_modals">
          <h1 class="text">Edit Jenis Pemeriksaan </h1>
          <form action="{{ route('dashboard.admin.update_pemeriksaan', ['id' => $pemeriksaan->id]) }}" method="POST">
            @csrf @method('PUT')

            <label class="text1" for="jenis_pemeriksaan">Jenis Pemeriksaan :</label>
            <input class="input" type="text" id="jenis_pemeriksaan" name="jenis_pemeriksaan" value="{{ $pemeriksaan->jenis_pemeriksaan }}" />
        </div>
        
        <button type="submit" class="btn_close" >Update</button>
      </div>
    </form>
    </div>
    @endforeach
<!--Akhir Modal-->
    <div class="Dasar">
        <div class="kiri">
          <div class="atas-kiri">
            <img class="logo-kiri-atas" src="/gambar/logo.png" alt="" />
            <h1 class="teks-logo-kiri-atas">RSUD Dr.Radjiman</h1>
          </div>
          <div class="bawah-kiri">
            <a href="/dashboard/admin" class="btn-kiri-1">
              <img src="/gambar/btn-icon1.png" alt="Icon" class="btn-icon" />
              <span class="btn-text">Dashboard</span> </a
            ><br />
            <a href="/dashboard/admin/pemeriksaan" class="aktif_btn">
              <img src="/gambar/person-vcard-fill.svg" alt="Icon" class="btn-icon" />
              <span class="btn-text">Jenis Pemeriksaan</span> </a
            ><br />
            <a href="/dashboard/admin/rincian_pemeriksaan" class="btn-kiri-1">
              <img src="/gambar/clipboard-data.svg" alt="Icon" class="btn-icon" />
              <span class="btn-text">Rincian Pemeriksaan</span> </a
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
          <h1 class="teks-logo-kanan-atas">HALAMAN ADMIN</h1>
          <i class="bi bi-bell-fill"></i>
          <form action="/dashboard/admin/pemeriksaan" method="GET">
            <input type="search" name="search" class="search-input" placeholder="search..." />
          </form>
          <span class="dokter">A</span>
        </div>
        <div class="bawah-kanan">
          <div class="sampul">
            <div class="judul">
              <span class="desjudul">Tambah Data Jenis Pemeriksaan</span>
                <form action="{{ route('dashboard.admin.pemeriksaan') }}" method="POST">
                @csrf
                <label class="text" for="jenis_pemeriksaan">Jenis Pemeriksaan</label>
                <input class="input" type="text" name="jenis_pemeriksaan" id="jenis_pemeriksaan" placeholder="Masukan Jenis Pemeriksaan">

                <button class="btn_submit" type="submit"><span class="text">Submit</span></button>
                </form>
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
                        <th>Jenis Pemeriksaan</th>
                        <th style="width: 20%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Isi tabel disini -->
                    @foreach ($jenis_pemeriksaan as $pemeriksaan)
                    <tr>
                        <td><center>{{ $loop->iteration + $jenis_pemeriksaan->firstItem() - 1  }}</center></td>
                        <td><center>{{ $pemeriksaan->jenis_pemeriksaan }}</center></td>
                        <td class="button-container">
                            <div class="button-group">
                                <button id="openModalBtn_{{ $pemeriksaan->id }}" class="btn_edit"><span class="text">Edit</span></button>
                                <form action="{{ route('dashboard.admin.delete_pemeriksaan', ['id' => $pemeriksaan->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn_delete"><span class="text">Delete</span></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
            </div>
            <div class="paginate">
              <ul class="pagination">
                  <!-- Tombol "Previous" -->
                  @if ($jenis_pemeriksaan ->currentPage() > 1)
                      <li><a href="{{ $jenis_pemeriksaan ->previousPageUrl() }}">Previous</a></li>
                  @endif
          
                  <!-- Nomor halaman 1-5 -->
                  @php
                      // Hitung nomor halaman yang akan ditampilkan
                      $startPage = $jenis_pemeriksaan ->currentPage() >= 5 ? $jenis_pemeriksaan ->currentPage() - 3 : 1;
                      $endPage = min($jenis_pemeriksaan ->lastPage(), $startPage + 4);
                  @endphp
                  @for ($i = $startPage; $i <= $endPage; $i++)
                      <li class="{{ $jenis_pemeriksaan ->currentPage() == $i ? 'active' : '' }}">
                          <a href="{{ $jenis_pemeriksaan ->url($i) }}">{{ $i }}</a>
                      </li>
                  @endfor
          
                  <!-- Tombol "Next" jika halaman berikutnya ada -->
                  @if ($jenis_pemeriksaan ->currentPage() < $jenis_pemeriksaan ->lastPage())
                      <li><a href="{{ $jenis_pemeriksaan ->nextPageUrl() }}">Next</a></li>
                  @endif
              </ul>
          </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer"></div>
    <script>
      // Ambil semua tombol "Edit" berdasarkan ID
      const editButtons = document.querySelectorAll('[id^="openModalBtn_"]');

      // Tambahkan event listener untuk setiap tombol "Edit"
      editButtons.forEach(button => {
        button.addEventListener('click', () => {
          // Ambil ID modal dari atribut ID tombol "Edit"
          const modalId = button.getAttribute('id').replace('openModalBtn_', '');
          // Tampilkan modal yang sesuai dengan ID
          document.getElementById(`modal_${modalId}`).style.display = "block";
        });
      });

      // Ambil semua tombol "Close" pada modal
      const closeModalBtns = document.querySelectorAll('.close');

      // Tambahkan event listener untuk setiap tombol "Close"
      closeModalBtns.forEach(btn => {
        btn.addEventListener('click', () => {
          // Sembunyikan modal saat tombol "Close" ditekan
          btn.parentElement.parentElement.style.display = "none";
        });
      });
    </script>
    
    <script></script>
  </body>
</html>
