<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Anggaran_detail extends Model
{
    use Uuid;

    protected $guarded = [

    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function rincian_sppd()
    {
        return $this->belongsTo(Rincian_sppd::class);
    }

    public function harian()
    {
        return $this->belongsTo('App\Kategori', 'harian_id');
    }

    public function representasi()
    {
        return $this->belongsTo('App\Kategori', 'representasi_id');
    }

    public function penginapan()
    {
        return $this->belongsTo('App\Kategori', 'penginapan_id');
    }

    public function tiket()
    {
        return $this->belongsTo('App\Kategori', 'tiket_id');
    }

    public function taksi()
    {
        return $this->belongsTo('App\Kategori', 'taksi_id');
    }

}
