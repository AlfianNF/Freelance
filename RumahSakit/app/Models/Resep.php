<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Resep extends Model
{
    use HasFactory;

    protected $fillable =[
        'nama_obat',
        'id_user',
    ];

    public function resep_obat(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
