<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarLaboratorium extends Model
{
    use HasFactory;
    protected $table = 'table_pendaftaran_laboratorium';
    protected $guarded=[
        'id',
    ];
}
