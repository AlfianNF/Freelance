<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthenticationController extends Controller
{
    
    //validation create user
    public function register(Request $request)
    {
        $request->validate([
            'nik' => 'required|string|size:16',
            'password' => 'required',
            'name' => 'required',
            'username' => 'required',
            'jenis_kelamin' => 'required',
            'tgl_lahir' => 'required',
            'alamat' => 'required|string|max:255',
            'no_hp' => 'required',
            'tingkatan_user' => 'required',
        ]);

        // Buat pengguna baru
        $user = new User();
        $user->nik = $request->nik;
        $user->password = Hash::make($request->password);
        $user->name = $request->name;
        $user->username = $request->username;
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->tgl_lahir = $request->tgl_lahir;
        $user->alamat = $request->alamat;
        $user->no_hp = $request->no_hp;
        $user->tingkatan_user = $request->tingkatan_user;
        $user->save();

        return redirect()->route('index')->with('message','Berhasil mendaftar');
    }
    
    //login user
    public function login(Request $request){
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
    
        $user = User::where('username', $request->username)->first();
    
        if (! $user || ! Hash::check($request->password, $user->password)) {
            return redirect()->route('login')->withErrors([
                'username' => 'Username atau Password salah',
            ]);
        }
        
        // Autentikasi berhasil, redirect ke halaman dashboard
        return redirect('/dashboard');
    }
    

    public function logout(Request $request)
{
    Auth::logout();

    return view('halaman_awal')->with('message', 'Logout berhasil');
}

    
}
