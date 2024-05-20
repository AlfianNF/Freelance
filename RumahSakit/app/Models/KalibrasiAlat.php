<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KalibrasiAlat extends Model
{
    use HasFactory;

    protected $table = 'table_kalibrasi_alat';

    protected $fillable = [
        'penanggung_jawab',
        'nama_alat',
        'nomor_alat',
        'kalibrasi_sebelumnya',
        'kalibrasi_selanjutnya',
        'keterangan',
    ];
}
