<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Pembatalan_rincian_sppd extends Model
{
    use Uuid;

    protected $guarded = [

    ];

    public function rincian_sppd()
    {
        return $this->belongsTo(Rincian_sppd::class);
    }

    public function pegawai()
    {
        return $this->belongsTo('App\Pegawai', 'pegawai_id');
    }

    public function sppd()
    {
        return $this->belongsTo('App\Sppd');
    }

}
