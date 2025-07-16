<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donasi extends Model
{
    protected $fillable = [
        'donatur_id',
        'tanggal',
        'jenis',
        'jumlah',
        'keterangan',
    ];

    public function donatur()
    {
        return $this->belongsTo(Donatur::class);
    }
}
