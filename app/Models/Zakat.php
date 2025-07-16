<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Zakat extends Model
{
    protected $fillable = ['donatur_id', 'jenis', 'tanggal', 'jumlah', 'keterangan'];

    public function donatur()
    {
        return $this->belongsTo(Donatur::class, 'donatur_id');
    }
}

