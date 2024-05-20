<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kasir extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'nominal',
        'status_pembayaran',
    ];

    public function pembayaran_pasien(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
