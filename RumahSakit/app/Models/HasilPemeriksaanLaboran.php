<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilPemeriksaanLaboran extends Model
{
    protected $table = 'table_hasil_pemeriksaan_laboran';

    protected $fillable =[
        'id_user',
        'id_pemeriksaan',
        'id_rincian_pemeriksaan',
        'no_rm',
        'nik',
        'name',
        'tgl_lahir',
        'alamat',
        'pemeriksaan',
        'hasil_pemeriksaan',
        'satuan_pemeriksaan',
        'nilai_rujukan',
        'catatan-dokter',

    ];

    use HasFactory;
}