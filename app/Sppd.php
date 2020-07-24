<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Sppd extends Model
{
    use Uuid;

    // protected $fillable = [
    //     'kategori_id', 'anggaran_id', 'tempat', 'tanggal_berangkat', 'tanggal_kepulangan', 'maksud_tujuan',
    // ];

    protected $guarded = [

    ];

    public function berangkat()
    {
        return $this->belongsTo('App\Kota', 'berangkat_id');
    }

    public function tujuan()
    {
        return $this->belongsTo('App\Kota', 'tujuan_id');
    }

    public function transportasi()
    {
        return $this->belongsTo('App\Transportasi', 'transportasi_id');
    }

    public function rincian_sppd()
    {
        return $this->hasMany('App\Rincian_sppd');
    }

    public function pembatalan_rincian_sppd()
    {
        return $this->hasMany(Pembatalan_rincian_sppd::class);
    }
}
