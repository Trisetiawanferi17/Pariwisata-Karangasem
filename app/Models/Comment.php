<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    // Mengizinkan field ini diisi secara massal
    protected $fillable = ['user_id', 'wisata_id', 'content'];

    /**
     * Relasi balik ke model User.
     * Satu komentar ditulis oleh satu pengguna (User).
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}