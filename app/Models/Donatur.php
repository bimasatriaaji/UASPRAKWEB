<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donatur extends Model
{
    protected $fillable = ['nama', 'email', 'no_hp', 'alamat', 'jenis', 'catatan'];

public function donasis() {
    return $this->hasMany(Donasi::class);
}

public function zakats() {
    return $this->hasMany(Zakat::class, 'muzakki_id');
}

}
