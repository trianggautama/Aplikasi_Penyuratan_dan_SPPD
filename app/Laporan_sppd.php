<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Laporan_sppd extends Model
{
    use Uuid;

    protected $fillable = [
        'sppd_id', 'isi',
    ];

    public function sppd()
    {
        return $this->belongsTo(Sppd::class);
    }

}
