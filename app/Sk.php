<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Sk extends Model
{
    use Uuid;

    protected $fillable = [
        'jenis_surat_id', 'agenda_id', 'tanggal_register', 'nomor_register', 'pemohon', 'identitas',
    ];

    public function jenis_surat()
    {
        return $this->belongsTo(Jenis_surat::class);
    }

    public function agenda()
    {
        return $this->belongsTo(Agenda::class);
    }
}
