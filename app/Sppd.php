<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Sppd extends Model
{
    use Uuid;

    protected $fillable = [
        'kategori_id', 'tanggal_berangkat', 'tanggal_kepulangan', 'maksud_tujuan',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
