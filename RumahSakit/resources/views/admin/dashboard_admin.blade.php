
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard Admin</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel="stylesheet" href="/dashbord_admin.css" />
    <style></style>
  </head>
  <body>
    <div class="Dasar">
      <div class="kiri">
        <div class="atas-kiri">
          <img class="logo-kiri-atas" src="/gambar/logo.png" alt="" />
          <h1 class="teks-logo-kiri-atas">RSUD Dr.Radjiman</h1>
        </div>
        <div class="bawah-kiri">
          <a href="/dashboard/admin" class="aktif_btn">
            <img src="/gambar/btn-icon1.png" alt="Icon" class="btn-icon" />
            <span class="btn-text">Dashboard</span> </a
          ><br />
          <a href="/dashboard/admin/pemeriksaan" class="btn-kiri-1">
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
        <div class="kanan">
            <div class="atas-kanan">
              <img class="logo-kanan-atas" src="/gambar/icon-kananatas.png" alt="" />
              <h1 class="teks-logo-kanan-atas">HALAMAN ADMIN</h1>
              <i class="bi bi-bell-fill"></i>
              <input type="text" class="search-input" placeholder="search..." />
              <span class="dokter">A</span>
            </div>
            <div class="bawah-kanan">
              <div class="konten">
                <div class="isi">
                  <span class="description1">Halo, Admin!</span>
                  <span class="description2">Selamat Bekerja!</span>
                </div>
              </div>
              <div class="diagram">
                    <div class="row" >
                        <div class="col" >
                            <div class="card" >
                                {!! $userChart->container() !!}
                            </div>
                        </div>
                    </div>
              </div>
            </div>
            </div>
            
          </div>
          </div>
          <div class="footer"></div>
          
  </body>
  <script src="{{ $userChart->cdn() }}"></script>
          {{ $userChart->script() }}
</html>
