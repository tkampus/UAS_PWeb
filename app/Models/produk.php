<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    use HasFactory;

    protected $table = 'produk';

    protected $fillable = [
        'id',
        'idtoko',
        'namaproduk',
        'size',
        'detail',
        'foto',
        'harga',
    ];

    public function toko()
    {
        return $this->belongsTo(toko::class, 'idtoko');
    }
}
