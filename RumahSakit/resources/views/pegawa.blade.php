
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
        top: 18%;
        left: 28%;
    }

    .tombol {
        position: absolute;
        top: 51%;
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
        top: 64%;
        left: 41%;
        opacity: 1;
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
        top: 60%;
        left: 41%;
        opacity: 1;
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
        <img src="/gambar/teks_bg_awal.png" alt="">
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
        <img src="/gambar/t-3b.png" alt="">
        <a href="/login/laboran">
            <img class="tombol3_efek" src="gambar/t-3c-h.png" alt="">
        </a>
    </div>

</body>

</html>