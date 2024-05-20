<!DOCTYPE html>
<html>
<head>
    <title>Loading</title>
</head>
<body>
    <center>
        <h1>PROSES DATA SEDANG BERLANGSUNG</h1>
    </center>
</body>
<script type="text/javascript">
    // Set timeout untuk mengalihkan pengguna setelah 5 detik
    setTimeout(function(){
        window.location.href = '{{ route("print") }}'; // Mengarahkan ke route print.blade.php
    }, 5000); // 5 detik (5000 milidetik)
</script>
</html>
