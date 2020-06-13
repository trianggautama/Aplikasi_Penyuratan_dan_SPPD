<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Sppd extends Model
{
    use Uuid;

    protected $fillable = [
        'kategori_id', 'anggaran_id', 'tempat', 'tanggal_berangkat', 'tanggal_kepulangan', 'maksud_tujuan',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function rincian_sppd()
    {
        return $this->hasMany(Rincian_sppd::class);
    }

    public function anggaran()
    {
        return $this->belongsTo(Anggaran::class);
    }
}
