<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Surat_masuk extends Model
{
    use Uuid;

    protected $fillable = [
        'agenda_id', 'nomor_surat', 'tanggal_surat', 'tanggal_terima', 'asal_surat', 'isi',
    ];

    public function agenda()
    {
        return $this->belongsTo(Agenda::class);
    }

    public function jenis_surat()
    {
        return $this->belongsTo(Jenis_surat::class);
    }
}
