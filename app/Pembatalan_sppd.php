<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Pembatalan_sppd extends Model
{
    use Uuid;

    protected $guarded = [

    ];

    public function sppd()
    {
        return $this->belongsTo(Sppd::class);
    }

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }

}
