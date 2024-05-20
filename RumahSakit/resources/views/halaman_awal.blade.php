
<!DOCTYPE html>
<html>

<head>
    <title>RUSD Radjiman</title>
    <style>
    body {
        background-image: url('/gambar/bg_awal_3.gif');
        background-size: cover;
        background-repeat: no-repeat;
    }

    .judul {
        position: absolute;
        top: 16%;
        left: 27%;
    }

    .tombol {
        position: absolute;
        top: 70%;
        left: 43%;
        opacity: 0;
    }

    .tambah {
        position: absolute;
        top: 0%;
        left: 0%;
        opacity: 0;
        /* Awalnya tidak terlihat */
        transition: all 0.5s ease;
    }

    .tambah:hover {
        opacity: 1;
    }

    .tombol2 {
        position: absolute;
        top: 58%;
        left: 41%;
        opacity: 0;
    }

    .tambah2 {
        position: absolute;
        top: 0%;
        left: 0%;
        opacity: 0;
        /* Awalnya tidak terlihat */
        transition: all 0.5s ease;
    }

    .tambah2:hover {
        opacity: 1;
    }
    </style>
</head>

<body>
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    {{-- <div class="judul">
        <img src="/gambar/teks_bg_awal.png" alt="">
    </div> --}}
    <div class="judul">
        <img src="/gambar/Judul_1.png" alt="">
    </div>
    <div class="tombol">
        <img src="/gambar/t-2.png" alt="">
        <a href="/login/pasien">
            <img class="tambah" src="gambar/t-2-h.png" alt="">
        </a>
    </div>
    <div class="tombol2">
        <img src="/gambar/t-1.png" alt="">
        <a href="/pegawai">
            <img class="tambah2" src="gambar/t-1-h.png" alt="">
        </a>
    </div>

    <script>
    // Fungsi untuk menampilkan tombol setelah 20 detik
    setTimeout(function() {
        document.querySelector('.tombol').style.opacity = '1';
        document.querySelector('.tombol2').style.opacity = '1';
    }, 100); // 20 detik dalam milidetik
    </script>

</body>

</html>