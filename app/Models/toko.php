<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class toko extends Model
{
    use HasFactory;
    protected $table = 'tokos';

    protected $fillable = ['idtoko', 'namatoko', 'alamat', 'tokopedia', 'notoko', 'namapemilik', 'nopemilik', 'detailtoko', 'fotoprovil', 'fotobg', 'shope'];

    // public function User()
    // {
    //     return $this->belongsTo(User::class, 'idtoko', 'id');
    // }
}
