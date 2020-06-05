<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Disposisi_surat extends Model
{
    use Uuid;

    protected $fillable = [
        'surat_masuk_id', 'pegawai_id', 'sifat', 'batas_waktu', 'catatan', 'isi',
    ];

    public function surat_masuk()
    {
        return $this->belongsTo(Surat_masuk::class);
    }

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }
}
