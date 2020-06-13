<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Anggaran extends Model
{
    use Uuid;

    protected $fillable = [ 
        'nama_anggaran', 'besaran_anggaran','tahun',
    ];


    public function sppd()
    {
        return $this->hasMany(Sppd::class);
    }
}
