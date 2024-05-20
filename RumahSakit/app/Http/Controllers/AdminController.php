<?php

namespace App\Http\Controllers;

use App\Charts\TingkatanUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\JenisPemeriksaan;
use App\Models\RincianJenisPemeriksaan;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    public function halaman_login(){
        return view('admin.menu_login');
    }

    public function dashboard(TingkatanUser $userChart)
    {
        return view('admin.dashboard_admin', ['userChart' => $userChart->build()]);
    }

    public function halaman_pemeriksaan(Request $request)
    {
        if($request->has('search')){
            $jenis_pemeriksaan = JenisPemeriksaan::where('jenis_pemeriksaan', 'LIKE', '%'.$request->search. '%')->paginate(7);
        }else{

            $jenis_pemeriksaan = JenisPemeriksaan::latest()->paginate(7);

        }

        return view('admin.pemeriksaan')->with('jenis_pemeriksaan', $jenis_pemeriksaan);
    }

    public function halaman_rincian_pemeriksaan(Request $request)
    {
        
        if($request->has('search')){
            $rincian_jenis_pemeriksaan = RincianJenisPemeriksaan::where('nama_jenis_pemeriksaan', 'LIKE', '%'.$request->search. '%')->paginate(7);
            $jenis_pemeriksaan = JenisPemeriksaan::where('jenis_pemeriksaan', 'LIKE', '%'.$request->search. '%')->paginate(7);
        }else{

            $rincian_jenis_pemeriksaan = RincianJenisPemeriksaan::latest()->paginate(7);

        }


        $jenis_pemeriksaan = JenisPemeriksaan::get()->all();
        
        return view('admin.rincian_pemeriksaan', [
            'jenis_pemeriksaan' => $jenis_pemeriksaan,
            'rincian_jenis_pemeriksaan' => $rincian_jenis_pemeriksaan
        ]);
    }

    public function edit_pemeriksaan($id){
        $pemeriksaan = JenisPemeriksaan::findOrFail($id);
        return view('admin.edit_pemeriksaan', compact('pemeriksaan'));
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
            if (Auth::user()->tingkatan_user === 'admin') {
                // Redirect ke view menu_laboran_profile.blade
                return redirect()->route('dashboard.admin');
            } else {
                // Jika pengguna bukan admin, kembalikan respon tidak diizinkan
                Auth::logout();
                return view('admin.menu_login_error')->with('failed', 'Anda bukan Admin');
            }
        } else {
            // Jika autentikasi gagal, kirimkan respon gagal
            return view('admin.menu_login_error')->with('failed', 'Anda bukan Admin');
        }
    }

    public function pemeriksaan(Request $request){
        // Validasi data
        $request->validate([
        'jenis_pemeriksaan' => 'required',
        ]);

        $jenis_pemeriksaan = new JenisPemeriksaan();
        $jenis_pemeriksaan->jenis_pemeriksaan = $request->jenis_pemeriksaan;
        $jenis_pemeriksaan->save();

        return redirect()->route('dashboard.admin.pemeriksaan')->with('success', 'Data berhasil di input');

    }

    public function update_pemeriksaan(Request $request, $id){

        // Validasi data
        $request->validate([
            'jenis_pemeriksaan' => 'required',
        ]);
    
        // Temukan data jenis pemeriksaan berdasarkan ID
        $pemeriksaan = JenisPemeriksaan::find($id);
        
        // Update data jenis pemeriksaan
        $pemeriksaan->jenis_pemeriksaan = $request->jenis_pemeriksaan;
        $pemeriksaan->save();
        
        return redirect()->route('dashboard.admin.pemeriksaan')->with('success', 'Data berhasil diupdate');
    }
    
    public function delete_pemeriksaan($id){
        // Nonaktifkan pembatasan kunci asing
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
    
        // Temukan data jenis pemeriksaan berdasarkan ID
        $pemeriksaan = JenisPemeriksaan::find($id);
    
        if(!$pemeriksaan){
            // Aktifkan kembali pembatasan kunci asing
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
            return redirect()->route('dashboard.admin.pemeriksaan')->with('error', 'Data tidak ditemukan');
        }
        
        // Hapus data jenis pemeriksaan
        $pemeriksaan->delete();
        
        // Aktifkan kembali pembatasan kunci asing
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    
        return redirect()->route('dashboard.admin.pemeriksaan')->with('success', 'Data berhasil dihapus');
    }
    

    public function rincian_pemeriksaan(Request $request){
        // Validasi data
        $request->validate([
        'id_jenis_pemeriksaan' => 'required',
        'nama_jenis_pemeriksaan' => 'required',
        ]);

        $jenis_pemeriksaan = new RincianJenisPemeriksaan();
        $jenis_pemeriksaan->id_jenis_pemeriksaan = $request->id_jenis_pemeriksaan;
        $jenis_pemeriksaan->nama_jenis_pemeriksaan = $request->nama_jenis_pemeriksaan;
        $jenis_pemeriksaan->save();

        return redirect()->route('dashboard.admin.rincian_pemeriksaan')->with('success', 'Data berhasil di input');

    }

    public function update_rincian_pemeriksaan(Request $request, $id){

        // Validasi data
        $request->validate([
            'id_jenis_pemeriksaan' => 'required',
            'nama_jenis_pemeriksaan' => 'required',
        ]);
    
        // Temukan data jenis pemeriksaan berdasarkan ID
        $pemeriksaan = RincianJenisPemeriksaan::find($id);
        
        // Update data jenis pemeriksaan
        $pemeriksaan->id_jenis_pemeriksaan = $request->id_jenis_pemeriksaan;
        $pemeriksaan->nama_jenis_pemeriksaan = $request->nama_jenis_pemeriksaan;
        $pemeriksaan->save();
        
        return redirect()->route('dashboard.admin.rincian_pemeriksaan')->with('success', 'Data berhasil diupdate');
    }
    
    public function delete_rincian_pemeriksaan($id){
        // Nonaktifkan pembatasan kunci asing
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
    
        // Temukan data rincian jenis pemeriksaan berdasarkan ID
        $rincian_jenis_pemeriksaan = RincianJenisPemeriksaan::find($id);
    
        if(!$rincian_jenis_pemeriksaan){
            // Aktifkan kembali pembatasan kunci asing
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
            return redirect()->route('dashboard.admin.rincian_pemeriksaan')->with('error', 'Data tidak ditemukan');
        }
        
        // Hapus data jenis pemeriksaan
        $rincian_jenis_pemeriksaan->delete();
        
        // Aktifkan kembali pembatasan kunci asing
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    
        return redirect()->route('dashboard.admin.rincian_pemeriksaan')->with('success', 'Data berhasil dihapus');
    }
    

    
}