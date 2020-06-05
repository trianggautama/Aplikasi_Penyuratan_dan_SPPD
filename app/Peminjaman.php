<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use Uuid;

    protected $fillable = [
        'pegawai_id', 'nomor_surat', 'tanggal_pinjam', 'tanggal_kembali', 'keterangan',
    ];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }
}
