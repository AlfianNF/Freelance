<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>RIWAYAT PASIEN</title>
    <style>
    body {
        margin: 0;
        padding: 0;
        height: 100vh;
    }

    .Dasar {
        display: flex;
        height: 97vh;
        font-family: "Poppins", sans-serif;
        font-weight: bold;
    }

    .kiri {
        flex: 2.5;
        background-image: url(gambar/kiri-1.png);
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
        background: url("gambar/icon-search.png") no-repeat 240px center;
        background-size: 20px 20px;
        background-color: #555cb3;
        border: none;
        border-radius: 20px;
        padding: 6px 13px;
        font-size: 16px;
        width: 250px;
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

    table {
        border-bottom-left-radius: 20px;
        border-bottom-right-radius: 20px;
        /* Menambahkan efek melengkung pada tabel */
        overflow: hidden;
        /* Menghindari overflow konten di sudut */
        margin: 20px;
        width: 100%;
        border-collapse: collapse;
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
        padding: 5px;
        text-align: center;
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
                <img class="logo-kiri-atas" src="gambar/logo.png" alt="" />
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
                <img class="logo-kanan-atas" src="gambar/icon-kananatas.png" alt="" />
                <h1 class="teks-logo-kanan-atas">DASHBOARD PASIEN</h1>

                <input type="text" class="search-input" placeholder="search..." />
            </div>
            <div class="bawah-kanan">
                <div class="konten">
                    <div class="konten-atas">
                        <h2 class="teks">RIWAYAT PASIEN</h2>
                    </div>
                    <div class="konten-bawah">
                        <table>
                            <thead>
                                <tr>
                                    <th id="margin-tabel">NO.</th>
                                    <th>TANGGAL</th>
                                    <th>NO RM</th>
                                    <th>NAMA</th>
                                    <th>STATUS PEMERIKSAAN</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td id="margin-tabel">1</td>
                                    <td>10-11-2004</td>
                                    <td>BPJS</td>
                                    <td>Tangan</td>
                                    <td>Sukses</td>
                                </tr>
                                <tr>
                                    <td id="margin-tabel">2</td>
                                    <td>02-1-2017</td>
                                    <td>BPJS</td>
                                    <td>Kaki</td>
                                    <td>Sukses</td>
                                </tr>
                                <tr>
                                    <td id="margin-tabel">3</td>
                                    <td>22-11-2010</td>
                                    <td>BPJS</td>
                                    <td>Badan</td>
                                    <td>Sukses</td>
                                </tr>
                                <tr>
                                    <td id="margin-tabel">4</td>
                                    <td>13-01-2022</td>
                                    <td>BPJS</td>
                                    <td>Kepala</td>
                                    <td>Sukses</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer"></div>
</body>
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

</html>