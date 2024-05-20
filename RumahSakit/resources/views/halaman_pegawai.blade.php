
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
        top: 80%;
        left: 43%;
        opacity: 0;
    }

    .tombol_efek {
        position: absolute;
        top: 0%;
        left: 0%;
        opacity: 0;
        /* Awalnya tidak terlihat */
        transition: all 0.5s ease;
    }

    .tombol_efek:hover {
        opacity: 1;
    }

    .tombol2 {
        position: absolute;
        top: 58%;
        left: 41.3%;
        opacity: 0;
    }

    .tombol2_efek {
        position: absolute;
        top: 0%;
        left: 0%;
        opacity: 0;
        /* Awalnya tidak terlihat */
        transition: all 0.5s ease;
    }

    .tombol2_efek:hover {
        opacity: 1;
    }

    .tombol3 {
        position: absolute;
        top: 69%;
        left: 39.3%;
        opacity: 0;
    }

    .tombol3_efek {
        position: absolute;
        top: 0%;
        left: 0%;
        opacity: 0;
        /* Awalnya tidak terlihat */
        transition: all 0.5s ease;
    }

    .tombol3_efek:hover {
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
    <div class="judul">
        <img src="/gambar/Judul_1.png" alt="">
    </div>
    <div class="tombol">
        <img src="/gambar/t-3a.png" alt="">
        <a href="/login/admin">
            <img class="tombol_efek" src="gambar/t-3a-h.png" alt="">
        </a>
    </div>
    <div class="tombol2">
        <img src="/gambar/t-3b.png" alt="">
        <a href="/login/dokter">
            <img class="tombol2_efek" src="gambar/t-3b-h.png" alt="">
        </a>
    </div>
    <div class="tombol3">
        <img src="/gambar/t-3c.png" alt="">
        <a href="/login/laboran">
            <img class="tombol3_efek" src="gambar/t-3c-h.png" alt="">
        </a>
    </div>

    <script>
    // Fungsi untuk menampilkan tombol setelah 20 detik
    setTimeout(function() {
        document.querySelector('.tombol').style.opacity = '1';
        document.querySelector('.tombol2').style.opacity = '1';
        document.querySelector('.tombol3').style.opacity = '1';
    }, 100); // 20 detik dalam milidetik
    </script>

</body>

</html>