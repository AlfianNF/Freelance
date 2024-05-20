<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pemeriksaan extends Model
{
    use HasFactory;

    protected $table = 'table_pemeriksaan';

    protected $fillable = [
        'id_user',
        'no_rm',
        'tgl_pemeriksaan',
        'status_pemeriksaan',
        'keluhan_pasien',
        'pemeriksaan_fisik',
        'catatan_dokter',
        'riwayat_penyakit',
        'alergi_obat',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function hasilPemeriksaans() 
    {
        return $this->hasMany(HasilPemeriksaan::class, 'id_pemeriksaan', 'id');
    }

}
