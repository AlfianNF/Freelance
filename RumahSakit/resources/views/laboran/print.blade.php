<!DOCTYPE html>
<html>
<head>
    <title>PRINT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body><br><br><br>
    <center><h1>Print Data</h1></center>
    <br>
    
<table class="table">
    <thead class="table-dark">
        <tr>
            <th>NO.RM</th>
            <th>NIK</th>
            <th>NAMA</th>
            <th>TGL_LAHIR</th>
            <th>ALAMAT</th>
            <th>PEMERIKSAAN</th>
            <th>HASIL</th>
            <th>SATUAN</th>
            <th>RUJUKAN</th>
            <th>CATATAN</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $lastResult->no_rm }}</td>
            <td>{{ $lastResult->nik }}</td>
            <td>{{ $lastResult->name }}</td>
            <td>{{ $lastResult->tgl_lahir }}</td>
            <td>{{ $lastResult->alamat }}</td>
            <td>{{ $lastResult->pemeriksaan }}</td>
            <td>{{ $lastResult->hasil_pemeriksaan }}</td>
            <td>{{ $lastResult->satuan_pemeriksaan }}</td>
            <td>{{ $lastResult->nilai_rujukan }}</td>
            <td>{{ $lastResult->catatan_dokter }}</td>
        </tr>
    </tbody>
</table>

</body>
<script type="text/javascript">
    // Panggil window.print() setelah dokumen selesai dimuat
    window.addEventListener('load', function() {
        window.print();

        // Set timeout untuk mengalihkan pengguna setelah 10 detik
        setTimeout(function(){
            window.location.href = '/dashboard/laboran/halaman_pemeriksaan'; // Mengarahkan ke route menu pasien
        }, 5000); // 10 detik (10000 milidetik)
    });
</script>
</html>
