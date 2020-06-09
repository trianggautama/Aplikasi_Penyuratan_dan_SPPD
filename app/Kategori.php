<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use Uuid;

    protected $fillable = [
        'kota_id', 'transportasi_id', 'besar_pagu',
    ];

    public function kota()
    {
        return $this->belongsTo(Kota::class);
    }

    public function transportasi()
    {
        return $this->belongsTo(Transportasi::class);
    }

}
