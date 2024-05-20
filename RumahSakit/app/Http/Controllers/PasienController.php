<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pemeriksaan;
use Illuminate\Http\Request;
use App\Models\DaftarLaboratorium;
use Illuminate\Support\Facades\Auth;
use App\Models\HasilPemeriksaanLaboran;
use App\Http\Resources\ProfilePasienResource;


class PasienController extends Controller
{
    public function halaman_login(){
        return view('pasien.menu_login');
    }

    public function index(){
        $user = auth()->user();
        return view('pasien.menu_pasien_dashboard')->with('user',$user);
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
            if (Auth::user()->tingkatan_user === 'pasien') {
                // Redirect ke view menu_pasien_profile.blade
                return redirect()->route('dashboard.pasien');
            } else {
                // Jika pengguna bukan pasien, kembalikan respon tidak diizinkan
                Auth::logout();
                return view('pasien.menu_login_error')->with('failed', 'Anda bukan pasien');
            }
        } else {
            // Jika autentikasi gagal, kirimkan respon gagal
            return view('pasien.menu_login_error')->with('failed', 'Anda bukan pasien');
        }
    }


    public function profile() {
        if(auth()->check()) {
            $profile = auth()->user();
            $profile->loadMissing('pemeriksaans');
            return view('pasien.menu_pasien_profile', ['profile' => $profile]);
        } else {
            return abort(404); // Handle no user case
        }
    }

    public function daftar_laboran(){
        $user = auth()->user();
        return view('pasien.daftar_laboran', compact('user'));
    }
    

    public function update_profile(Request $request){
        // Validate the incoming request data
        $validatedData = $request->validate([
            'nik' => 'required|string|max:255',
            'nama_lengkap' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'jenis_kelamin' => 'required',
            'tgl_lahir' => 'required|date',
            'alamat' => 'required|string|max:255',
            'no_hp' => 'required|string|max:20',
            'riwayat_penyakit.*' => 'nullable|string|max:255',
            'alergi_obat.*' => 'nullable|string|max:255',
        ]);

        // Update the authenticated user's profile
        $user = auth()->user();
        $user->update([
            'nik' => $validatedData['nik'],
            'name' => $validatedData['nama_lengkap'],
            'username' => $validatedData['username'],
            'jenis_kelamin' => $validatedData['jenis_kelamin'] === 'laki-laki' ? 1 : 0,
            'tgl_lahir' => $validatedData['tgl_lahir'],
            'alamat' => $validatedData['alamat'],
            'no_hp' => $validatedData['no_hp'],
        ]);
        
            // Redirect back with success message
            return back()->with('success', 'Profile berhasil diupdate');
        }
    
    public function daftar_dokter(Request $request){

        if($request->has('search')){
            $dokter= User::where('name', 'LIKE', '%'.$request->search. '%')->paginate(7);
        }else{

            $dokter= User::where('tingkatan_user','dokter')->latest()->paginate(7);

        }
        return view('pasien.menu_pasien_daftar_dokter',['dokter_data' => $dokter]);
    }
    
    public function riwayat_pemeriksaan(Request $request){

        if($request->has('search')){
            $riwayat = HasilPemeriksaanLaboran::where('name', 'LIKE', '%'.$request->search. '%')->paginate(7);
        }else{

            $riwayat = HasilPemeriksaanLaboran::where('id_user',auth()->user()->id)->latest()->paginate(7);

        }
       

        return view('pasien.riwayat_pemeriksaan')->with('riwayat',$riwayat);
    }

    public function daftar_laboran_store(Request $request){
        $daftarLaboratorium = $request->validate([
            'id_user' => 'required',
            'name' => 'required',
            'jenis_kelamin' => 'required',
            'tgl_lahir' => 'required|date',
            'alamat' => 'required',
            'umur' => 'required',
        ]);
    
        // Gunakan nilai dari input tersembunyi untuk menyimpan data ke database
        $daftarLaboratorium = new DaftarLaboratorium();
        $daftarLaboratorium->id_user = $request->id_user;
        $daftarLaboratorium->name = $request->name;
        $daftarLaboratorium->jenis_kelamin = $request->jenis_kelamin;
        $daftarLaboratorium->tgl_lahir = $request->tgl_lahir;
        $daftarLaboratorium->alamat = $request->alamat;
        $daftarLaboratorium->umur = $request->umur;
        $daftarLaboratorium->save();
    
        return redirect()->route('dashboard.pasien.daftar_laboran');
    }
    
}