<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('halaman_awal');
    }

    public function pegawai(){
        return view('halaman_pegawai');
    }
}
