<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use Uuid;

    protected $guarded = [

    ];

    public function golongan()
    {
        return $this->belongsTo(Golongan::class);
    }

    public function anggaran()
    {
        return $this->belongsTo(Anggaran::class);
    }

    public function kota()
    {
        return $this->belongsTo(Kota::class);
    }

}
