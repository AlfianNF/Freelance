<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Pemeriksaan;
use Illuminate\Http\Request;
use App\Models\HasilPemeriksaan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\RincianJenisPemeriksaan;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\HasilPemeriksaanResource;
use App\Models\JenisPemeriksaan;
use App\Models\RiwayatPemeriksaan;

class DokterController extends Controller
{
    public function halaman_login(){
        return view('dokter.menu_login');
    }

    public function dashboard(){
        return view('dokter.dashboard_dokter');
    }

    public function input_pemeriksaan(){
        $user = User::where('tingkatan_user','pasien')->get();

        return view('dokter.input_pemeriksaan')->with('user', $user);
    }

    public function input_pemeriksaan_store(Request $request){
        // Validasi data
        $validate = $request->validate([
            'id_user' => 'required',
            'no_rm' => 'required',
            'riwayat_penyakit' => 'required',
            'alergi_obat' => 'required',
            'tgl_pemeriksaan' => 'required|date',
            'status_pemeriksaan' => 'required',
        ]);

        // Simpan data riwayat pemeriksaan
        $pemeriksaan = new Pemeriksaan();
        $pemeriksaan->id_user = $request->id_user;
        $pemeriksaan->no_rm = $request->no_rm;
        $pemeriksaan->riwayat_penyakit = $request->riwayat_penyakit;
        $pemeriksaan->alergi_obat = $request->alergi_obat;
        $pemeriksaan->tgl_pemeriksaan = $request->tgl_pemeriksaan;
        $pemeriksaan->status_pemeriksaan = $request->status_pemeriksaan;
        $pemeriksaan->save();

        return redirect()->route('dashboard.dokter.input_pemeriksaan')->with('success', 'Pemeriksaan berhasil ditambah');

    }

    public function hasil_pemeriksaan(){
        $users = User::all();
        $jenis_pemeriksaan = JenisPemeriksaan::all();
        $rincian_jenis_pemeriksaan = RincianJenisPemeriksaan::all();
    
        return view('dokter.permintaan_pemeriksaan_lab')->with([
            'users' => $users,
            'jenis_pemeriksaan' => $jenis_pemeriksaan,
            'rincian_jenis_pemeriksaan' => $rincian_jenis_pemeriksaan,
        ]);
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
            if (Auth::user()->tingkatan_user === 'dokter') {
                // Redirect ke view menu_dokter_profile.blade
                return redirect()->route('dashboard.dokter');
            } else {
                // Jika pengguna bukan dokter, kembalikan respon tidak diizinkan
                Auth::logout();
                return view('dokter.menu_login_error')->with('failed', 'Anda bukan Dokter');
            }
        } else {
            // Jika autentikasi gagal, kirimkan respon gagal
            return view('dokter.menu_login_error')->with('failed', 'Anda bukan Dokter');
        }
    }

    public function index(Request $request){

        if($request->has('search')){
            $data = User::where('name', 'LIKE', '%'.$request->search. '%')->paginate(7);
        }else{

            $data = User::where('tingkatan_user', 'pasien')->with('pemeriksaans')->latest()->paginate(7);

        }
        return view('dokter.daftarpasien_dokter')->with('data', $data);
    }

    // public function show($id)
    // {
    //     //mengambil data berdasarkan id_jenis_pemeriksaan = id yang di input
    //     $data = RincianJenisPemeriksaan::where('id_jenis_pemeriksaan', $id)->get();

    //     if($data->isEmpty()){
    //         // Jika tidak ada data, mengembalikan pesan bahwa data tidak ditemukan
    //         return response()->json(['message' => 'Data tidak ditemukan'], 404);
    //     }

    //     return response()->json($data);
    // }

    public function update(Request $request, $id)
    {
        $rules = [
            'keluhan_pasien' => 'required|string',
            'pemeriksaan_fisik' => 'required|string',
            'catatan_dokter' => 'required|string',
        ];

        $validator = Validator::make($request->only(['keluhan_pasien', 'pemeriksaan_fisik', 'catatan_dokter']), $rules);

        // Memeriksa apakah validasi gagal
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // Mengupdate data pemeriksaan
        $pemeriksaan = Pemeriksaan::find($id);

        // Periksa apakah pemeriksaan ditemukan
        if (!$pemeriksaan) {
            return response()->json(['message' => 'Data dengan id ' . $id . ' tidak ditemukan'], 404);
        }

        // Mengupdate data pemeriksaan
        $pemeriksaan = Pemeriksaan::findOrFail($id);
        $pemeriksaan->update($request->only(['keluhan_pasien', 'pemeriksaan_fisik', 'catatan_dokter']));

        return response()->json(['message' => 'Data berhasil diperbarui'], 200);
    }

    public function store(Request $request){
        $pemeriksaan = new Pemeriksaan();

        $rules = [
            'id_user' => 'required',
            'no_rm' => 'required',
            'riwayat_penyakit' => 'required|string',
            'alergi_obat' => 'required|string',
            'tgl_pemeriksaan' => 'required|string',
            'status_pemeriksaan' => 'required|string',
            'keluhan_pasien' => 'nullable',
            'pemeriksaan_fisik' => 'nullable',
            'catatan_dokter' => 'nullable',
        ];

        $validator = Validator::make($request->all(),$rules);

        // Memeriksa apakah validasi gagal
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $pemeriksaan->id_user = $request->id_user;
        $pemeriksaan->riwayat_penyakit = $request->riwayat_penyakit;
        $pemeriksaan->alergi_obat = $request->alergi_obat;
        $pemeriksaan->tgl_pemeriksaan = $request->tgl_pemeriksaan;
        $pemeriksaan->status_pemeriksaan = $request->status_pemeriksaan;
        $pemeriksaan->keluhan_pasien = $request->keluhan_pasien;
        $pemeriksaan->pemeriksaan_fisik = $request->pemeriksaan_fisik;
        $pemeriksaan->catatan_dokter = $request->catatan_dokter;

        $store = $pemeriksaan->save();

        return response()->json(['message' => 'Data berhasil dibuat'], 200);
    }

    public function pemeriksaan($id)
    {
        $user = User::find($id);
        // Mengambil data hasil pemeriksaan terbaru berdasarkan id_user
        $pemeriksaan = Pemeriksaan::where('id_user', $id)->first();    
        $hasilPemeriksaan = HasilPemeriksaan::where('id_user', $id)
            ->with('pemeriksaan.user', 'rincian_pemeriksaan') 
            ->orderByDesc('updated_at') // Urutkan berdasarkan updated_at secara descending
            ->first(); 

        // Jika tidak ada hasil yang ditemukan berdasarkan updated_at, coba gunakan created_at
        if (!$hasilPemeriksaan || !$hasilPemeriksaan->updated_at) {
            $hasilPemeriksaan = HasilPemeriksaan::where('id_user', $id)
                ->with('pemeriksaan.user', 'rincian_pemeriksaan') // Eager load relationships
                ->orderByDesc('created_at') // Urutkan berdasarkan created_at secara descending
                ->first();
        }

        // Memeriksa apakah data ditemukan
        if (!$hasilPemeriksaan) {
            return back()->with('message','Data tidak ditemukan');
        }

        // Mengambil data user dari hasil pemeriksaan
        $tgl_lahir = Carbon::parse($user->tgl_lahir);
        $umur = $tgl_lahir->diffInYears(Carbon::now()); // Hitung umur menggunakan Carbon

        // Mengembalikan view pemeriksaan_dokter dengan data hasil pemeriksaan dan data user
        return view('dokter.pemeriksaan_dokter', [
            'id' => $id,
            'umur' => $umur,
            'user' => $user,
            'pemeriksaan' => $pemeriksaan,
            'hasilPemeriksaan' => $hasilPemeriksaan,
        ]);
    }

    public function update_pemeriksaan(Request $request, $id)
    {
        // Validasi data dari form
        $request->validate([
            'no_rm' => 'required',
            'keluhan_pasien' => 'nullable',
            'pemeriksaan_fisik' => 'nullable',
            'catatan_dokter' => 'nullable',
        ]);

        // Mengambil data pemeriksaan berdasarkan id user
        $pemeriksaan = Pemeriksaan::where('id_user', $id)->first();

        // Periksa apakah pemeriksaan ditemukan
        if (!$pemeriksaan) {
            return redirect()->route('dashboard.dokter.daftarpasien')->with('error', 'Pemeriksaan tidak ditemukan');
        }

        // Update data pemeriksaan
        $pemeriksaan->no_rm = $request->no_rm;
        $pemeriksaan->keluhan_pasien = $request->keluhan_pasien;
        $pemeriksaan->pemeriksaan_fisik = $request->pemeriksaan_fisik;
        $pemeriksaan->catatan_dokter = $request->catatan_dokter;

        // Simpan perubahan
        $pemeriksaan->save();

        // Redirect dengan pesan sukses
        return redirect()->route('dashboard.dokter.daftarpasien')->with('success', 'Pemeriksaan berhasil diperbarui');
    }

    
    public function hasil_pemeriksaan_store(Request $request){
        // Validasi request
        $request->validate([
            'no_rm' => 'required',
            'status_pemeriksaan' => 'required',
            'id_user' => 'required',
            'id_pemeriksaan' => 'required',
            'id_rincian_jenis_pemeriksaan' => 'required',
            'hasil_pemeriksaan' => 'required|string',
            'satuan_pemeriksaan' => 'required',
            'nilai_rujukan' => 'required|string',
        ]);
    
        // Memisahkan nilai id dan name dari id_user
        list($userId, $userName) = explode(',', $request->input('id_user'));
        list($rincianId, $rincianName) = explode(',', $request->input('id_rincian_jenis_pemeriksaan'));
        list($pemeriksaanId, $pemeriksaanName) = explode(',', $request->input('id_pemeriksaan'));

        // Simpan data riwayat pemeriksaan
        $riwayatPemeriksaan = new RiwayatPemeriksaan();
        $riwayatPemeriksaan->id_user = $userId;
        $riwayatPemeriksaan->no_rm = $request->no_rm;
        $riwayatPemeriksaan->name = $userName;
        $riwayatPemeriksaan->pemeriksaan = $pemeriksaanName;
        $riwayatPemeriksaan->status_pemeriksaan = $request->status_pemeriksaan;
        $riwayatPemeriksaan->save();

        // Simpan data hasil pemeriksaan
        $hasilPemeriksaan = new HasilPemeriksaan();
        $hasilPemeriksaan->id_user = $userId;
        $hasilPemeriksaan->id_pemeriksaan = $pemeriksaanId;
        $hasilPemeriksaan->id_rincian_jenis_pemeriksaan = $rincianId;
        $hasilPemeriksaan->hasil_pemeriksaan = $request->hasil_pemeriksaan;
        $hasilPemeriksaan->satuan_pemeriksaan = $request->satuan_pemeriksaan;
        $hasilPemeriksaan->nilai_rujukan = $request->nilai_rujukan;
        $hasilPemeriksaan->save();
    
        // Redirect sesuai kebutuhan
        return redirect()->route('dashboard.dokter.hasil_pemeriksaan')->with('success', 'Data berhasil disimpan.');
    }
    
    public function riwayat(Request $request){

        if($request->has('search')){
            $riwayat = RiwayatPemeriksaan::where('name', 'LIKE', '%'.$request->search. '%')->paginate(7);
        }else{

            $riwayat = RiwayatPemeriksaan::where('status_pemeriksaan','selesai')->latest()->paginate(7);

        }

        

        return view('dokter.riwayat_dokter')->with('riwayat',$riwayat);
    }


}