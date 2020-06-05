<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Surat_keluar extends Model
{
    use Uuid;

    protected $fillable = [
        'agenda_id', 'nomor_surat', 'jenis_surat_id', 'tanggal_kirim', 'tujuan', 'isi',
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
