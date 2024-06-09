<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pemeriksaan;
use Illuminate\Http\Request;
use App\Models\KalibrasiAlat;
use App\Models\HasilPemeriksaanLaboran;
use App\Models\JenisPemeriksaan;
use App\Models\RiwayatPemeriksaan;
use App\Http\Controllers\Controller;
use App\Models\DaftarLaboratorium;
use App\Models\RincianJenisPemeriksaan;
use App\Models\StockReagen;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class LaboranController extends Controller
{
    public function getPasienData($id)
    {
        $pasien = DaftarLaboratorium::find($id);

        if ($pasien) {
            return response()->json([
                'id' => $id,
                'id_user' => $pasien->id_user,
                'name' => $pasien->name,
                'tgl_lahir' => $pasien->tgl_lahir,
                'jenis_kelamin' => $pasien->jenis_kelamin,
                'umur' => $pasien->umur,
                'alamat' => $pasien->alamat,
            ]);
        } else {
            return response()->json(['error' => 'Patient not found'], 404);
        }
    }

    public function getRiwayatData($id)
    {
        $riwayat = DaftarLaboratorium::find($id);

        if ($riwayat) {
            return response()->json([
                'id' => $id,
                'id_user' => $riwayat->id_user,
                'name' => $riwayat->name,
                'tgl_lahir' => $riwayat->tgl_lahir,
                'jenis_kelamin' => $riwayat->jenis_kelamin,
                'umur' => $riwayat->umur,
                'alamat' => $riwayat->alamat,
                'nama_pemeriksaan' => $riwayat->nama_pemeriksaan,
                'jenis_pemeriksaan' => $riwayat->jenis_pemeriksaan,
                'jaminan' => $riwayat->jaminan,
                'diagnosa' => $riwayat->diagnosa,
            ]);
        } else {
            return response()->json(['error' => 'Patient not found'], 404);
        }
    }

    public function halaman_login(){
        return view('laboran.menu_login');
    }

    public function dashboard(){
        return view('laboran.dashboard_laboran');
    }

    public function halaman_pemeriksaan(Request $request)
    {
    $query = RiwayatPemeriksaan::where('status_pemeriksaan', 'pending')->distinct('no_rm');

    if ($request->has('search')) {
        $query->where('name', 'like', '%' . $request->search . '%');
    }

    $riwayatPemeriksaan = $query->paginate(7);
    $no_rm_terlihat = []; // array untuk menyimpan nomor RM yang sudah ditampilkan

    return view('laboran.pemeriksaan_laboran')->with(compact('riwayatPemeriksaan', 'no_rm_terlihat'));
    }

    public function riwayat(Request $request)
    {

        if($request->has('search')){
            $riwayat = RiwayatPemeriksaan::where('name', 'LIKE', '%'.$request->search. '%')->paginate(7);
        }else{

            $riwayat = RiwayatPemeriksaan::where('status_pemeriksaan', 'selesai')->latest()->paginate(7);
        }
        

        return view('laboran.riwayat_laboran', compact('riwayat'));
    }

    public function stock_reagen(){
        return view('laboran.stock_reagen');
    }

    public function data_stock(Request $request){
        if($request->has('search')){
            $stock_reagen = StockReagen::where('penanggung_jawab', 'LIKE', '%'.$request->search. '%')->paginate(7);
        }else{

            $stock_reagen = StockReagen::latest()->paginate(7);
        }

        

        return view('laboran.data_stock')->with('stock_reagen',$stock_reagen);
    }

    public function kalibrasi_alat(){
        return view('laboran.kalibrasi_alat');
    }

    public function data_kalibrasi_alat(Request $request){

        if($request->has('search')){
            $kalibrasi_alat = KalibrasiAlat::where('penanggung_jawab', 'LIKE', '%'.$request->search. '%')->paginate(7);
        }else{
            $kalibrasi_alat = KalibrasiAlat::latest()->paginate(7);
            
        }

        

        return view('laboran.data_kalibrasi_alat')->with('kalibrasi_alat', $kalibrasi_alat);
    }

    public function daftar_laboratorium(Request $request){
        $search = $request->input('search');
    
        $query = DaftarLaboratorium::where('status', 'pending');
    
        if ($search) {
            $query->where(function($query) use ($search) {
                $query->where('name', 'like', "%{$search}%"); // Sesuaikan 'attribute_lain' dengan atribut yang relevan untuk pencarian
            });
        }
    
        $user = $query->paginate(7);
        $pemeriksaan = JenisPemeriksaan::all();
        $rincian_pemeriksaan = RincianJenisPemeriksaan::all();
        $dokter = User::where('tingkatan_user', 'dokter')->get();
    
        return view('laboran.daftar_pemeriksaan_laboratorium', compact('user', 'pemeriksaan', 'rincian_pemeriksaan', 'dokter', 'search'));
    }
    
    

    public function login(Request $request)
    {
        // Validasi data
        $validate = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Authentikasi pengguna
        if (Auth::attempt($validate)) {
            // Periksa tingkatan pengguna
            if (Auth::user()->tingkatan_user === 'laboran') {
                // Redirect ke view menu_laboran_profile.blade
                return redirect()->route('dashboard.laboran');
            } else {
                // Jika pengguna bukan laboran, kembalikan respon tidak diizinkan
                Auth::logout();
                return view('laboran.menu_login_error')->with('failed', 'Anda bukan Laboran');
            }
        } else {
            // Jika autentikasi gagal, kirimkan respon gagal
            return view('laboran.menu_login_error')->with('failed', 'Anda bukan Laboran');
        }
    }

    public function pemeriksaan($id)
    {
        // Mengambil data user berdasarkan id dan pastikan tingkatan_user = "pasien"
        $data = User::where('id', $id)->where('tingkatan_user', 'pasien')->first();
        $pemeriksaan = Pemeriksaan::where('id_user', $id)->first();
        $riwayatPemeriksaan = RiwayatPemeriksaan::where('id_user', $id)->latest()->first();

        if (!$riwayatPemeriksaan) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }
    
        // Dapatkan nama pemeriksaan dari objek riwayatPemeriksaan
        $nama_pemeriksaan = $riwayatPemeriksaan->pemeriksaan;
    
        // Cari ID pemeriksaan berdasarkan nama pemeriksaan
        $jenis_pemeriksaan = JenisPemeriksaan::where('jenis_pemeriksaan', $nama_pemeriksaan)->first();
    
        // Jika jenis pemeriksaan ditemukan, ambil ID-nya
        if ($jenis_pemeriksaan) {
            $pemeriksaan_id = $jenis_pemeriksaan->id;
        } else {
            // Jika jenis pemeriksaan tidak ditemukan, kembalikan respon error
            return response()->json(['message' => 'Jenis pemeriksaan tidak ditemukan'], 404);
        }

        // Memeriksa apakah data ditemukan
        if (!$data) {
            // Jika tidak ada data, kembalikan pesan bahwa data tidak ditemukan
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        // Melewatkan data ke view
        return view('laboran.hasil_pemeriksaan_laboran', [
            'data' => $data,
            'pemeriksaan' => $pemeriksaan,
            'riwayatPemeriksaan' => $riwayatPemeriksaan,
            'pemeriksaan_id' => $pemeriksaan_id,
            'id' => $id,
            'nama_pemeriksaan' => $riwayatPemeriksaan->pemeriksaan // Menambahkan nama pemeriksaan
        ]);
    }


    public function hasil_pemeriksaan_store(Request $request){    
        // dd($request);
        // Lakukan validasi
        $request->validate([
            'id_user' => 'required',
            'id_pemeriksaan' => 'required',
            'id_rincian_pemeriksaan' => 'required',
            'no_rm' => 'required',
            'nik' => 'required',
            'name' => 'required',
            'tgl_lahir' => 'required',
            'alamat' => 'required',
            'pemeriksaan' => 'required',
            'hasil_pemeriksaan' => 'required',
            'satuan_pemeriksaan' => 'required',
            'nilai_rujukan' => 'required',
            'catatan_dokter' => 'required',
        ]);
        
        // Simpan data hasil pemeriksaan
        $hasilPemeriksaan = new HasilPemeriksaanLaboran();
        $hasilPemeriksaan->id_user = $request->id_user;
        $hasilPemeriksaan->id_pemeriksaan = $request->id_pemeriksaan;
        $hasilPemeriksaan->id_rincian_pemeriksaan = $request->id_rincian_pemeriksaan;
        $hasilPemeriksaan->no_rm = $request->no_rm;
        $hasilPemeriksaan->nik = $request->nik;
        $hasilPemeriksaan->name = $request->name;
        $hasilPemeriksaan->tgl_lahir = $request->tgl_lahir;
        $hasilPemeriksaan->alamat = $request->alamat;
        $hasilPemeriksaan->pemeriksaan = $request->pemeriksaan;
        $hasilPemeriksaan->hasil_pemeriksaan = $request->hasil_pemeriksaan;
        $hasilPemeriksaan->satuan_pemeriksaan = $request->satuan_pemeriksaan;
        $hasilPemeriksaan->nilai_rujukan = $request->nilai_rujukan;
        $hasilPemeriksaan->catatan_dokter = $request->catatan_dokter;
        $hasilPemeriksaan->save();
    
        // Mendapatkan hasil pemeriksaan terakhir
    $lastResult = HasilPemeriksaanLaboran::latest()->first();

    // Redirect atau response sesuai kebutuhan Anda
    return view('laboran.print')->with([
        'success' => 'Data berhasil disimpan.',
        'lastResult' => $lastResult
    ]);
    }
      

    public function printHasilPemeriksaan($id)
{
    $hasilPemeriksaan = HasilPemeriksaanLaboran::find($id);
    return view('print', compact('hasilPemeriksaan'));
}

    // public function riwayat(Request $request){
    //     // Validasi request
    //     $validator = Validator::make($request->all(), [
    //         'no_rm' => 'required|string',
    //         'name' => 'required|string',
    //         'pemeriksaan' => 'required|string',
    //         'status_pemeriksaan' => 'required|string',
    //     ]);

    //     // Jika validasi gagal, kembalikan response dengan error
    //     if ($validator->fails()) {
    //         return response()->json(['errors' => $validator->errors()], 422);
    //     }

    //     // Buat riwayat pemeriksaan baru
    //     $riwayatPemeriksaan = RiwayatPemeriksaan::create([
    //         'no_rm' => $request->no_rm,
    //         'name' => $request->name,
    //         'pemeriksaan' => $request->pemeriksaan,
    //         'status_pemeriksaan' => $request->status_pemeriksaan,
    //     ]);

    //     // Jika berhasil, kembalikan response dengan data riwayat pemeriksaan yang baru dibuat
    //     return response()->json(['message' => 'Riwayat pemeriksaan berhasil disimpan'], 201);    
    // }

    public function riwayat_pemeriksaan()
    {
        // Mendapatkan riwayat pemeriksaan
        $riwayatPemeriksaan = HasilPemeriksaanLaboran::all();

        // Jika tidak ada riwayat pemeriksaan, kembalikan response dengan pesan
        if ($riwayatPemeriksaan->isEmpty()) {
            return response()->json(['message' => 'Tidak ada riwayat pemeriksaan'], 404);
        }

        // Jika berhasil kembalikan response 
        return response()->json(['data' => $riwayatPemeriksaan], 200);
    }

    // public function kalibrasi_alat_store(Request $request){
    //     // Validasi request
    //     $validator = Validator::make($request->all(), [
    //         'penanggung_jawab' => 'required|string',
    //         'nama_alat' => 'required|string',
    //         'nomor_alat' => 'required|string',
    //         'kalibrasi_sebelumnya' => 'required|date',
    //         'kalibrasi_selanjutnya' => 'required|date',
    //         'keterangan' => 'required|string',
    //     ]);

    //     // Jika validasi gagal, kembalikan response dengan error
    //     if ($validator->fails()) {
    //         return response()->json(['errors' => $validator->errors()], 422);
    //     }

    //     // Buat Kalibrasi alat baru
    //     $kalibrasi_alat = KalibrasiAlat::create([
    //         'penanggung_jawab' => $request->penanggung_jawab,
    //         'nama_alat' => $request->nama_alat,
    //         'nomor_alat' => $request->nomor_alat,
    //         'kalibrasi_sebelumnya' => $request->kalibrasi_sebelumnya,
    //         'kalibrasi_selanjutnya' => $request->kalibrasi_selanjutnya,
    //         'keterangan' => $request->keterangan,
    //     ]);

    //     // Jika berhasil kembalikan response 
    //     return response()->json(['message' => 'Kalibrasi alat baru berhasil disimpan'], 201);    
    // }

    // public function kalibrasi_alat(){
    //     // Mendapatkan riwayat pemeriksaan
    //     $kalibrasi_alat = KalibrasiAlat::all();

    //     // Jika tidak ada riwayat pemeriksaan, kembalikan response dengan pesan
    //     if ($kalibrasi_alat->isEmpty()) {
    //         return response()->json(['message' => 'Tidak ada riwayat pemeriksaan'], 404);
    //     }

    //     // Jika berhasil kembalikan response 
    //     return response()->json(['data' => $kalibrasi_alat], 200);
    // }

    public function stock_reagen_store(Request $request){
        // Validasi data
        $request->validate([
            'penanggung_jawab' => 'required',
            'tgl' => 'required',
            'pemeriksaan' => 'required',
            'satuan' => 'required',
            'masuk' => 'required',
            'keluar' => 'required',
            'stock' => 'required',
            'sisa_kit' => 'required',
        ]);

        // Simpan data hasil Stock Reagen
        $stock_reagen = new StockReagen();
        $stock_reagen->penanggung_jawab = $request->penanggung_jawab;
        $stock_reagen->tgl = $request->tgl;
        $stock_reagen->pemeriksaan = $request->pemeriksaan;
        $stock_reagen->satuan = $request->satuan;
        $stock_reagen->masuk = $request->masuk;
        $stock_reagen->keluar = $request->keluar;
        $stock_reagen->stock = $request->stock;
        $stock_reagen->sisa_kit = $request->sisa_kit;
        $stock_reagen->save();
    
        // Redirect atau response sesuai kebutuhan Anda
        return redirect()->route('dashboard.laboran.stock_reagen')->with('success', 'Data berhasil disimpan.');
    }

    public function kalibrasi_alat_store(Request $request){
        // Validasi data
        $request->validate([
            'penanggung_jawab' => 'required',
            'nama_alat' => 'required',
            'nomor_alat' => 'required',
            'kalibrasi_sebelumnya' => 'required',
            'kalibrasi_selanjutnya' => 'required',
            'keterangan' => 'required',
        ]);

        // Simpan data hasil pemeriksaan
        $kalibrasi_alat = new KalibrasiAlat();
        $kalibrasi_alat->penanggung_jawab = $request->penanggung_jawab;
        $kalibrasi_alat->nama_alat = $request->nama_alat;
        $kalibrasi_alat->nomor_alat = $request->nomor_alat;
        $kalibrasi_alat->kalibrasi_sebelumnya = $request->kalibrasi_sebelumnya;
        $kalibrasi_alat->kalibrasi_selanjutnya = $request->kalibrasi_selanjutnya;
        $kalibrasi_alat->keterangan = $request->keterangan;
        $kalibrasi_alat->save();
    
        // Redirect atau response sesuai kebutuhan Anda
        return redirect()->route('dashboard.laboran.kalibrasi_alat')->with('success', 'Data berhasil disimpan.');
    }

    public function daftar_laboratorium_store(Request $request){

    $request->validate([
        'id' => 'required',
        'id_user' => 'required',
        'no_rm' => 'required',
        'dokter_pengirim' => 'required',
        'nama_pemeriksaan' => 'required',
        'jenis_pemeriksaan' => 'required',
        'keluhan' => 'required',
        'diagnosa' => 'required',
    ]);

    // Pecah nilai 'dokter_pengirim', 'nama_pemeriksaan', dan 'jenis_pemeriksaan'
    list($dokterName, $dokterId) = explode('-', $request->dokter_pengirim);
    list($namaPemeriksaan, $pemeriksaanId) = explode('-', $request->nama_pemeriksaan);
    list($jenisPemeriksaan, $jenisPemeriksaanId) = explode('-', $request->jenis_pemeriksaan);

    // Update or create DaftarLaboratorium record
    $daftarLaboratorium = DaftarLaboratorium::updateOrCreate(
        ['id' => $request->id],
        [
            'id_user' => $request->id_user,
            'no_rm' => $request->no_rm,
            'dokter_pengirim' => $dokterName,
            'id_dokter' => $dokterId,
            'nama_pemeriksaan' => $namaPemeriksaan,
            'id_pemeriksaan' => $pemeriksaanId,
            'jenis_pemeriksaan' => $jenisPemeriksaan,
            'id_rincian_pemeriksaan' => $jenisPemeriksaanId,
            'jaminan' => $request->jaminan,
            'keluhan' => $request->keluhan,
            'diagnosa' => $request->diagnosa,
        ]
    );

    // Set status to "selesai"
    $daftarLaboratorium->status = 'selesai';
    $daftarLaboratorium->save();
    return redirect()->route('dashboard.laboran.daftar_laboratorium')->with('success', 'Pemeriksaan berhasil disimpan.');

    }

    public function riwayat_pemeriksaan_pasien(Request $request){
        if($request->has('search')){
            $riwayat = DaftarLaboratorium::where('name', 'LIKE', '%'.$request->search. '%')->paginate(7);
        }else{

            $riwayat = DaftarLaboratorium::where('status', 'selesai')->latest()->paginate(7);
        }
        

        return view('laboran.riwayat_pemeriksaan_pasien', compact('riwayat'));
    }

}