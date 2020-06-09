<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Rincian_sppd extends Model
{
    use Uuid;

    protected $fillable = [
        'sppd_id', 'pegawai_id',
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
