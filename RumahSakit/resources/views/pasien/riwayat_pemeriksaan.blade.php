<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>DASHBOARD PASIEN</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet"/>
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
    body {
        margin: 0;
        padding: 0;
        height: 100vh;
        overflow: hidden;
    }

    .Dasar {
        display: flex;
        height: 97vh;
        font-family: "Poppins", sans-serif;
        font-weight: bold;
        
    }

    .kiri {
        flex: 2.5;
        background-image: url(/gambar/kiri-1.png);
        background-size: cover;
        /* Mengatur agar gambar ditampilkan sepenuhnya tanpa terpotong */
        background-repeat: no-repeat;
        /* Menghindari pengulangan gambar */
        background-position: center;
        /* Posisi gambar di tengah-tengah */
        display: flex;
        flex-direction: column;
    }

    .atas-kiri {
        flex: 1.5;
        display: flex;
        /* Mengatur tata letak menjadi flex */
        align-items: center;
    }

    .bawah-kiri {
        flex: 8.5;
    }

    .kanan {
        flex: 7.5;
        display: flex;
        flex-direction: column;
    }

    .atas-kanan {
        flex: 1.5;
        display: flex;
        align-items: center;
        background-color: #e8e8e8;
    }

    .bawah-kanan {
        flex: 8.5;
        background-color: white;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .konten {
        width: 95%;
        height: 90%;
        display: flex;
        flex-direction: column;
        align-items: center;
        background-color: #555cb3;
        border-bottom-left-radius: 20px;
        border-bottom-right-radius: 20px;
    }

    .konten-atas {
        width: 100%;
        display: flex;
        flex: 1;
        background-image: linear-gradient(to right, #8b55fe, #5ddde7);
    }

    .konten-bawah {
        width: 100%;
        flex: 9;
        display: flex;
        background-color: #555cb3;
        border-bottom-left-radius: 20px;
        border-bottom-right-radius: 20px;
    }

    .konten-bawah-kiri,
    .konten-bawah-kanan {
        width: 50%;
    }

    .konten-bawah-kiri div,
    .konten-bawah-kanan div {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        padding: 10px;
    }

    .konten-bawah-kiri label,
    .konten-bawah-kanan label {
        color: white;
        margin-bottom: 5px;
        margin-top: 5px;
        margin-left: 40px;
    }

    .konten-bawah-kanan textarea {
        width: 80%;
        height: 122px;
        padding: 10px;
        margin-bottom: 5px;
        margin-left: 30px;
        border: 2px solid #fff;
        outline: none;
        border-radius: 20px;
        resize: none;
    }

    .konten-bawah-kiri input {
        width: 80%;
        height: 2.5px;
        padding: 10px;
        margin-bottom: 5px;
        margin-left: 30px;
        border: 2px solid #fff;
        outline: none;
        border-radius: 20px;
        transition: border-color 0.3s;
        /* Efek transisi saat hover */
    }

    .konten-bawah-kanan .daftar {
        margin-right: 40px;
        margin-top: 17px;
        align-self: flex-end;
        padding: 10px 30px;
        font-weight: bold;
        font-size: 16px;
        border-radius: 10px;
        background-color: black;
        color: white;
        border: none;
        cursor: pointer;
        transition: background-color 0.3s, color 0.3s;
    }

    .konten-bawah-kanan .daftar:hover {
        background-color: red;
        color: white;
    }



    .logo-kiri-atas {
        margin-left: 20px;
        margin-right: 10px;
        width: 40px;
        height: 40px;
    }

    .teks-logo-kiri-atas {
        height: 30px;
        font-size: 28px;
        color: white;
    }

    .logo-kanan-atas {
        margin-left: 40px;
        margin-right: 20px;
        width: 40px;
        height: 40px;
    }

    .teks-logo-kanan-atas {
        height: 30px;
        font-size: 28px;
        color: black;
    }

    .btn-kiri-1 {
        margin-left: 25px;
        margin-top: 2px;
        display: inline-block;
        padding: 10px 20px;
        font-size: 20px;
        border-radius: 20px;
        background-color: transparent;
        color: white;
        border: none;
        cursor: pointer;
        text-decoration: none;
        overflow: hidden;
        position: relative;
        transition: all ease-in 0.3s;
    }

    .btn-kiri-1:hover {
        background-color: #555cb3;
        transition: all ease-in 0.3s;
        transform: scale(1.05);
    }

    .btn-kiri-1 .btn-icon {
        width: 30px;
        height: auto;
        vertical-align: middle;
        margin-right: 10px;
        margin-top: -4px;
    }

    .btn-kiri-1 .btn-text {
        vertical-align: middle;
    }

    .search-input {
        margin-left: 15px;
        background: url("/gambar/icon-search.png") no-repeat 240px center;
        background-size: 20px 20px;
        background-color: #555cb3;
        border: none;
        border-radius: 20px;
        padding: 6px 13px;
        font-size: 16px;
        width: 270px;
        outline: none;
        transition: background-color 0.3s, color 0.3s;
    }

    .search-input::placeholder {
        color: white;
    }

    .search-input:focus {
        background-color: white;
        color: black;
    }

    .konten-atas .teks {
        margin-left: 20px;
        font-size: 22px;
        color: white;
    }

    .footer {
        background-image: linear-gradient(90deg, rgb(137, 91, 252), rgb(93, 225, 230));
        height: 3vh;
    }

    .konten-bawah-kiri input {
        width: 85%;
        height: 100%;
        padding-top: 100px;
        padding-bottom: 100px;
        margin-top: 90px;
        margin-left: 40px;
        border: none;
        outline: none;
        border-radius: 20px;
        background-color: white;
        color: black;
        font-size: 26px;
        font-weight: bold;
        cursor: pointer;
        transition: background-color 0.3s, color 0.3s;
    }

    .konten-bawah-kanan input {
        width: 82%;
        height: 100%;
        padding-top: 100px;
        padding-bottom: 100px;
        margin-top: 90px;
        margin-left: 40px;
        border: none;
        outline: none;
        border-radius: 20px;
        background-color: white;
        color: black;
        font-size: 26px;
        font-weight: bold;
        cursor: pointer;
        transition: background-color 0.3s, color 0.3s;
    }

    .konten-bawah-kiri input:hover,
    .konten-bawah-kanan input:hover {
        background-color: gray;
        color: white;
        /* Warna latar biru yang sedikit lebih gelap saat hover */
    }

    table {
        border-bottom-left-radius: 20px;
        border-bottom-right-radius: 20px;
        /* Menambahkan efek melengkung pada tabel */
        overflow: hidden;
        /* Menghindari overflow konten di sudut */
        margin: 20px;
        width: 100%;
        border-collapse: collapse;
        border-collapse: collapse;
    /* Menggabungkan border sel-sel */
    /* Membuat lebar kolom tetap */
    }

    /* Style untuk header kolom */
    thead {
        background-color: gray;
    }

    th {
        padding: 20px;
        text-align: center;
        color: white;
    }

    /* Style untuk sel data */
    td {
        padding: 15px;
        text-align: center;
        vertical-align: top; /* Menjadikan teks dimulai dari atas */
    }

    /* Style untuk sel ganjil (alternatif warna) */
    tbody {
        background-color: white;
    }

    tbody tr:nth-child(odd) {
        background-color: white;
    }

    /* Padding dan margin pada thead dan tbody */
    thead,
    tbody {
        padding: 10px;
        margin: 10px;
    }

    #margin-tabel {
        padding-left: 5px;
        padding-right: 5px;
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
                <a href="/dashboard/pasien" class="btn-kiri-1">
                    <img src="/gambar/btn-icon1.png" alt="Icon" class="btn-icon" />
                    <span class="btn-text">Dashboard</span> </a><br />
                <a href="/dashboard/pasien/profile" class="btn-kiri-1">
                    <img src="/gambar/btn-icon2.png" alt="Icon" class="btn-icon" />
                    <span class="btn-text">Profile</span> </a><br />
                <a href="/dashboard/pasien/daftar-dokter" class="btn-kiri-1">
                    <img src="/gambar/btn-icon4.png" alt="Icon" class="btn-icon" />
                    <span class="btn-text">Daftar Dokter</span> </a><br />
                <a href="/dashboard/pasien/daftar_laboran" class="btn-kiri-1">
                    <img src="/gambar/btn-icon6.png" alt="Icon" class="btn-icon" />
                    <span class="btn-text">Daftar Laboratorium</span> </a><br />
                <a href="/dashboard/pasien/riwayat_pemeriksaan" class="btn-kiri-1">
                    <img src="/gambar/btn-icon7.png" alt="Icon" class="btn-icon" />
                    <span class="btn-text">Riwayat Pemeriksaan</span> </a><br />
                    <br><br><br>
                <a href="/logout" class="btn-kiri-1">
                    <img src="/gambar/btn-icon9.png" alt="Icon" class="btn-icon" />
                    <span class="btn-text">Log Out</span> </a><br />
            </div>
        </div>
        <div class="kanan">
            <div class="atas-kanan">
                <img class="logo-kanan-atas" src="/gambar/icon-kananatas.png" alt="" />
                <h1 class="teks-logo-kanan-atas">DASHBOARD PASIEN</h1>

                <form action="/dashboard/pasien/riwayat_pemeriksaan" method="GET">
                    <input type="search" name="search" class="search-input" placeholder="search..." />
                  </form>
            </div>
            <div class="bawah-kanan">
                
                <div class="konten">
                    <div class="konten-atas">
                        <h2 class="teks">Riwayat Pemeriksaan</h2>
                    </div>
                    <div class="konten-bawah">
                        <table>
                            <thead>
                                <tr>
                                    <th id="margin-tabel">NO.</th>
                                    <th>NO RM</th>
                                    <th>Pemeriksaan</th>
                                    <th>Hasil Pemeriksaan</th>
                                    <th>Tanggal Pemeriksaan</th>
                                    <th>Cataan Dokter</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($riwayat as $data)
                                    <tr>
                                        <td id="margin-tabel">{{ $loop->iteration + $riwayat->firstItem() - 1  }}</td> 
                                        <td>{{ $data->no_rm }}</td>
                                        <td>{{ $data->pemeriksaan }}</td>
                                        <td>{{ $data->hasil_pemeriksaan }}</td>
                                        <td>{{ \Carbon\Carbon::parse($data->created_at)->isoFormat('D MMMM YYYY') }}</td>                                        
                                        <td>{{ $data->catatan_dokter }}</td>
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
            <script>
            // Membuat fungsi untuk menyesuaikan ukuran konten dengan ukuran layar
            function adjustLayout() {
            var screenWidth = window.innerWidth;
            
            // Menyesuaikan lebar tabel dengan lebar layar
            var table = document.querySelector('table');
            if (screenWidth <= 768) {
            table.style.width = "90%";
            } else {
            table.style.width = "100%";
            }
            }
            
            // Memanggil fungsi adjustLayout() saat halaman dimuat dan saat ukuran layar berubah
            window.onload = adjustLayout;
            window.onresize = adjustLayout;
            </script>
            
        </div>
    </div>
    <div class="footer"></div>
</body>

</html>