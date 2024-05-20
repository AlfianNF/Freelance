<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatPemeriksaan extends Model
{
    use HasFactory;

    protected $table = 'riwayat_pemeriksaan';

    protected $fillable =[
        'no_rm',
        'id_user',
        'name',
        'pemeriksaan',
        'status_pemeriksaan',
    ];
}
