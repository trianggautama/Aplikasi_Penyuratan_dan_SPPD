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

}
