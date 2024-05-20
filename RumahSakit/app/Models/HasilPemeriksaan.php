<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilPemeriksaan extends Model
{
    use HasFactory;

    protected $table = 'table_hasil_pemeriksaan';

    protected $fillable = [
        'id_pemeriksaan',
        'id_user',
        'id_rincian_jenis_pemeriksaan',
        'hasil_pemeriksaan',
        'satuan_pemeriksaan',
        'nilai_rujukan',
    ];

    public function pemeriksaan()
    {
        return $this->belongsTo(Pemeriksaan::class, 'id_pemeriksaan', 'id');
    }

    public function rincian_pemeriksaan()
    {
        return $this->belongsTo(RincianJenisPemeriksaan::class, 'id_rincian_jenis_pemeriksaan', 'id');
    }
}
