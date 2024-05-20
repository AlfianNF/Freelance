<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockReagen extends Model
{
    use HasFactory;

    protected $table = 'table_stock_reagen';

    protected $fillable =[
        'penanggung_jawab',
        'tgl',
        'pemeriksaan',
        'satuan',
        'masuk',
        'keluar',
        'stock',
        'sisa_kit',
    ];
}
