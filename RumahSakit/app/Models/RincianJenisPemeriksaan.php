<?php

namespace App\Models;

use App\Models\HasilPemeriksaan;
use App\Models\JenisPemeriksaan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RincianJenisPemeriksaan extends Model
{
    use HasFactory;

    protected $table = 'table_rincian_jenis_pemeriksaan';

    protected $fillable =[
        'id_jenis_pemeriksaan',
        'nama_jenis_pemeriksaan',
    ];

    public function resep_obat(): BelongsTo
    {
        return $this->belongsTo(JenisPemeriksaan::class, 'id_jenis_pemeriksaan', 'id');
    }

    /**
     * Get all of the comments for the RincianJenisPemeriksaan
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function single_pemeriksaan(): HasMany
    {
        return $this->hasMany(HasilPemeriksaan::class, 'foreign_key', 'local_key');
    }

    public function jenisPemeriksaan(): BelongsTo // Ubah nama metode agar lebih deskriptif
    {
        return $this->belongsTo(JenisPemeriksaan::class, 'id_jenis_pemeriksaan', 'id');
    }
}
