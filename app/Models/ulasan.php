<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ulasan extends Model
{
    use HasFactory;
    protected $table = 'ulasan';

    protected $fillable = ['idtoko', 'email', 'nama', 'pesan', 'jawaban', 'faq'];

    // Relasi dengan model Toko
    // public function toko()
    // {
    //     return $this->belongsTo(toko::class, 'idtoko');
    // }
}
