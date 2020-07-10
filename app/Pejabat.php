<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Pejabat extends Model
{
    use Uuid;

    protected $guarded = [

    ];

    public function sppd()
    {
        return $this->belongsTo('App\Pegawai', 'sppd_id');
    }

    public function st()
    {
        return $this->belongsTo('App\Pegawai', 'st_id');
    }

    public function nt()
    {
        return $this->belongsTo('App\Pegawai', 'nt_id');
    }

    public function anggaran()
    {
        return $this->belongsTo('App\Pegawai', 'anggaran_id');
    }

    public function bendahara()
    {
        return $this->belongsTo('App\Pegawai', 'bendahara_id');
    }

}
